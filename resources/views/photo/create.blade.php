@extends('templates.main')

@section('title', 'Adcionar imagens')

@section('content')
  @component('components.title')
    {{ $produto->nome.' - Imagens' }}
  @endcomponent

  {{-- <div class="container">
    @if(!empty(Session::get('alert')))
      @component('components.error_alert')
        {{ Session::get('alert') }}
      @endcomponent
    @endif
    <form action="{{ route('photo.store', $produto->id) }}" method="POST" enctype="multipart/form-data">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-10 my-2">
            <div class="card p-2">
              <input class="form-control-file photo-upload" type="file" name="photo" id="photo"/>
            </div>
          </div>
        </div>
      @csrf
      <div class="text-center my-5">
        <input type="submit" value="salvar" class="btn btn-success"/>
      </div>
    </form>
  </div> --}}

  {{-- v1 --}}
  <div class="container">

    <div id="error_area" style="display:none">
      @component('components.error_alert')
        {{ __('') }}
      @endcomponent
    </div>
    <div id="success_area" style="display:none">
      @component('components.success_alert')
        {{ __('') }}
      @endcomponent
    </div>

    {{-- Submit via JS --}}
    <form enctype="multipart/form-data" id="photo-form" method="POST">
      <div id="arquivos" data-url="{{ route('photo.api.save', $produto->id) }}" data-redirect="{{ route('product.show', $produto->id) }}">
        <div class="row justify-content-center">
          <div class="col-12 col-sm-10 my-2">
            <div class="card p-2">
              <input class="form-control-file photo-upload" type="file" name="photo[]" id="photo" multiple/>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center my-5">
        <a id="enviar" href="" class="btn btn-success">
          enviar <span id="loading-spinner" class="spinner-border spinner-border-sm" style="display: none"></span>
        </a>
      </div>
    </form>
  </div>
@endsection

@push('jscripts')
  <script src="{{ asset('assets/js/files.js') }}"></script>
@endpush