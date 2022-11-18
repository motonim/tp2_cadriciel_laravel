<!DOCTYPE html>
<html lang="en">    
   <head>        
      <meta charset="utf-8">        
      <meta name="viewport" content="width=device-width, initial-scale=1">

   <title>{{ config('app.name') }}</title>
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">        
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
      <!-- <link rel="stylesheet" href="../../css/app.css"> -->
      <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">

</head>
<body>
      
@php $locale = session()->get('locale'); @endphp
<div class="container">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <a href="{{ route('etudiant.index') }}" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
      <span class="fs-4">Maisonneuve</span>
    </a>

    <ul class="nav nav-pills">
      <li class="nav-item"><a href="{{ route('etudiant.index') }}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" {{ (request()->is('/')) ? 'aria-current="page"' : '' }}>@lang('lang.text_home')</a></li>
      <li class="nav-item"><a href="{{ route('etudiant.create') }}" class="nav-link {{ (request()->is('etudiant-create')) ? 'active' : '' }}" {{ (request()->is('etudiant-create')) ? 'aria-current="page"' : '' }}>@lang('lang.text_newStudent')</a></li>
      <li class="nav-item"><a href="{{ route('article.index') }}" class="nav-link  {{ (request()->is('article')) ? 'active' : '' }}" {{ (request()->is('article')) ? 'aria-current="page"' : '' }}>Forum</a></li>
      @guest
      <li class="nav-item"><a href="{{ route('login') }}" class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" {{ (request()->is('login')) ? 'aria-current="page"' : '' }}>@lang('lang.text_login')</a></li>
      @else
      <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link  {{ (request()->is('dashboard')) ? 'active' : '' }}" {{ (request()->is('dashboard')) ? 'aria-current="page"' : '' }}>@lang('lang.text_myaccount')</a></li>
      <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">@lang('lang.text_logout')</a></li>
      @endguest
      <li class="nav-item"><a href="{{ route('lang', 'en') }}" class="nav-link @if($locale=='en') active @endif">En</a></li>
      <li class="nav-item"><a href="{{ route('lang', 'fr') }}" class="nav-link @if($locale=='fr') active @endif">Fr</a></li>
    </ul>
  </header>
</div>
@yield('content')

<div class="container">
  <hr>
  <footer class="py-3 d-flex justify-content-center">copyright &copy; Jaeri Park <script>document.write(new Date().getFullYear())</script></footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>