@extends('layouts.app')
@section('content')

<main class="login-form">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-8 pt-4">
            <div class="card">
               <h3 class="card-header text-center">@lang('lang.text_newArticle')</h3>
               <div class="card-body">
                  <form method="post">
                     @csrf
                     <div class="form-group mb-3">
                        <input type="text" placeholder="@lang('lang.text_title')" id="title" name="title" class="form-control card-title" required>
                     </div>
                     <div class="form-group mb-3">
                        <textarea class="form-control card-text" placeholder="@lang('lang.text_text')" id="exampleFormControlTextarea1" name="content" rows="8" required></textarea>
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