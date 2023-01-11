<?php

use Illuminate\Support\Facades\Route;

// Backsite Conttoller
use App\Http\Controllers\Backsite\RoleController;
use App\Http\Controllers\Backsite\UserController;
use App\Http\Controllers\Backsite\AftapController;
use App\Http\Controllers\Backsite\DonorController;
use App\Http\Controllers\Backsite\DoctorController;
use App\Http\Controllers\Backsite\OfficerController;
use App\Http\Controllers\Backsite\PatientController;
use App\Http\Controllers\Backsite\TypeUserController;
use App\Http\Controllers\Backsite\DashboardController;
use App\Http\Controllers\Backsite\ScreeningController;
use App\Http\Controllers\Backsite\BloodDonorController;
use App\Http\Controllers\Backsite\CrossmatchController;
use App\Http\Controllers\Backsite\PermissionController;
use App\Http\Controllers\Backsite\BloodSupplyController;
use App\Http\Controllers\Backsite\BloodRequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Backsite Page Start
Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function(){

    // Dasboard Page
    Route::resource('dashboard', DashboardController::class);

    // Permission Page
    Route::resource('permission', PermissionController::class);

    // Role Page
    Route::resource('role', RoleController::class);

    // Type User Page
    Route::resource('type_user', TypeUserController::class);

    // User Page
    Route::resource('user', UserController::class);

    // Blood Supply Page
    Route::resource('blood_supply', BloodSupplyController::class);

    // Doctor Page
    Route::resource('doctor', DoctorController::class);

    // Donor Page
    Route::resource('donor', DonorController::class);

    // Officer Page
    Route::resource('officer', OfficerController::class);

    // Patient Page
    Route::resource('patient', PatientController::class);

    // Aftap Page
    Route::resource('aftap', AftapController::class);

    // Blood Donor Page
    Route::resource('blood_donor', BloodDonorController::class);

    // Blood Request Page
    Route::resource('blood_request', BloodRequestController::class);

    // Crossmatch Page
    Route::resource('crossmatch', CrossmatchController::class);

    // Screening Page
    Route::resource('screening', ScreeningController::class);
});
// Backsite Page End
