@extends('layouts.app')
@section('content')
<div class="article-hero"></div>
<div class="container">
   <div class="row">
      <div class='col-lg-8 col-md-10 mx-auto'>
         @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
               {{ session('success') }}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
         @endif

         <a href="{{route('article.create')}}" class="btn btn-outline-secondary">@lang('lang.text_newArticle')</a>

         @forelse($articles as $article)

         <div class="post-preview">
            <a href="{{ route('article.show', $article->id)}}">
               <h3 class="post-title">{{$article->title}}</h3>
               <h5 class="post-content">{{ Str::limit($article->content, 100) }}</h5>
            </a>
            <div class="d-flex justify-content-between pt-3">
               <p class="post-author">@lang('lang.text_author'): {{$article->HasAuthor->name}}</p>
               <p class="post-date">{{$article->created_at}}</p>
            </div>
            
         </div>

         @empty
         <div class="post-preview">@lang('lang.text_nothing')
         </div>
         @endforelse

      </div>
   </div>
</div>
@endsection