<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OperationsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route to show the login page
Route::get('/', [LoginController::class, 'showLogin'])->name('login');

Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Route for handling login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');



Route::middleware(['auth'])->group(function () {
    Route::middleware(['restrict.interviewer'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'showDashboard']);
    Route::post('filter-data', [DashboardController::class, 'filterData']);
    Route::any('minister-dashboard', [DashboardController::class, 'ministerFilterData']);
    Route::get('district-list', [DashboardController::class, 'districtList']);
    Route::get('school-list', [DashboardController::class, 'schoolList']);
    Route::get('teacher-list', [DashboardController::class, 'teacherList']);
    Route::get('ranking-detail', [DashboardController::class, 'rankingDetail']);
    Route::get('teacher-appeared', [DashboardController::class, 'teacherAppeared']);

});
    Route::get('interviewer-teacher-list', [DashboardController::class, 'interviewerTeacherList'])->name('interviewer-teacher-list')->middleware('role:interviewer');
    Route::get('invigilator-teacher-list', [DashboardController::class, 'invigilatorTeacherList'])->name('invigilator-teacher-list')->middleware('role:invigilator');
    Route::get('interview-form/{cnic}', [DashboardController::class, 'interviewForm'])->middleware('role:interviewer');
    Route::get('invigilator-form/{cnic}', [DashboardController::class, 'invigilatorForm'])->middleware('role:invigilator');
    Route::post('submit-interview-form', [DashboardController::class, 'submitInterviewForm'])->middleware('role:interviewer');
    Route::post('activate-teacher-login', [DashboardController::class, 'activateTeacherLogin'])->middleware('role:invigilator');

    Route::get('add-interviewer', [OperationsController::class, 'index']);
    Route::get('list-interviewer', [OperationsController::class, 'listInterviewer']);
    Route::get('edit-interviewer/{cnic}', [OperationsController::class, 'editInterviewer'])->name('edit-interviewer');
    Route::post('add-interviewer', [OperationsController::class, 'addInterviewer']);
    Route::post('update-interviewer', [OperationsController::class, 'updateInterviewer']);
    Route::get('/get-tehsils/{district}', [OperationsController::class, 'getTehsils']);
    Route::get('/get-centers/{tehsil}', [OperationsController::class, 'getCenters']);

});
