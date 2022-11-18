@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row">
      <div class="col-md-6 mx-auto">
         <div class="card card-body bg-light my-5">
            <h2>Ajoutez un(e) nouvel(le) étudiant(e)</h2>
            <p>veuillez remplir le formulaire ci-dessous</p>
            <form method="post">
               @csrf
               <div class="form-group mb-3">
                  <label for="nom">Nom: <sup>*</sup></label>
                  <input type="text" name="nom" class="form-control" placeholder="e.g. Peter Jackson" required>
               </div>

               <div class="form-group mb-3">
                  <label for="adresse">Adresse: <sup>*</sup></label>
                  <input type="text" name="adresse" class="form-control" placeholder="e.g. 3800 R. Sherbrooke E, Montréal, QC H1X 2A2" required>
               </div>

               <div class="form-group mb-3">
                  <label for="phone">Téléphone: <sup>*</sup></label>
                  <input type="text" name="phone" class="form-control" placeholder="e.g. 123-456-7899" required>
               </div>

               <div class="form-group mb-3">
                  <label for="email">Courriel: <sup>*</sup></label>
                  <input type="email" name="email" class="form-control" placeholder="e.g. peterjackson@gmail.com" required>
               </div>

               <div class="form-group mb-3">
                  <label for="birthday">Date de naissance: <sup>*</sup></label>
                  <input type="text" name="birthday" class="form-control" placeholder="e.g. 1990-09-30" required>
               </div>

               <div class="form-group mb-3">
                  <label class="my-1 mr-2" for="ville">Ville</label>
                  <select class="form-select my-1 mr-sm-2" id="ville" name="ville_id">
                     <option selected>Selectionner votre ville</option>
                     @foreach($villes as $ville)
                     <option value="{{$ville->id}}">{{$ville->nom}}</option>
                     @endforeach
                  </select>
               </div>
               
               <div class="row">
                  <div class="d-flex justify-content-between">
                     <div>
                        <a href="{{ route('etudiant.index') }}" class="btn btn-primary">Retourner</a>
                     </div>
                     <div>
                        <input type="submit" value="Ajouter" class="btn btn-success">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection