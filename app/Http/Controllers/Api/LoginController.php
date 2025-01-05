<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeacherLocationLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    //for Teacher Login
    public function login(Request $request)
    {
        // Validate the request
        $validate = Validator::make($request->all(), [
            'cnic' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validate->fails()) {
            $this->logTeacherLocation($request, 'Validation Error');
            return response()->json([
                'status' => 'false',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 422); // Changed to 422 Unprocessable Entity
        }

        // Check if the user exists and is active
        $user = User::where('st_cnic', $request->cnic)
            ->first();

        if($user->is_active == 0){
            $this->logTeacherLocation($request, 'Not Activated');
            return response()->json([
                'status' => 'false',
                'message' => 'Not Activated'
            ], 401);
        }

        // Check password
        if (!$user || $request->password !== $user->password) {
            $this->logTeacherLocation($request, 'Invalid Credentials');
            return response()->json([
                'status' => 'false',
                'message' => 'Invalid credentials'
            ], 401);
        }

        if($user->is_submitted == 'yes'){
            $this->logTeacherLocation($request, 'Paper Already Submitted');
            return response()->json([
                'status' => 'false',
                'message' => 'Paper already submitted against this CNIC'
            ], 401);
        }

        // Prepare the response data
        $response = [
            'status' => 'success',
            'message' => 'User is logged in successfully.',
            'data' => [
                'token' => $user->createToken($request->cnic)->plainTextToken,
                'user' => $user
            ],
        ];

        // Log successful login
        $this->logTeacherLocation($request, 'Login Successfully');
        return response()->json($response, 200);
    }

    /**
     * Logs teacher location information.
     */
    private function logTeacherLocation($request, $status)
    {
        TeacherLocationLogs::create([
            'teacher_cnic' => $request->cnic,
            'lat' => $request->lat,
            'long' => $request->long,
            'login_at' => now(),
            'ip_address' => $request->ip_address ?? request()->ip(),
            'imei_number' => $request->imei_number,
            'status' => $status,
        ]);
    }

public function changePassword(Request $request)
{
    // Validate the request
    $validator = Validator::make($request->all(), [
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:8|confirmed', // Ensure the new password meets the minimum length and is confirmed
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'false',
            'message' => 'Validation Error!',
            'data' => $validator->errors(),
        ], 422);  // Unprocessable Entity
    }

    // Retrieve the authenticated user
    $user = Auth::user();

    // Check if the current password matches
    if (!Hash::check($request->current_password, $user->password)) {
        return response()->json([
            'status' => 'false',
            'message' => 'Current password is incorrect.',
        ], 401);  // Unauthorized
    }

    // Update the password
    $user->password = Hash::make($request->new_password);
    $user->change_password = '1';
    $user->save();

    // Return success response
    return response()->json([
        'status' => 'success',
        'message' => 'Password changed successfully.',
    ], 200);  // OK
}
}
