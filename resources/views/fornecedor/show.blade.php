@extends('templates.main')
@if (empty($supplier))
  @section('title', 'Fornecedor - Não encontrado')
@else
  @section('title', 'Fornecedor - '.$supplier->nome)
  @section('content')
    <div class="container">
        <h3 class="mt-5 mb-5 text-center">FORNECEDOR - {{ $supplier->nome }}</h3>
        <div class="card mt-5 mb-5">
            <div class="card-header">
                <!-- link edit -->
                <a href="#" class="btn btn-outline-warning">editar</a>
                <!-- link delete -->
                <a href="#" class="btn btn-outline-danger">apagar</a>
            </div>
            <div class="card-body">
              <h6 class="card-title text-center"><span class="text-muted">nome: </span><span>{{ ucwords($supplier->nome) }}</span></h6>
              <h6 class="card-title text-center"><span class="text-muted">email: </span><span>{{ ucwords($supplier->email) }}</span></h6>
              <h6 class="card-title text-center"><span class="text-muted">cnpj: </span><span>{{ $supplier->cnpj }}</span></h6>
              <h6 class="card-title text-center"><span class="text-muted">status: </span><span>{{ $supplier->active ? 'ATIVO' : 'INATIVO' }}</span></h6>
            </div>
        </div>
    </div>
  @endsection
@endif