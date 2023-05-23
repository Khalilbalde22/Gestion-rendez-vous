@extends('patients.layouts.app')

@section('titre', 'mes medecins')

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
            <div class="row mb-5">
            @foreach ($patients->medecins as $medecin)
            
                <div class="col-md-6">
                  <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ $medecin->imageUrl()}}" alt="Card image" />
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">{{ $medecin->prenom }}</h5>
                          <p class="card-text">
                            docteur specialse en cardiologie , et en medecine general , il a son cabine dentaire .
                          </p>
                          <h5>{{ $medecin->adresse }}</h5>
                          <h5>{{ $medecin->lieu }}</h5>
                          <div class="row">
                          <div class="col">
                          <h5 class="card-text"><a><small class="text-muted">{{$medecin->telephone }}</small></a></h5>
                          <h5 class="card-text"><a><small class="text-muted">{{$medecin->email }}</small></a></h5>
                          </div>
                          <div class="col">
                            <a href="" class="btn btn-primary">e-mail</a>
                          </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
            
</div>

@endsection