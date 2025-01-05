<?php

namespace App\Http\Controllers;

use App\Models\LoginLogs;
use App\Models\User;
use App\Models\WebUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'cnic' => 'required|string',   // Ensure cnic is provided
            'password' => 'required|string|min:5',   // Password must be at least 6 characters
        ]);

        // If validation fails, redirect back with validation errors and input
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get credentials from the request (email/username and password)
        $credentials = $request->only('cnic', 'password');

        $user = WebUser::where('cnic', $credentials['cnic'])->first();



        // Attempt to log in with the provided credentials
        if ($user && $user->password === $credentials['password']) {

            if($user->status == 0){
                return redirect()->route('login')->with('error', 'Your Account is Inactive');
            }
            // Log the user in
            Auth::login($user);
            // Authentication successful, retrieve authenticated user
            $role = Auth::user()->role;

            LoginLogs::create([
                'cnic' => $user->cnic,
                'login_time' => now(),
                'user_type' => $role,
                'ip_address' => request()->ip(),
            ]);

            if ($role == 'interviewer'){
                return redirect()->intended('interviewer-teacher-list')->with('success', 'Login successful');
            }elseif ($role =='invigilator'){
                return redirect()->intended('invigilator-teacher-list')->with('success', 'Login successful');
            }elseif ($role =='minister'){
                return redirect()->intended('minister-dashboard')->with('success', 'Login successful');
            }elseif ($role =='operations'){
                return redirect()->to('list-interviewer')->with('success', 'Login successful');
            }

            // Redirect the user to the intended page (dashboard) after login
            return redirect()->intended('/dashboard')->with('success', 'Login successful');
        }

        LoginLogs::create([
            'cnic' => $credentials['cnic'],
            'login_time' => now(),
            'user_type' => 'Anonymous',
            'ip_address' => request()->ip(),
        ]);
        // Authentication failed, redirect back to login page with an error message
        return redirect()->route('login')->with('error', 'Invalid CNIC or password');
    }


    public function logout()
    {
        Auth::logout(); // Log the user out
        return redirect()->route('login'); // Redirect to login page after logout
    }
}
