@extends('medecins.layouts.app')

@section('titre', 'liste des creneaux')

@section('content')


 <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
        <h5 class="card-header">Table des creneaux</h5>
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
                            <a class="dropdown-item" href="{{ route('medecin.creneaux.edit',$creneau) }}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                            <form action="{{ route('medecin.creneaux.destroy', $creneau) }}" method="post" >
                            @method('DELETE')
                            @csrf
                            <button class="dropdown-item btn btn-primary"
                            ><i class="bx bx-trash me-1"></i> Delete</
                            >
                            </form>
                        </div>
                        </div>
                    </td>
                </tr>
                
                @endforeach
                </td>
                
            </tbody>
            </table>
            <div class="container-fluid">
                
                {{ $creneaux->links() }}
            </div>
        </div>
        </div>

    </div>


@endsection