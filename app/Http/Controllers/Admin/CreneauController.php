<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreneauRequest;
use App\Models\Creneau;
use App\Models\Medecin;
use App\Models\User;
use Illuminate\Http\Request;

class CreneauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $creneau = Creneau::orderBy('created_at', 'desc')->limit(4)->get();
        return view('admin.pages.index', [
            'creneaux' => $creneau,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $creneaux = Creneau::orderBy('created_at', 'desc')->limit(4)->get();
        $medecin = Medecin::get();
        return view('admin.pages.admin.creneaux.create', [
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
