@extends('medecins.layouts.app')

@section('titre', 'modifier un creneau')


@section('content')



          @include('shared.alerte')
 <!-- Form controls -->
    <div class="col-md-12">
        <div class="card mb-4">
        <h5 class="card-header">Modifier un creneau</h5>
        <div class="card-body">
             <form action="{{ route('medecin.creneaux.update',$creneaux) }}" method="post">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Date debut</label>
            
                        <input
                            required
                            name="heur_debut"
                            class="form-control"
                            type="datetime-local"
                            value="{{ old('heur_debut') ?? $creneaux->heur_debut }}"
                        />
                        <label for="html5-datetime-local-input" class="col-md-2 col-form-label">Date fin</label>
                        
                        <input
                            required
                            name="heur_fin"
                            class="form-control"
                            type="datetime-local"
                            value="{{ old('heur_fin') ?? $creneaux->heur_fin}}"

                        />
                    </div>
                    <div class="col-md-6">
                        
                        <label for="html5-time-input" class="col-md-2 col-form-label">Durée</label>
                        
                        <input required class="form-control" name="duree" type="time" value="{{ old('duree') ?? $creneaux->duree }}"  />
                        
                        <label for="exampleFormControlSelect1" class="form-label">Lieu</label>
                        <select name="lieu" class="form-select" value="{{ old('lieu') ?? $creneaux->lieu }}" required aria-label="Default select example">
                        <option >selectionner</option>
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




@endsection