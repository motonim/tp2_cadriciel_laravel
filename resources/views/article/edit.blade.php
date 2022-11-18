@extends('layouts.app')
@section('content')

<main class="login-form">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8 pt-4">
            <div class="card">
               <h3 class="card-header text-center">@lang('lang.text_editArticle')</h3>
               <div class="card-body">
                  <form method="post">
                     @csrf
                     @method('PUT')
                     <div class="form-group mb-3">
                        <input type="text" value="{{ $article->title }}" id="title" name="title" class="form-control card-title" required>
                     </div>
                     <div class="form-group mb-3">
                        <textarea class="form-control card-text" name="content" rows="8" required>{{ $article->content }}</textarea>
                     </div>
                     <div class="d-grid mx-auto">
                        <input type="submit" class="btn btn-dark btn-block" value="@lang('lang.text_save')">
                     </div>
                     <input type="hidden" name="author_id" value="{{ Auth::user()->id }}">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>

@endsection