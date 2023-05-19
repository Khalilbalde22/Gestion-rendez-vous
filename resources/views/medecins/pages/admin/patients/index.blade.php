@extends('medecins.layouts.app')

@section('titre', 'liste des patients')

@section('content')


 <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
        <h5 class="card-header">Mes patients</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
            <thead class="table-light">
                <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Email</th>
                <th>Adresse</th>
                <th>lieu</th>
                <th>telephone</th>
                <th>image</th>
                <th>status</th>
                <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($patients as $patient )
                <tr>
                    <td>{{ $patient->nom }}</td>
                    <td>{{ $patient->prenom }}</td>
                    <td>{{ $patient->email }}</td>
                    <td>{{ $patient->adresse }}</td>
                    <td>{{ $patient->lieu }}</td>
                    <td>{{ $patient->telephone }}</td>
                    <td><img src="{{ $patient->imageUrl() }}" alt=""></td>
                    <td>{{ $patient->status }}</td>
                    <td>
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('medecin.patients.edit',$patient) }}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a
                            >
                           <form action="{{ route('medecin.patients.destroy', $patient) }}" method="post" >
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
                
                {{ $patients->links() }}
            </div>
        </div>
        </div>

    </div>


@stop