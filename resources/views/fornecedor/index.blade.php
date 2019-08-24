@extends('templates.main')
@section('title', 'Lista Fornecedores')
@section('content')
  <div class="container">
    <div class="col-12 p-5 mb-5">
      <h2 class="text-center text-muted">Fornecedores</h2>
    </div>

    <table class="table">
      <thead class="table-dark">
        <th>Nome</th>
        <th>Ativo</th>
        <th class="pr-5 text-right">Ações</th>
      </thead>

      <tbody>
        @forelse ($fornecedores as $fornecedor)
          <tr scope="row">
            <td>{{ $fornecedor->nome }}</td>
            <td>{{ $fornecedor->active ? 'ATIVO' : 'INATIVO' }}</td>
            <td class="text-right">
              <a href="#" class="btn btn-info">Detalhes</a>
              <a href="#" class="btn btn-warning">Editar</a>
              <a href="#" class="btn btn-danger">Apagar</a>
            </td>
          </tr>
        @empty
          <tr scope="row">
            <td colspan="3" class="text-center">
              Nenhum fornecedor cadastrado. <a href="{{ route('supplier.create') }}">Cadastrar novo fornecedor</a>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection