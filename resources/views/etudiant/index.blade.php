@extends('layouts.app')
@section('content')
<div class="container">
   <div class="p-4 p-md-5 mb-4 rounded text-bg-dark">
      <div class="col-md-6 px-0">
         <h1 class="display-4 fst-italic">{{$title}}</h1>
         <p>Ce site web est d'enregistrer les nouveaux étudiants, modifier et supprimer les informations d'un(e) étudiant(e), et afficher toute la liste d'étudiants </p>
      </div>
   </div>
   <div class="card-body">
   
      <table class="table table-striped">
         <thead>
            <tr class="table-primary">
               <th scope="col">ID</th>
               <th scope="col">Nom</th>
               <th scope="col">Téléphone</th>
               <th scope="col">Courriel</th>
            </tr>
         </thead>
         <tbody>
         @forelse($etudiants as $etudiant)
         <tr>
            <td scope="row">{{$etudiant->id}}</td>
            <td><a href="{{route('etudiant.show', $etudiant->id)}}">{{$etudiant->nom}}</a></td>
            <td>{{$etudiant->phone}}</td>
            <td>{{$etudiant->email}}</td>
         </tr>
         @empty
         <tr>
            <td colspan="4">Aucun étudiant est enrégistré</td>
         </tr>
         @endforelse
         </tbody>
      </table>

      <div class="d-flex justify-content-center">
      {{ $etudiants->links() }}
      </div>

   </div>
</div>
@endsection