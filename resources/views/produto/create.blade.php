@extends('templates.main')

@section('title', 'Novo Produto')

@section('content')
  @component('components.title')
    {{ __('Novo Produto') }}
  @endcomponent

  <div class="container">
    @if(isset($errors) && !empty($errors->all()))
      @foreach ($errors->all() as $error)
        @component('components.error_alert')
          {{ $error }}
        @endcomponent
      @endforeach
    @endif
    <form action="{{ route('product.store') }}" method="POST">
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="nome">Nome</label>
        </div>
        <div class="col-12 col-md-11">
          <input class="form-control" type="text" name="nome" id="nome" maxlength="255" value="{{ old('nome') ?? '' }}" required/>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="valor">Valor</label>
        </div>
        <div class="col-12 col-md-11">
          <input class="form-control" type="number" name="valor" id="valor" step="0.01" max="9999999.99" value="{{ old('valor') ?? ''}}" required/>
        </div>
      </div>
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="descricao">Descrição</label>
        </div>
        <div class="col-12 col-md-11">
          <textarea class="form-control" name="descricao" id="descricao" rows="5">{{ old('descricao') ?? '' }}</textarea>
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
      <div class="row my-5">
        <div class="col-12 col-md-1">
          <label class="col-form-label" for="fornecedor">Fornecedor</label>
        </div>
        <div class="col-12 col-md-11">
          <select class="form-control" name="fornecedor_id" id="fornecedor">
            @foreach ($fornecedores as $fornecedor)
              <option value="{{ $fornecedor->id }}">{{ $fornecedor->nome }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="text-center">
        <input class="btn btn-success mb-5" type="submit" value="cadastrar"/>
      </div>
      @csrf
    </form>
  </div>
@endsection