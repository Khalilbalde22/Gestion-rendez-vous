@extends('patients.layouts.app')

@section('titre', 'liste des creneaux')

@section('content')


    <div class="container-xxl flex-grow-1 container-p-y">
          @include('shared.alerte')
        <!-- Transactions -->
        <div class="row">
            @foreach ($rendezvous as $rendezvou )
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Rendez-vous </h5>
                    </div>
                        
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                                </div>
                                    <h5>medecin info </h5>
                                    <h6>medecin adresse </h6>
                                    <h6>medecin contact </h6>
                            </div>
                            <div class="col-md-8">
                                 <div class="me-2">
                                <small class="text-muted d-block mb-1">heur debut</small>
                                <h6 class="mb-0">{{ $rendezvou->heur_debut }}</h6>
                                <small class="text-muted d-block mb-1">heur debut</small>
                                <h6 class="mb-0">{{ $rendezvou->heur_fin }}</h6>
                                </div>
                                 <div class="me-2">
                                    <small class="text-muted d-block mb-1">Date</small>
                                    <h6 class="mb-0">{{ $rendezvou->date_debut }}</h6>
                                </div>
                                 <div class="me-2">
                                    <small class="text-muted d-block mb-1">Lieu</small>
                                    <h6 class="mb-0">{{ $rendezvou->lieu }}</h6>
                                </div>
                                 <div class="me-2">
                                    <a href ="{{ route('patient.redevousAction', $rendezvou) }}"class="btn btn-danger mt-3">Annuler le rendez-vous</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                </div>
            @endforeach
        </div>
                <!--/ Transactions -->

    </div>


@endsection