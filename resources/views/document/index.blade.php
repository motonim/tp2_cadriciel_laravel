@extends('layouts.app')
@section('content')

<div class="container">
  <div class="d-flex justify-content-between align-items-center py-5 px-5 bg-light">
      <a href="{{ route('document.create') }}" class="btn btn-outline-secondary ms-3">@lang('lang.text_newDocument')</a>
  </div>
  @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   @endif
  <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">@lang('lang.text_name')</th>
              <th scope="col">@lang('lang.text_user')</th>
              <th scope="col">@lang('lang.text_size')</th>
              <th scope="col">@lang('lang.text_type')</th>
              <th scope="col">@lang('lang.text_action')</th>
            </tr>
          </thead>
          <tbody>
            @foreach($documents as $document)
              <tr>
                <td width="3%">{{ $document->id }}</td>
                <td width="40%">{{ $document->title }}</td>
                <td width="10%">{{ $document->hasUser->name }}</td>
                <td width="10%">{{ $document->size }}</td>
                <td width="10%">{{ $document->type }}</td>
                <td style="text-align:center">
                  <a href="{{route('document.download', $document->id)}}" class="btn btn-primary smaller-font">@lang('lang.text_download')</a>

                  @if(Auth::user()->id == $document->hasUser->id)

                  <button type="button" class="btn btn-warning smaller-font" data-bs-toggle="modal" data-bs-target="#editDocument">
                  @lang('lang.text_edit')
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="editDocument" tabindex="-1" aria-labelledby="editDocumentLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="p-4">
                           <form action="{{route('document.update', $document->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('PUT')
                              <div class="form-group mt-4">
                                 <input type="file" name="file" class="form-control" accept=".doc,.docx,.pdf,.zip">
                              </div>
                              <button class="w-100 btn btn-lg btn-primary mt-4" type="submit">@lang('lang.text_save')</button>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>


                  <button type="button" class="btn btn-danger smaller-font" data-bs-toggle="modal" data-bs-target="#deleteDocument">
                  @lang('lang.text_delete')
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="deleteDocument" tabindex="-1" aria-labelledby="deleteDocumentLabel" aria-hidden="true">
                     <div class="modal-dialog">
                        <div class="modal-content">
                           <div class="p-4">
                           <form action="{{route('document.edit', $document->id)}}" method="POST" enctype="multipart/form-data">
                              @csrf
                              @method('DELETE')
                              <div class="modal-header">
                                 <h1 class="modal-title fs-5" id="deleteDocumentLabel">@lang('lang.text_sure')</h1>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                 @lang('lang.text_deleteMessage')
                              </div>
                              <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('lang.text_close')</button>
                                    <input type="submit" class="btn btn-danger" value="@lang('lang.text_delete')">
                              </div>
                           </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
               </td>
               
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="d-flex justify-content-center">
      {{ $documents->links() }}
      </div>
</div>


@endsection