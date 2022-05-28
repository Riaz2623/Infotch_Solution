<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;

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
//====User====//
Route::get('/', [WebsiteController::class,'index'])->name('home');
Route::post('/new-student', [WebsiteController::class,'create'])->name('new-student');

//======Admin=====///
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',[DashboardController::class,'index'] )->name('dashboard');
Route::resource('students', StudentController::class);


