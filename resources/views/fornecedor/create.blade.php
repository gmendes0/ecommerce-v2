@extends('templates.main')
@section('title', 'Novo Fornecedor')
@section('content')
  <div class="container">
    <div class="col-12 p-5 mb-5">
        <h2 class="text-center text-muted">Novo Fornecedor</h2>
      </div>
    
      @if(!empty($errors->all()))
        @foreach($errors->all() as $error)
          <div class="row justify-content-center">
            <div class="alert alert-danger text-center col-12 col-md-5">
              {{ $error }}
            </div>
          </div>
        @endforeach
      @endif

      <form method="POST" action="{{ route('supplier.store') }}">
        <div class="row my-5">
          <div class="col-12 col-md-1">
            <label class="col-form-label" for="nome">Nome</label>
          </div>
          <div class="col-12 col-md-11">
            <input class="form-control" type="text" name="nome" id="nome" maxlength="100" required/>
          </div>
        </div>
        <div class="row my-5">
          <div class="col-12 col-md-1">
            <label class="col-form-label" for="email">Email</label>
          </div>
          <div class="col-12 col-md-11">
            <input class="form-control" type="email" name="email" id="email" maxlength="255" required/>
          </div>
        </div>
        <div class="row my-5">
          <div class="col-12 col-md-1">
            <label class="col-form-label" for="cnpj">CNPJ</label>
          </div>
          <div class="col-12 col-md-11">
            <input class="form-control" type="number" name="cnpj" id="cnpj" max="99999999999999" required/>
          </div>
        </div>
        <div class="row my-5">
          <div class="col-12 col-md-1">
            <label class="col-form-label" for="active">Status</label>
          </div>
          <div class="col-12 col-md-11">
            <select class="form-control" name="active" id="active">
              <option value="0">Inativo</option>
              <option value="1">Ativo</option>
            </select>
          </div>
        </div>
        <div class="text-center">
          <input class="btn btn-success mb-5" type="submit" value="cadastrar"/>
        </div>
        @csrf()
      </form>
  </div>
@endsection
