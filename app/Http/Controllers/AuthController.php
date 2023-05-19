<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\MedecinRequest;
use App\Http\Requests\PatientRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    
    public function index(){
        return view('users.login');
    }

    public function login(AuthRequest $request){
    
        $credentials = $request->validated();
        if(Auth::attempt($credentials)){
            if($request->user()->roles()->where('reference', 'medecin' )->exists()){
            $request->session()->regenerate();
            return redirect()->route('medecin.creneaux.index');

            }elseif($request->user()->roles()->where('reference', 'patient' )->exists()){
            $request->session()->regenerate();
            return redirect()->route('patient.patient.index');
            }
        }
        return back()->withErrors([
            'email' => 'error'
        ])->onlyInput('email');
    }

    public function registration(){
        return view('users.registration');
    }

    public function validerRegistration(RegistrationRequest $request, User $users ){
         
            $password = Hash::make($request->validated('password'));
            $data = $request->validated();
            $email = $request->validated('email');
            $data['password'] = $password;
            $users->create($data);
            return back()->with('success', 'enregistrement en tant que Medecin effectuer avec success ! '); //to_route('medecin.medecin.index')->with('success', 'enregistrement effectuer avec success ! ');
         
            
    }

    public function logout(){
       Auth::logout();
       return to_route('login')->with('success', 'vous etes deconnecter avec success !');
    }
}
