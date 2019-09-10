@extends('templates.main')

@section('title', 'Produtos')

@section('content')
  @component('components.title')
    {{ __('Produtos') }}
  @endcomponent

  <div class="container">
    <table class="table shadow-lg">
      <thead class="table-dark">
        <tr>
          <td>ID</td>
          <td>Nome</td>
          <td>Valor</td>
          <td>Status</td>
          <td class="text-right pr-5 mr-5">Ações</td>
        </tr>
      </thead>

      <tbody>
        @forelse($produtos as $produto)
          <tr>
            <td>#{{ $produto->id }}</td>
            <td>{{ $produto->nome }}</td>
            <td class="moeda">{{ $produto->valor }}</td>
            <td>{{ $produto->active ? 'ativo' : 'inativo' }}</td>
            <td class="text-right">
              <form action="{{ route('product.destroy', $produto->id) }}" method="post">
                <a href="{{ route('product.show', $produto->id) }}" class="btn btn-info">Info</a>
                <a href="{{ route('product.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
                <input type="submit" value="Apagar" class="btn btn-danger"/>
                @method('DELETE')
                @csrf
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center">Nenhum produto encontrado. <a href="{{ route('product.create') }}">Cadastrar novo produto</a></td>
          </tr>
        @endforelse
      </tbody>
    </table>

    @component('components.pages')
      {{ $produtos->links() }}
    @endcomponent
  </div>
@endsection
