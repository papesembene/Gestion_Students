<?php

use App\Http\Controllers\ProfileController;
use App\Models\Direction;
use App\Models\Matiere;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
//pour afficher la page de connexion
Route::get('/',[\App\Http\Controllers\AuthController::class,'login'])->name('login');
//pour soumettre le formulaire
Route::post('/',[\App\Http\Controllers\AuthController::class,'doLogin']);
Route::get('/deconnexion',[\App\Http\Controllers\AuthController::class,'logout'])->name('deconnexion');
//Route::get('/inscription',[\App\Http\Controllers\AuthController::class,'inscrire'])->name('inscription');
//Route::post('/inscription',[\App\Http\Controllers\UserController::class,'store'])->name('save');
//Route::get('/student',[\App\Http\Controllers\StudentController::class,'index'])->name('filter');
Route::post('/import',[\App\Http\Controllers\StudentController::class,'import'])->name('import');
Route::get('/studentlistexcel', [\App\Http\Controllers\StudentController::class, 'downloadexcel'])->name('studentlistexcel');

Route::resource('profile',ProfileController::class);
Route::resource('class',\App\Http\Controllers\SchoolclassController::class);
Route::resource('student',\App\Http\Controllers\StudentController::class);
Route::resource('user',\App\Http\Controllers\UserController::class);






