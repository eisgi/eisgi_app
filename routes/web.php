<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\FormateurController;
use App\Http\Controllers\GroupeController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SemestreController;
use App\Http\Controllers\AnneeFormationController;

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
    return view('auth.login');
});


// web.php

Route::get('/login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class,'login'])->name('loginVerify');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::post('/ajoutSemestres',[SemestreController::class,'AS'])->name('admin.ajoutSemestres');
    Route::post('/ajoutFilieres',[FiliereController::class,'AF'])->name('admin.ajoutFilieres');
    Route::post('/ajoutFormateurs',[FormateurController::class,'AFOR'])->name('admin.ajoutFormateurs');
    Route::post('/ajoutModules',[ModuleController::class,'AM'])->name('admin.ajoutModules');
    Route::post('/ajoutGroupes',[GroupeController::class,'AG'])->name('admin.ajoutGroupes');
    Route::post('/ajoutGroupes',[AnneeFormationController::class,'AFOURM'])->name('admin.ajoutFormation');
});