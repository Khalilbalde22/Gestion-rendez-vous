<?php

namespace App\Http\Controllers\Medecin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreneauRequest;
use App\Http\Requests\MedecinRequest;
use App\Http\Requests\PatientRequest;
use App\Models\Creneau;
use App\Models\Medecin;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class MedecinCreneauxController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creneau = Creneau::orderBy('created_at', 'desc')->limit(2)->get();
        return view('medecins.pages.index',[
            'creneaux' => $creneau,
        ]);
    }

    public function indexliste(){
        $creneau = Creneau::orderBy('created_at', 'desc')->paginate(2);
        return view('medecins.pages.admin.creneaux.index',[
            'creneaux' => $creneau,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
       $creneaux = Creneau::orderBy('created_at', 'desc')->where('user_id', auth()->user()->id)->limit(4)->get();
        $medecin = Medecin::get();
        return view('medecins.pages.admin.creneaux.create', [
            'creneaux' => $creneaux,
            'medecins' => $medecin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreneauRequest $request , Creneau $creneaux)
    {
        
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $creneaux->create($data);
        return back()->with('success', 'Creneau cré avec success ! ');
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
    public function edit(string $creneau)
    {   
        $creneau = Creneau::FindOrFail($creneau);
        return view('medecins.pages.admin.creneaux.edit',[
            'creneaux' => $creneau,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreneauRequest $request, Creneau $creneau)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $creneau->update($data);
        return back()->with('success', 'Creneau modiffier avec success ! ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $creneau)
    {   
        $creneau= Creneau::findOrfail($creneau);
        $creneau->delete();
        return to_route('medecin.creneaux.index')->with('success','supprimer avec success ! ');
    }
}
