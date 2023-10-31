<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;

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

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', [UserController::class, 'index']);
    Route::get('/attendance/start', [AttendanceController::class,'start']);
    Route::get('/attendance/finish', [AttendanceController::class,'finish']);
    Route::get('/rest/start', [RestController::class,'start']);
    Route::get('/rest/finish', [RestController::class,'finish']);
    Route::get('/attendance/', [AttendanceController::class, 'redirect']);
    Route::get('/attendance/{date}/{page}', [AttendanceController::class, 'index']);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('logout', function ()
{
auth()->logout();
Session()->flush();
return Redirect::to('/');
})->name('logout');

require __DIR__.'/auth.php';
