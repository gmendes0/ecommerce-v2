@extends('templates.main')
@section('title', 'Lista Fornecedores')
@section('content')
  <div class="container">
    <div class="col-12 p-5 mb-5">
      <h2 class="text-center text-muted">Fornecedores</h2>
    </div>

    <table class="table shadow-lg">
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
              <a href="{{ route('supplier.show', $fornecedor->id) }}" class="btn btn-info">Detalhes</a>
              <a href="{{ route('supplier.edit', $fornecedor->id) }}" class="btn btn-warning">Editar</a>
              <button href="{{ route('supplier.destroy', $fornecedor->id) }}" class="btn btn-danger">Apagar</button>
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
@push('jscripts')

@endpush