<?php

use App\Http\Controllers\Admin\CreneauController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Medecin\MedecinCreneauxController;
use App\Http\Controllers\Medecin\MedecinPatientController;
use App\Http\Controllers\Patient\PatientController;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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



Route::get('/login', [AuthController::class, 'index'])
->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/registration', [AuthController::class, 'registration'])
->name('register');
Route::post('/registration', [AuthController::class, 'validerRegistration'])->name('registration');
Route::delete('/logout', [AuthController::class, 'logout'])
->middleware('auth')
->name('logout');


//les route admin
Route::prefix('admin')->name('admin.')->middleware('auth', 'role:admin')->group( function(){
    Route::resource('/creneaux', CreneauController::class );
});
//les route pour le medecin
Route::prefix('medecin')->name('medecin.')->middleware('auth', 'role:medecin')->group( function(){
    Route::resource('/creneaux', MedecinCreneauxController::class );
    Route::resource('/patients', MedecinPatientController::class ); 
    Route::get('/indexList', [MedecinCreneauxController::class, 'indexliste'])->name('listeCreneaux');
});
//les route pour le patient
Route::prefix('patient')->name('patient.')->middleware('auth', 'role:patient')->group( function(){
    Route::resource('/patient', PatientController::class );
    Route::get('/rendez-vous', [PatientController::class, 'allRendezvous'])->name('rendez_vous');
    Route::get('/medecins', [PatientController::class, 'medecins'])->name('medecinsPatient');
    Route::get('/rendez-vous/{id}/actions', [PatientController::class, 'ActionActifInactif'])->name('redevousAction');

});
