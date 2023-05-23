<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Creneau;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Constraint\IsEmpty;

use function PHPUnit\Framework\isEmpty;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Creneau $creneau)
    {   
        $today = date('Y-m-d');
        $time = date('H:i'); 

        $rendezvous = Creneau::orderBy('created_at','desc')->where('date_debut', '>=', $today)->get();
       
        return view('patients.pages.index', [
            'rendezvous' => $rendezvous,
        ]);


    }

    public function allRendezvous(){
        $rendezvous = Creneau::orderBy('created_at', 'desc')->where('patients_id', auth()->user()->patient->id)->paginate(2);
        return view('patients.pages.admin.creneaux.index', [
            'rendezvous' => $rendezvous, 
        ]);
    }

    public function ActionActifInactif($id){

        $creneau =Creneau::find($id);
        $patient =Patient::where('user_id', auth()->user()->id)->get();
        if($patient){
            if($creneau->status === '1'){

                $creneau->status = '0';
                foreach($patient as $patients){
                    $creneau->patients_id = $patients->id;
                }
                $creneau->save();
                return back()->with('success', 'regerver avec success ! ');
            }else{
                $creneau->status = '1';
                $creneau->patients_id = null;
                $creneau->save();
                return back()->with('danger', 'anuller avec success ! ');
            }
        }else{
            return back()->with('danger', 'veillez finaliser votre entregistrement et choisiser vos medecins, pour prendre rendez-vous');
        }
    }
     

    /**
     * Show the form for creating a new resource.
     */
    public function create(Medecin $medecin , Patient $patient)
    {       //forech pour afficher touts les patients

        //recupere un patient specifique et utiliser la relation medecins pour afficher les medecins lie
        $medecins = $medecin->with('patients')->get() ;
        $patients = $patient->where('user_id', auth()->user()->id)->get() ;
        return view('patients.pages.admin.parametre.create', [
            'medecins' => $medecins->pluck('prenom','id'),
            'patients' => $patients ,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PatientRequest $request , Patient $patient)
    {   
        $data = $request->validated();
        $image = $request->validated('image');
        $medecins = $request->medecins;
        $data['user_id'] = auth()->user()->id; 
        if($patient->image){
            Storage::disk('public')->delete($patient->image);
        }else{
            $data['image'] = $image->store('medecins', 'public');
        }
        $patient->firstOrCreate($data);
        
        $patients = Patient::where('user_id', auth()->user()->id)->first();
        $patients->medecins()->sync($medecins);
        
        
        // $patient->medecins()->sync($medecins); 
        return to_route('patient.patient.create')->with('success', 'vos informations on bien été enregistrés !');
       
        
    }

    public function medecins() {
        $user = Auth::user();
        $patients = Patient::where('user_id',auth()->user()->id)->first();
       
       return view('patients.pages.admin.medecins.index', [
        'patients' => $patients,
       ]);

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
