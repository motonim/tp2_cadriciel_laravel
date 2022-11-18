@extends('layouts.app')
@section('content')

<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase">@lang('lang.text_login')</h2>
              <p class="text-white-50 mb-5">@lang('lang.text_loginmsg')</p>

              @if(session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session('success') }}
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
               @endif

               @if($errors)
                     @foreach($errors->all() as $error)
                     <ul class="alert alert-danger">
                        <li class="text-danger">{{ $error }}</li>
                     </ul>
                     @endforeach
                  @endif

               <form action="{{ route('login.authentication') }}" method="post">
                  @csrf
                  <div class="form-outline form-white mb-4">
                     <input type="email" placeholder="@lang('lang.text_email')" id="email" name="email" class="form-control form-control-lg" value="{{old('email')}}" autofocus/>
                  </div>

                  <div class="form-outline form-white mb-4">
                     <input type="password" placeholder="@lang('lang.text_password')" id="password" name="password" class="form-control form-control-lg" />
                  </div>

                  <input type="submit" class="btn btn-outline-light btn-lg px-5" value="Login">

               </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection