<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendResultMail;
use App\Models\PaperAnswer;
use App\Models\PaperMapping;
use App\Models\PaperQuestion;
use App\Models\PaperResult;
use App\Models\TeacherLocationLogs;
use App\Models\User;
use App\Traits\DynamicConnectionTrait;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use Exception;

class PaperController extends Controller
{
    use DynamicConnectionTrait;
    public function __construct()
    {
        // You can apply the below variable dynamically and model
        // will use that new connection
        $this->connection = $this->determineConnection();

    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPstPaper(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            $cnic = $user->st_cnic;
            $section = $request->input('section');

            // Fetch the questions for the given paper
            $paper = PaperQuestion::where('cnic', $cnic) // Assuming 'paper_id' is a unique identifier for the paper
                ->first();

            if (!$paper) {
                return response()->json(['status' => 'false','message' => 'Paper not found'], 404);
            }

            // Get question details from pst_question_bank based on the collected question IDs
            $questions = PaperQuestion::where('cnic', $cnic)
                ->where('section', $section)
                ->get();

            // Prepare the final structured array with questions and options
            $questionArray = [];

            foreach ($questions as $question) {
                $questionArray[] = [
                    'item_code' => $question->item_code,
                    'section' => $question->section,
                    'item_stem_en' => $question->item_stem_en,
                    'item_stem_ur' => $question->item_stem_ur,
                    'item_image_en' => $question->item_image_en,
                    'item_options' => [
                        [
                            'en' => $question->item_option_a_en,
                            'ur' => $question->item_option_a_ur,
                            'image' => $question->item_option_a_image,
                        ],
                        [
                            'en' => $question->item_option_b_en,
                            'ur' => $question->item_option_b_ur,
                            'image' => $question->item_option_b_image,
                        ],
                        [
                            'en' => $question->item_option_c_en,
                            'ur' => $question->item_option_c_ur,
                            'image' => $question->item_option_c_image,
                        ],
                        [
                            'en' => $question->item_option_d_en,
                            'ur' => $question->item_option_d_ur,
                            'image' => $question->item_option_d_image,
                        ]
                    ],
                    'correct_option' => $question->item_option_correct
                ];
            }
            $section_info = DB::connection($this->connection)->table('section_info')->where('name', $section)->first();

            // Return the questions with their details
            return response()->json([
                'status' => 'success',
                'message' => 'Paper retrieved successfully.',
                'data' => $questionArray,
                'section_info' => $section_info,
            ], 200);
        } catch (Exception $e) {
            // Log the error
            \Log::error('Error in getStat: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the dashboard data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitPstPaper(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            $cnic = $user->st_cnic;
            $section = $request->input('section');
            $start_time = $request->input('start_time');
            $end_time = $request->input('end_time');

            if($user->is_submitted == 'yes'){
                return response()->json([
                    'status' => 'false',
                    'message' => 'Paper already submitted against this CNIC'
                ], 401);
            }

            $result = PaperResult::where('cnic', $cnic)->first();
            if($result){
                // Return a success response
                return response()->json([
                    'status' => 'success',
                    'message' => 'Paper already submitted successfully!'
                ], 200);
            }
            // Prepare an array to hold the answers that need to be stored
            $answers = [];

            // Loop through questions from q1 to q25
            for ($i = 1; $i <= 25; $i++) {
                // Create the question field (q1, q2, ..., q25)
                $questionField = 'q' . $i;

                // Create the corresponding answer field (a1, a2, ..., a25)
                $answerField = 'a' . $i;

                // Get the selected answer for this question
                $selectedOption = $request->input($questionField);

                // If there's no answer, ensure that it is explicitly set to `null`
                $answers[$answerField] = $selectedOption ?? null;
            }

            // Store the answers in the database (assuming you have a `user_answers` table)
            PaperAnswer::create([
                    'cnic' => $cnic,
                    'section' => $section,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    // Merge the dynamically created answer fields with the rest of the data
                ] + $answers);

            // Return a success response
            return response()->json([
                'status' => 'success',
                'message' => 'Answers submitted successfully!'
            ], 200);
        } catch (Exception $e) {
            // Log the error
            \Log::error('Error in getStat: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the dashboard data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitResult(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            $cnic = $user->st_cnic;
            $data = $request->json()->all();

            if (isset($data['result']['sections'])) {
                $sections = $data['result']['sections'];
                foreach ($sections as $section) {
                    // Assuming Section is a model representing your 'sections' table
                    PaperResult::create([
                        'cnic' => $cnic,
                        'section' => $section['section'],
                        'total_marks' => $section['total_marks'] ?? 0, // Default to 0 if null
                        'obtain_marks' => $section['obt_marks'] ?? 0, // Default to 0 if null
                        'percentage' => $section['percentage'] ?? 0, // Default to 0 if null
                        'created_at' => now(), // Default to 0 if null
                    ]);
                }

                User::where('st_cnic', $cnic)
                    ->update(['is_submitted' => 'yes']);

                if (isset($data['result']['location'])) {
                    $request = $data['result']['location'];
                }

                $this->logTeacherLocation($request, 'Result stored successfully');

                // Return a success response
                return response()->json([
                    'status' => 'success',
                    'message' => 'Result stored successfully!'
                ], 200);
            }else {

                $this->logTeacherLocation($request, 'Invalid result data');

                return response()->json(['error' => 'Invalid result data'], 400);
            }
        } catch (Exception $e) {
            // Log the error
            \Log::error('Error in getStat: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the dashboard data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResultEMail(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            $cnic = $user->st_cnic;
            $email_address = $user->st_email_address;
            $email = $request->input('email');

            $result = PaperResult::where('cnic', $cnic)->get();
            // Send email to the user
            Mail::to($email)->send(new SendResultMail($user, $result));

            User::where('st_cnic', $cnic)
                ->update(['result_email' => $email]);

            // Return a success response
            return response()->json([
                'status' => 'success',
                'message' => 'Result send successfully!'
            ], 200);
        } catch (Exception $e) {
            // Log the error
            \Log::error('Error in getStat: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the dashboard data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function submitUserImages(Request $request): JsonResponse
    {
        try {
            $user = Auth::user();
            $cnic = $user->st_cnic;
            $emis_code = $user->s_emis_code;

            $images = $request->file('images');

            foreach ($images as $key => $file) {
                if ($file) {
//                    foreach ($data as $index => $file) {

                        $directory = 'uploads/teacher/' . $emis_code . '/' . $emis_code . '_' . date('Y-m-d'); // Example directory path
                        $fileName = $emis_code . '_' . date('Y-m-d') . '_' . $cnic . '.' . $file->getClientOriginalExtension(); // Get the original file name
                        $file->storeAs('public/' . $directory, $fileName); // Store the file

                        // Check if record exists and update or insert
                        DB::connection($this->connection)->table('teacher_images')->insert([
                            'emis_code' => $emis_code,
                            'image_date' => date('Y-m-d'),
                            'cnic' => $cnic,
                            'image_path' => $directory . '/' . $fileName
                        ]);
//                    }
                }
            }

            // Return a success response
            return response()->json([
                'status' => 'success',
                'message' => 'Images save successfully!'
            ], 200);
        } catch (Exception $e) {
            // Log the error
            \Log::error('Error in getStat: ' . $e->getMessage());

            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while retrieving the dashboard data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Logs teacher location information.
     */
    private function logTeacherLocation($request, $status)
    {
        TeacherLocationLogs::create([
            'teacher_cnic' => Auth::user()->st_cnic,
            'lat' => $request['lat'],
            'long' => $request['long'],
            'submit_at' => now(),
            'ip_address' => $request['ip_address']?? request()->ip(),
            'imei_number' => $request['imei_number'],
            'status' => $status,
        ]);
    }
}
