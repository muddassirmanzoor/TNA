<?php

namespace App\Http\Controllers;

use App\Models\InterviewResult;
use App\Models\Markaz;
use App\Models\PaperResult;
use App\Models\School;
use App\Models\SearchLogs;
use App\Models\TeacherActivation;
use App\Models\Tehsil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showDashboard(Request $request)
    {
        return view('dashboard.index');
    }

    public function filterData(Request $request)
    {
        // Get the selected district and tehsil ID from the request
        $selectedDistrict = $request->input('district_id');
        $selectedTehsil = $request->input('tehsil_id');
        $selectedMarkaz = $request->input('markaz_id');
        $selectedSchool = $request->input('school_id');
        $selectedType = $request->input('teacher_type');
        $selectedQualification = $request->input('teacher_qualification');

        // Retrieve tehsils based on the selected district
        $tehsils = [];
        if ($selectedDistrict && $selectedDistrict != 0) {
            $tehsils = User::select('t_name')->distinct('t_name')->where('d_name', $selectedDistrict)->orderBy('t_name')->get();
        }

        // Retrieve markaz based on the selected tehsil
        $markaz = [];
        if ($selectedTehsil && $selectedTehsil != 0) {
            $markaz = User::select('m_name')->distinct('m_name')->where('t_name', $selectedTehsil)->orderBy('m_name')->get();
        }

        $schools = [];
        if ($selectedMarkaz && $selectedMarkaz != 0) {
            $schools = User::select('s_emis_code','s_name')->distinct('s_emis_code')->where('m_name', $selectedMarkaz)->get();
        }


        return view('dashboard.index', [
            'tehsils' => $tehsils,
            'markaz' => $markaz,
            'schools' => $schools,
            'selectedDistrict' => $selectedDistrict,
            'selectedTehsil' => $selectedTehsil,
            'selectedMarkaz' => $selectedMarkaz,
            'selectedSchool' => $selectedSchool,
            'selectedType' => $selectedType,
            'selectedQualification' => $selectedQualification,
        ]);
    }

    public function ministerFilterData(Request $request)
    {
        // Get the selected district and tehsil ID from the request
        $selectedDistrict = $request->input('district_id');
        $selectedTehsil = $request->input('tehsil_id');
        $selectedType = $request->input('teacher_type');
        $selectedDate = $request->input('date');

        // Retrieve tehsils based on the selected district
        $tehsils = [];
        if ($selectedDistrict && $selectedDistrict != 0) {
            $tehsils = User::select('t_name')->distinct('t_name')->where('d_name', $selectedDistrict)->orderBy('t_name')->get();
        }

        // Prepare the procedure call with parameters
        $procedureCall = 'CALL get_info(?,?,?,?)';

        $parameters = [$selectedDistrict, $selectedTehsil, $selectedType, $selectedDate];
        $pdo = DB::connection('mysql')->getPdo();
        $statement = $pdo->prepare($procedureCall);
        $statement->execute($parameters);

        // Fetch the first result set
        $count_data = $statement->fetchAll();
        $statement->closeCursor();

        $teachers = User::where('is_submitted', 'yes')
            ->when($selectedDistrict, function ($query, $selectedDistrict) {
                return $query->where('d_name', $selectedDistrict);
            })
            ->when($selectedTehsil, function ($query, $selectedTehsil) {
                return $query->where('t_name', $selectedTehsil);
            })
            ->whereHas('answer', function ($query) {
                $query->whereDate('created_at', now()->toDateString()); // Filters answers created today
            })
            ->with('answer')
            ->get();

        $todayAttempts = DB::table('answers')
            ->whereDate('created_at', now()->toDateString()) // Filter records created today
            ->distinct('cnic') // Ensure only distinct 'cnic' values are counted
            ->count('cnic');

        $todayInterviews = DB::table('interview_results')
            ->whereDate('created_at', now()->toDateString()) // Filter records created today
            ->distinct('teacher_cnic') // Ensure only distinct 'cnic' values are counted
            ->count('teacher_cnic');

        $todayActive = DB::table('teacher_activation')
            ->whereDate('created_at', now()->toDateString()) // Filter records created today
            ->distinct('teacher_cnic') // Ensure only distinct 'cnic' values are counted
            ->count('teacher_cnic');

        return view('dashboard.ministerDashboard', [
            'tehsils' => $tehsils,
            'selectedDistrict' => $selectedDistrict,
            'selectedTehsil' => $selectedTehsil,
            'selectedType' => $selectedType,
            'selectedDate' => $selectedDate,
            'count_data' => $count_data[0],
            'teachers' => $teachers,
            'todayAttempts' => $todayAttempts,
            'todayInterviews' => $todayInterviews,
            'todayActive' => $todayActive,
        ]);
    }

    public function districtList(Request $request)
    {
        return view('dashboard.district_list');
    }

    public function schoolList(Request $request)
    {
        return view('dashboard.school_list');
    }

    public function teacherList(Request $request)
    {
        return view('dashboard.teacher_list');
    }

    public function interviewerTeacherList(Request $request)
    {
        $tehsil = Auth::user()->tehsil;
        $teachers = User::where('t_name', $tehsil)->where('is_submitted', 'yes')->with('interview')->get();
        return view('dashboard.interviewer_teacher_list', compact('teachers'));
    }
    public function invigilatorTeacherList(Request $request)
    {
        $cnic = Auth::user()->cnic;
        $activated_teachers = TeacherActivation::where('invigilator_cnic', $cnic)->with('teacher')->get();
        return view('dashboard.invigilator_teacher_list', compact('activated_teachers'));
    }

    public function interviewForm(Request $request, $cnic)
    {
        $user = Auth::user();
        $tehsil = Auth::user()->tehsil;


        $teacher = User::where('st_cnic', $cnic)->where('t_name', $tehsil)->where('is_submitted', 'yes')->first();
        if($teacher){

            SearchLogs::create([
                'user_cnic' => $user->cnic,
                'search_cnic' => $cnic,
                'search_at' => now(),
                'search_status' => 'success',
            ]);

            $count = InterviewResult::where('teacher_cnic', $cnic)->count();
            if($count >= 2){
                return redirect()->intended('interviewer-teacher-list')->with('error', 'Already 2 interviews conducted this teacher');
            }else{
                $result = InterviewResult::where('teacher_cnic', $cnic)->where('interviewer_cnic', Auth::user()->cnic)->first();

                return view('dashboard.interview_form', compact('teacher', 'result'));
            }
        }

        SearchLogs::create([
            'user_cnic' => $user->cnic,
            'search_cnic' => $cnic,
            'search_at' => now(),
            'search_status' => 'wrong CNIC',
        ]);

        return redirect()->intended('interviewer-teacher-list')->with('error', 'Teacher Not Exist');
    }

    public function invigilatorForm(Request $request, $cnic)
    {
        $i_cnic = Auth::user()->cnic;

        $teacher = User::where('st_cnic', $cnic)->first();
        if($teacher){
            if($teacher->is_active == 0) {
                $activated_teachers = TeacherActivation::where('invigilator_cnic', $i_cnic)->with('teacher')->get();
                return view('dashboard.invigilator_teacher_list', compact('teacher', 'activated_teachers'));
            }else{
                return redirect()->intended('invigilator-teacher-list')->with('error', 'Teacher Already Activated');
            }
        }

        return redirect()->intended('invigilator-teacher-list')->with('error', 'Teacher Not Exist');
    }

    public function submitInterviewForm(Request $request)
    {
        $teacher_cnic = $request->input('teacher_cnic');
        $interviewer_cnic = Auth::user()->cnic;

        $result = InterviewResult::where('teacher_cnic', $teacher_cnic)->where('interviewer_cnic', $interviewer_cnic)->first();
        if($result){
            return redirect()->intended('interviewer-teacher-list')->with('error', 'You have already submitted form of this teacher');
        }

        $count = InterviewResult::where('teacher_cnic', $teacher_cnic)->count();

        if($count >= 2){
            return redirect()->intended('interviewer-teacher-list')->with('error', 'Already 2 interviews conducted this teacher');
        }

        // Store the evaluation in the database
        $evaluation = new InterviewResult();
        $evaluation->teacher_cnic = $teacher_cnic;
        $evaluation->interviewer_cnic = $interviewer_cnic;
        $evaluation->attendance = $request->input('attendance');
        $evaluation->verbal_skills = $request->input('communication_skills');
        $evaluation->non_verbal_skills = $request->input('non_communication_skills');
        $evaluation->proffessional_attire = $request->input('professional_attire');
        $evaluation->teaching_aids = $request->input('teaching_aids');
        $evaluation->interview_date = now();

        // Save the evaluation to the database
        $evaluation->save();

        User::where('st_cnic', $teacher_cnic)
            ->increment('interview_status', 1);

        return redirect()->intended('interviewer-teacher-list')->with('success', 'Interview Form Submitted');
    }

    public function activateTeacherLogin(Request $request)
    {
        $teacher_cnic = $request->input('teacher_cnic');

        User::where('st_cnic', $teacher_cnic)
            ->where('is_active', 0) // Check if is_active is 0
            ->update(['is_active' => 1]);

        TeacherActivation::updateOrCreate(
            ['teacher_cnic' => $teacher_cnic], // Condition to check if the record exists
            [
                'invigilator_cnic' => Auth::user()->cnic,
                'activated_at' => now(),
            ]);
        return redirect()->intended('invigilator-teacher-list')->with('success', 'Teacher login Activated');
    }

    public function rankingDetail(Request $request)
    {
        return view('dashboard.ranking_detail');
    }

    public function teacherAppeared(Request $request)
    {
        return view('dashboard.teacher_appeared');
    }
}
