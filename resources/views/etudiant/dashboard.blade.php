@extends('layouts.app')
@section('content')

@php $locale = session()->get('locale'); @endphp
<div class="container">
  <div class="d-flex justify-content-between align-items-center py-5 px-5 bg-light">
    <h1>@lang('lang.text_hello'), {{ $name }}</h1>
    <div class="d-flex justify-content-between align-items-center">
      <a href="{{route('article.create')}}" class="btn btn-outline-secondary">@lang('lang.text_newArticle')</a>
      <a href="{{route('document.index')}}" class="btn btn-outline-secondary ms-3">Documents</a>
    </div>
  </div>
  

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


@endsection