@extends('patients.layouts.app')

@section('titre', 'ajouter patient')


@section('content')



<!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Paramètres du /</span> Compte</h4>
@include('shared.alerte')
              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Compte</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-notifications.html"
                        ><i class="bx bx-bell me-1"></i> Medecin</a
                      >
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="pages-account-settings-connections.html"
                        ><i class="bx bx-link-alt me-1"></i> Connections</a
                      >
                    </li>
                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Details du profil</h5>
                    <!-- Account -->
                    <div class="card-body">

                    <div class="d-flex align-items-start align-items-sm-center gap-4 form-control">
                        <img src = ""
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          
                        />
                <form action="{{ route('patient.patient.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                      
                        <div class="button-wrapper">
                          <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Télécharger une photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input name="image" type="file" id="upload" class="account-file-input form-control"
                            />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">annuler</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Taille max 800K</p>
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Nom</label>
                            <input class="form-control" type="text" name="nom" value="John"/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="lastName" class="form-label">Prenom</label>
                            <input class="form-control" type="text" name="prenom" value="value" id="lastName"  />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="text" name="email" value="value" placeholder="john.doe@example.com"
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="organization" class="form-label">Adresse</label>
                            <input type="text" class="form-control" value="value" name="adresse"  />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">lieu</label>
                            <input type="text" class="form-control" value="value" name="lieu" placeholder="Address" />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Telephone</label>
                            <div class="input-group input-group-merge">
                              <span class="input-group-text">US (+1)</span>
                              <input type="text" name="telephone" value="value" class="form-control" placeholder="202 555 0111" />
                            </div>
                          </div>
                          
                          <div class="mb-3 col-md-6">
                            <label for="currency" class="form-label"> Medecin</label>
                            <select name="medecins[]" multiple class="select2 form-select">
                            @foreach ($medecins as $medecin => $v )
                                
                              <option value="{{ $medecin }}">{{ $v }}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Enregistrer</button>
                          <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                        </div>
                </form>
                    </div>
                    <!-- /Account -->
                  </div>
                  <div class="card">
                    <h5 class="card-header">Supprimer votre compte</h5>
                    <div class="card-body">
                      <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                          <h6 class="alert-heading fw-bold mb-1">Are you sure you want to delete your account?</h6>
                          <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
                        </div>
                      </div>
                      <form id="formAccountDeactivation">
                        <div class="form-check mb-3">
                          <input
                            class="form-check-input"
                            type="checkbox"
                            name="accountActivation"
                            id="accountActivation"
                          />
                          <label class="form-check-label" for="accountActivation"
                            >I confirm my account deactivation</label
                          >
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Deactivate Account</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->




@endsection