<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Medecin;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedecinPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with('medecins')->paginate(2);
        return view('medecins.pages.admin.patients.index',[
            'patients' => $patients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $patient = Patient::orderBy('created_at', 'desc');
        return view('medecins.pages.admin.patients.create', [
        'patient' => $patient,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request, Patient $patient)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $image = $request->validated('image');
        if($patient->image){
            Storage::disk('public')->delete($patient->image);
        }
        $data['image'] = $image->store('patients', 'public');
        $patient->create($data);

        return to_route('medecin.creneaux.index')->with('success', 'patient enregistrer avec success ! ');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $patient) 
    {
        $patient = Patient::findOrFail($patient);
        return view('medecins.pages.admin.patients.edit',[
            'patient' => $patient,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatientRequest $request, Patient $patient)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $image = $request->validated('image');
        if($patient->image){
            Storage::disk('public')->delete($patient->image);
        }
        $data['image'] = $image->store('patients', 'public');
        $patient->update($data);

        return to_route('medecin.creneaux.index')->with('success', 'patient enregistrer avec success ! ');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return to_route('medecin.patients.index')->with('success', 'patient supprimer avec success');
    }
}
