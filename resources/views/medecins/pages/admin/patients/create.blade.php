@extends('medecins.layouts.app')

@section('titre', 'ajouter patient')


@section('content')



 <!-- Form controls -->
    <div class="col-md-12">
        <div class="card mb-4">
        <h5 class="card-header">Enregistrer un patient</h5>
        <div class="card-body">
            @include('shared.alerte')
             <form action="{{ route('medecin.patients.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                        <div class="row">
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">Nome</label>
                                <input type='text' name="nom" required  class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">prenom</label>
                                <input type='text' name="prenom" required  class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">email</label>
                                <input type='email' name="email" required  class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">adresse</label>
                                <input type='text' name="adresse" required  class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">lieu</label>
                                <input type='text' name="lieu" required  class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">telephone</label>
                                <input type='text' name="telephone" required  class="form-control"/>
                            </div>
                            <div class="col-md-4"> 
                                <label  class="col-md-2 col-form-label">image</label>
                                <input type='file' name="image" id="image" required  class="form-control"/>
                            </div>
                            
                        </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">enregistrer</button>
                </div>
            </form>

            
        </div>
        </div>
    </div>




    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
        <h5 class="card-header">Les patients qui on rendez-vous aujordhuit</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead class="table-light">
                <tr>
                <th>Date Debut</th>
                <th>Date Fin</th>
                <th>Lieu</th>
                <th>Duree</th>
                <th>Medecin</th>
                <th>status</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                {{-- @foreach ($creneaux as $creneau )
                <tr>
                    <td>{{ $creneau->heur_debut }}</td>
                    <td>{{ $creneau->heur_fin }}</td>
                    <td>{{ $creneau->heur_lieu }}</td>
                    <td>{{ $creneau->duree }}</td>
                    <td>{{ $creneau->medecin }}</td>
                    <td>
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <a class="dropdown-item" href="javascript:void(0);"
                            ><i class="bx bx-trash me-1"></i> Delete</a
                            >
                        </div>
                        </div>
                    </td>
                </tr>
                
                @endforeach
                </td> --}}
                
            </tbody>
            </table>
        </div>
        </div>

    </div>




@endsection