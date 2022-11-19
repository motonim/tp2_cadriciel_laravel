@extends('layouts.app')
@section('content')

  <div class="bg-light p-5 rounded">
    <h1>@lang('lang.text_newDocument')</h1>

    <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
          <input type="file" name="file" class="form-control" accept=".doc,.docx,.pdf,.zip">
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">@lang('lang.text_save')</button>
    </form>

  </div>

@endsection