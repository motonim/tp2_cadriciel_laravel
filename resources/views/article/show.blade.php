@extends('layouts.app')
@section('content')

      
<div class="container">
   <div class="row">
      <h2>{{$article->title}}</h2>
      <p class="my-3">@lang('lang.text_author'): {{$article->hasAuthor->name}}</p>
      <p>{{$article->content}}</p>
      @if(Auth::user()->name == $article->hasAuthor->name)
      <div class="d-flex justify-content-between ">
         <!-- Button trigger modal -->
         <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#supprimerModal">Supprimer</button>
         <a href="{{route('article.edit', $article->id)}}" class="btn btn-success">Modifier</a>
      </div>
      @endif
      <!-- Modal -->
      <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="supprimerModalLabel" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <form action="{{route('article.edit', $article->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                              <h1 class="modal-title fs-5" id="supprimerModalLabel">Are you sure?</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           Êtes-vous sur(e) de vouloir supprimer: <strong>{{ $article->title }}</strong>? On ne peut pas retourner en arrière.
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
@endsection