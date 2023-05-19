
@extends('medecins.layouts.app')

@section('titre', 'ajouter patient')


@section('content')



 <!-- Form controls -->
    <div class="col-md-12">
        <div class="card mb-4">
        <h5 class="card-header">Modifier les informations</h5>
        <div class="card-body">
            @include('shared.alerte')
             <form action="{{ route('medecin.patients.update', $patient) }}" method="post" enctype="multipart/form-data">
             @method('PUT')
                @csrf
                        <div class="row">
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">Nome</label>
                                <input type='text' name="nom" required value="{{ old('nom') ?? $patient->nom }}" class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">prenom</label>
                                <input type='text' name="prenom" required value="{{ old('prenom') ?? $patient->prenom }}" class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">email</label>
                                <input type='email' name="email" required value="{{ old('email') ?? $patient->email }}" class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">adresse</label>
                                <input type='text' name="adresse" required value="{{ old('adresse') ?? $patient->adresse }}" class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">lieu</label>
                                <input type='text' name="lieu" required value="{{ old('lieu') ?? $patient->lieu }}" class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">telephone</label>
                                <input type='text' name="telephone" required value="{{ old('telephone') ?? $patient->telephone  }}" class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">image</label>
                                <input type='file' name="image" id="image" value="{{ old('image') ?? $patient->image }}" required  class="form-control"/>
                            </div>
                            
                        </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">enregistrer</button>
                </div>
            </form>

            
        </div>
        </div>
    </div>


    @endsection