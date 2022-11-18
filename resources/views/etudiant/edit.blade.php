@extends('layouts.app')
@section('content')

<div class="row">
      <div class="col-md-6 mx-auto">
         <div class="mt-2 rounded">
            <h1>{{$title}}</h1>
            <p>veuillez remplir le formulaire ci-dessous</p>
         </div>
         <div class="card card-body bg-light my-5">
            <form method="post">
               @csrf
               @method('PUT')
               <div class="form-group mb-3">
                  <label for="nom">Nom: <sup>*</sup></label>
                  <input type="text" name="nom" class="form-control" value="{{ $etudiant->nom }}" required>
               </div>

               <div class="form-group mb-3">
                  <label for="adresse">Adresse: <sup>*</sup></label>
                  <input type="text" name="adresse" class="form-control" value="{{ $etudiant->adresse }}" required>
               </div>

               <div class="form-group mb-3">
                  <label for="phone">Téléphone: <sup>*</sup></label>
                  <input type="text" name="phone" class="form-control" value="{{ $etudiant->phone }}" required>
               </div>

               <div class="form-group mb-3">
                  <label for="email">Courriel: <sup>*</sup></label>
                  <input type="email" name="email" class="form-control" value="{{ $etudiant->email }}" required>
               </div>

               <div class="form-group mb-3">
                  <label for="birthday">Date de naissance: <sup>*</sup></label>
                  <input type="text" name="birthday" class="form-control" value="{{ $etudiant->birthday }}" required>
               </div>

               <div class="form-group mb-3">
                  <label class="my-1 mr-2" for="ville">Ville</label>
                  <select class="form-select my-1 mr-sm-2" id="ville" name="ville_id">
                     @foreach($villes as $ville)                     
                        <option value="{{ $ville->id }}" {{ ( $ville->id == $etudiant->ville_id ) ? 'selected' : '' }}> {{ $ville->nom }} </option>
                     @endforeach
                  </select>
               </div>
               
               <div class="row">
                  <div class="d-flex justify-content-between">
                     <div>
                        <a href="{{route('etudiant.show', $etudiant->id)}}" class="btn btn-primary">Retourner</a>
                     </div>
                     <div>
                         <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerModal">
                        Supprimer
                        </button>

                       
                        <input type="submit" value="Mettre à jour" class="btn btn-success">
                     </div>
                  </div>
               </div>
            </form>
             <!-- Modal -->
             <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="supprimerModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <form action="{{route('etudiant.edit', $etudiant->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                              <h1 class="modal-title fs-5" id="supprimerModalLabel">Are you sure?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           Êtes-vous sur(e) de vouloir supprimer: <strong>{{ $etudiant->nom }}</strong>? On ne peut pas retourner en arrière.
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <input type="submit" class="btn btn-danger" value="Supprimer">
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection