<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;
use App\Http\Controllers\SessionController;

Route::get('/home', [AuthController::class,'getIndex']);
Route::get('/register', [AuthController::class, 'getRegister']);
Route::post('/register', [AuthController::class, 'create']);
Route::get('/login', [AuthController::class,'check']);
Route::post('/login', [AuthController::class,'checkUser']);
// Route::get('/auth', [AuthController::class,'check']);
// Route::post('/auth', [AuthController::class,'checkUser']);
Route::get('/logout', [AuthController::class,'getLogout']);
// Route::get('/attendance_start', [AttendanceController::class,'create']);
// Route::get('/attendance_end', [AttendanceController::class,'create']);
Route::get('/attendance_start', [AttendanceController::class, 'getAttendanceStart']);
Route::get('/attendance_end', [AttendanceController::class, 'getAttendanceEnd']);
Route::get('/break_start', [RestController::class, 'getBreakStart']);
Route::get('/break_end', [RestController::class, 'getBreakEnd']);

Route::get('/date', [AttendanceController::class,'getAttendanceView']);
Route::get('/date/{message}', [AttendanceController::class,'getChangeTheDay']);
Route::get('/previous_day/{message}', [AttendanceController::class,'getPreviousDay']);
Route::get('/next_day/{message}', [AttendanceController::class,'getNextDay']);

Route::get('/session', [SessionController::class, 'getSes']);
Route::post('/session', [SessionController::class, 'postSes']);



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';


