@extends('layouts.app')
@section('content')
<div class="container">
   <div class="p-4 p-md-5 mb-4 rounded text-bg-dark"> 
      <div class="px-0">
         <h1 class="display-4 fst-italic">{{$title}}</h1>
      </div>
   </div>
   <div class="row">
      <div class="col-md-6 mx-auto">
         <div class="card card-body bg-light my-5">
               <div class="form-group mb-3">
                  <label for="nom">Nom: <sup>*</sup></label>
                  <input type="text" name="nom" class="form-control" value="{{ $etudiant->nom }}" disabled>
               </div>

               <div class="form-group mb-3">
                  <label for="adresse">Adresse: <sup>*</sup></label>
                  <input type="text" name="adresse" class="form-control" value="{{ $etudiant->adresse }}" disabled>
               </div>

               <div class="form-group mb-3">
                  <label for="phone">Téléphone: <sup>*</sup></label>
                  <input type="text" name="phone" class="form-control" value="{{ $etudiant->phone }}" disabled>
               </div>

               <div class="form-group mb-3">
                  <label for="email">Courriel: <sup>*</sup></label>
                  <input type="email" name="email" class="form-control" value="{{ $etudiant->email }}" disabled>
               </div>

               <div class="form-group mb-3">
                  <label for="birthday">Date de naissance: <sup>*</sup></label>
                  <input type="text" name="birthday" class="form-control" value="{{ $etudiant->birthday }}" disabled>
               </div>

               <div class="form-group mb-3">
                  <label class="my-1 mr-2" for="ville">Ville</label>
                  <input type="text" id="ville" name="ville_id" class="form-control" value="{{ $etudiant->selectVille->nom }}" disabled>
               </div>
               
               <div class="row">
                  <div class="d-flex justify-content-between">
                     <div>
                        <a href="{{route('etudiant.index')}}" class="btn btn-primary">Retourner</a>
                     </div>
                     <div>
                        <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-success">Modifier</a>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
@endsection