<?php

namespace App\Http\Controllers;

use App\Models\AddInterviewerLog;
use App\Models\Center;
use App\Models\InterviewResult;
use App\Models\Markaz;
use App\Models\PaperResult;
use App\Models\School;
use App\Models\TeacherActivation;
use App\Models\Tehsil;
use App\Models\User;
use App\Models\WebUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OperationsController extends Controller
{
    public function index(Request $request)
    {
        return view('operations.index');
    }
    public function listInterviewer(Request $request)
    {
        $users = WebUser::whereIn('role', ['interviewer', 'invigilator'])->get();

        return view('operations.list', compact('users'));
    }
    public function editInterviewer(Request $request, $cnic)
    {
        $user = WebUser::where('cnic', $cnic)->first();
        $tehsils = User::select('t_name')->where('d_name', $user['district'])->distinct()->orderBy('t_name')->get();
        $centers = Center::where('tehsil', $user['tehsil'])->orderBy('tna_center')->get();

        return view('operations.edit', compact('user','tehsils', 'centers'));
    }

    public function addInterviewer(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'cnic' => 'required|string|min:13',   // Ensure cnic is provided
        ]);

        // If validation fails, redirect back with validation errors and input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Get the selected district and tehsil ID from the request
        $cnic = $request->input('cnic');
        $user = WebUser::where('cnic', $cnic)->first();

        if($user){
            return redirect()->route('edit-interviewer', ['cnic' => $cnic])->with('error', 'Interviewer already added');
        }

        WebUser::updateOrCreate(
            ['cnic' => $cnic], // Condition to check if the record exists
            [
                'cnic' => $cnic,
                'name' => $request->input('name'),
                'email' => $cnic,
                'password' => $cnic,
                'role' => 'interviewer',
                'district' => $request->input('district'),
                'tehsil' => $request->input('tehsil'),
                'emis_code' => $request->input('emis_code'),
                'status' => $request->input('status'),
                'created_at' => now(),
            ]);

//        AddInterviewerLog::create([
//            'interviewer_cnic' => $cnic,
//            'user_id' => Auth::user()->id,
//        ]);
        return redirect()->to('list-interviewer')->with('success', 'Interviewer added successfully');
    }

    public function updateInterviewer(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'cnic' => 'required|string|min:13',   // Ensure cnic is provided
        ]);

        // If validation fails, redirect back with validation errors and input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Get the selected district and tehsil ID from the request
        $cnic = $request->input('cnic');
        $user = WebUser::where('cnic', $cnic)->first();


        WebUser::updateOrCreate(
            ['cnic' => $cnic], // Condition to check if the record exists
            [
                'cnic' => $cnic,
                'name' => $request->input('name'),
                'email' => $cnic,
                'password' => $cnic,
                'role' => $request->input('role'),
                'district' => $request->input('district'),
                'tehsil' => $request->input('tehsil'),
                'emis_code' => $request->input('emis_code'),
                'status' => $request->input('status'),
                'updated_at' => now(),
            ]);

//        AddInterviewerLog::create([
//            'interviewer_cnic' => $cnic,
//            'user_id' => Auth::user()->id,
//        ]);
        return redirect()->to('list-interviewer')->with('success', 'Updated successfully');
    }

    public function getTehsils($district)
    {
        $tehsils = User::select('t_name')->where('d_name', $district)->distinct()->orderBy('t_name')->get();
        return response()->json(['tehsils' => $tehsils]);
    }

    public function getCenters($tehsil)
    {
        $centers = Center::where('tehsil', $tehsil)->orderBy('tna_center')->get();
        return response()->json(['centers' => $centers]);
    }
}
