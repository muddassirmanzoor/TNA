<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\InventoryController;
use App\Http\Controllers\Api\StatController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
   Route::post('/change-password', [LoginController::class, 'changePassword']);
   Route::get('/enrollment-data', [StudentController::class, 'enrollmentData']);
   Route::post('/submit-enrollment', [StudentController::class, 'submitEnrollment']);
    Route::get('/class-students', [StudentController::class, 'classStudents']);
    Route::get('/student-detail', [StudentController::class, 'studentDetail']);
    Route::post('/update-student-status', [StudentController::class, 'updateStudentStatus']);
    Route::post('/submit-student-profile', [StudentController::class, 'submitStudentProfile']);

    //Meal Consumption
    Route::post('meal-consumption', [InventoryController::class, 'mealConsumption']);
    Route::get('meal-enrollment-data', [InventoryController::class, 'mealEnrollmentData']);
    Route::post('class-images', [InventoryController::class, 'classImages']);
    Route::get('check-class-images', [InventoryController::class, 'checkClassImages']);

    //Inventory
    Route::post('inventory-received', [InventoryController::class, 'inventoryReceived']);
    Route::get('get-inventory', [InventoryController::class, 'getInventory']);

    Route::get('dashboard-data', [InventoryController::class, 'getInventory']);

    Route::get('get-district', [StatController::class, 'getDistrict']);
    Route::get('get-tehsil', [StatController::class, 'getTehsil']);
    Route::get('get-markaz', [StatController::class, 'getMarkaz']);
});

