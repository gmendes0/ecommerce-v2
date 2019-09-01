@extends('templates.main')

@section('title', 'Produtos')

@section('content')
  @component('components.title')
    {{ __('Produtos') }}
  @endcomponent

  <div class="container">
    <table class="table">
      <thead class="table-dark">
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Valor</td>
          <td>Status</td>
        </tr>
      </thead>

      <tbody>
        @forelse($produtos as $produto)
          <tr>
            <td>#{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->valor }}</td>
            <td>{{ $produto->active ? 'ativo' : 'inativo' }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4">Nenhum produto encontrado. <a href="#">Cadastrar novo produto</a></td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
