@extends('medecins.layouts.app')

@section('titre', 'ajouter creneau')


@section('content')



 <!-- Form controls -->
    <div class="col-md-12">
        <div class="card mb-4">
        <h5 class="card-header">Enregistrer un creneau</h5>
        <div class="card-body">
             <form action="{{ route('admin.creneaux.store') }}" method="post" enctype="multipart/form">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Date debut</label>
                        <input required name="date_debut" class="form-control" type="date" value="2021-06-18"/>
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Date fin</label>
                        <input required name="date_fin" class="form-control" type="date" value="2021-06-18"/>
                        
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">heur debut</label>
                        <input required name="heur_debut" class="form-control" type="time" value="2021-06-18"/>
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">heur fin</label>
                        <input required name="heur_fin" class="form-control" type="time" value="2021-06-18"/>
                    </div>
                    <div class="col-md-6">
                        
                        <label for="html5-time-input" class="col-md-2 col-form-label">Durée</label>
                        
                        <input required class="form-control" name="duree" type="time" value="12:30:00"  />
                        
                        <label for="exampleFormControlSelect1" class="form-label">Lieu</label>
                        <select name="lieu" class="form-select" required aria-label="Default select example">
                        <option selected>selectionner</option>
                        <option value="dakar">Dakar</option>
                        <option value="liberte6">Liberte 6</option>
                        <option value="yoff">Yoff  </option>
                        </select>
                    </div>
                </div>
                
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">enregistrer</button>
                </div>
                </div>
            </form>

            
        </div>
        </div>
    </div>

        <div class="card">
        <h5 class="card-header">Les derniers creneaux</h5>
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
                @foreach ($creneaux as $creneau )
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
                </td>
                
            </tbody>
            </table>
        </div>
        </div>




@endsection