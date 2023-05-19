@extends('patients.layouts.app')

@section('titre', 'patient dashboard')

@section('content')

        
        <div class="container-xxl flex-grow-1">
        @include('shared.alerte')
        <!-- Transactions -->
        <div class="row">
                @foreach ($rendezvous as $rendezvou )
                <div class="col-md-4 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Rendez-vous</h5>
                      @if ($rendezvou->status==='1')
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>Actif</small>
                      @else
                        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>inactif</small>
                      @endif
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded" />
                                </div>
                                    <h5>{{ $rendezvou->user_id }}</h5>
                                    <h6>medecin info</h6>
                                    <h6> medecin info</h6>
                            </div>
                            <div class="col-md-8">
                                 <div class="me-2">
                                <small class="text-muted d-block mb-1">Date</small>
                                <h6 class="mb-0">{{ $rendezvou->heur_debut }}</h6>
                                </div>
                                 <div class="me-2">
                                    <small class="text-muted d-block mb-1">Date</small>
                                    <h6 class="mb-0">{{ $rendezvou->heur_fin }}</h6>
                                </div>
                                 <div class="me-2">
                                    <small class="text-muted d-block mb-1">Ville</small>
                                    <h6 class="mb-0">{{ $rendezvou->lieu }}</h6>
                                </div>
                                 <div class="me-2 display-flex justify-content-end">
                                 @if ($rendezvou->status == '1')
                                    <a href="{{ route('patient.redevousAction', $rendezvou) }}" class="btn btn-primary mt-3">Regerver</a>
                                     
                                 @else
                                    <button class="btn btn-warning mt-3">Indisponible</button>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    
                  </div>
                </div>
                @endforeach
                <!--/ Transactions -->
        </div>
    </div>




@endsection