@extends('templates.main')
@section('title', isset($supplier) ? 'Editar Fornecedor' : 'Novo Fornecedor')
@section('content')
  @component('components.title')
    {{ isset($supplier) ? 'Editar Fornecedor - #'.$supplier->id : 'Novo Fornecedor'}}
  @endcomponent
  <div class="container">

    @if(!empty($errors->all()))
      @foreach($errors->all() as $error)
        <div class="row justify-content-center">
          <div class="alert alert-danger text-center col-12 col-md-5">
            {{ $error }}
          </div>
        </div>
      @endforeach
    @endif

    <form method="POST" action="{{ isset($supplier) ? route('supplier.update', $supplier->id) : route('supplier.store') }}">
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="nome">Nome</label>
        </div>
        <div class="col-12 col-md-11">
          <input class="form-control" type="text" name="nome" id="nome" maxlength="100" value="{{ old('nome') ?? $supplier->nome ?? '' }}"/>
          <div id="nome-feedback"></div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="email">Email</label>
        </div>
        <div class="col-12 col-md-11">
          <input class="form-control" type="email" name="email" id="email" maxlength="255" value="{{ old('email') ?? $supplier->email ?? ''}}"/>
          <div id="email-feedback"></div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="cnpj">CNPJ</label>
        </div>
        <div class="col-12 col-md-11">
          <input class="form-control" type="number" name="cnpj" id="cnpj" max="99999999999999" value="{{ old('cnpj') ?? $supplier->cnpj ?? ''}}"/>
          <div id="cnpj-feedback"></div>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="active">Status</label>
        </div>
        <div class="col-12 col-md-11">
          <select class="form-control" name="active" id="active">
            <option value="0" {{ old('active') ?? isset($supplier->active) && $supplier->active == 0 ? 'selected' : ''  }}>Inativo</option>
            <option value="1" {{ old('active') ?? isset($supplier->active) && $supplier->active == 1 ? 'selected' : ''  }}>Ativo</option>
          </select>
        </div>
      </div>
      <div class="text-center">
        <a href="" class="btn btn-success mb-5" id="btnSubmit">{{isset($supplier) ? 'atualizar' : 'cadastrar'}}</a>
        {{-- <input class="btn btn-success mb-5" type="submit" value="{{isset($supplier) ? 'atualizar' : 'cadastrar'}}"/> --}}
      </div>
      @if(isset($supplier))
        @method('PUT')
      @endif
      @csrf()
    </form>
  </div>
@endsection

@push('jscripts')
  <script src="{{ asset('assets/js/validators/fornecedores.js') }}"></script>
@endpush
