@extends('templates.main')

@section('title', 'Produto #'.$produto->id)

@section('content')
@component('components.title')
  {{ 'FORNECEDOR - '.$produto->nome.' #'.$produto->id }}
@endcomponent
<div class="container">
  @if (!empty(Session::get('success')))
    @component('components.success_alert')
      {{ Session::get('success') }}
    @endcomponent
  @endif

  @if (!empty(Session::get('alert')))
    @component('components.error_alert')
      {{ Session::get('alert') }}
    @endcomponent
  @endif
  <div class="card mt-5 mb-5 shadow">
    <div class="card-header">
      <form action="{{ route('product.destroy', $produto->id) }}" method="POST">
        <!-- link edit -->
        <a href="{{route('product.edit', $produto->id)}}" class="btn btn-outline-warning">editar</a>
        <!-- link delete -->
        <input type="submit" value="apagar" class="btn btn-outline-danger"/>
        <a href="{{ route('photo.create', $produto->id) }}" class="btn btn-outline-primary">adcionar foto</a>
        @method('DELETE')
        @csrf
      </form>
    </div>
    <div class="card-body">
      <h6 class="card-title text-center"><span class="text-muted">nome: </span><span>{{ ucwords($produto->nome) }}</span></h6>
      <h6 class="card-title text-center"><span class="text-muted">valor: </span><span class='moeda'>{{ $produto->valor }}</span></h6>
      <h6 class="card-title text-center"><span class="text-muted">descrição: </span><span>{{ empty($produto->descricao) ? 'Nenhum' : $produto->descricao }}</span></h6>
      <h6 class="card-title text-center"><span class="text-muted">fornecedor: </span><span>{{ $produto->fornecedor->nome }}</span></h6>
      <h6 class="card-title text-center"><span class="text-muted">status: </span><span>{{ $produto->active ? 'ATIVO' : 'INATIVO' }}</span></h6>
    </div>
  </div>
  <table class="table" class="my-5">
    <thead class="table-dark">
      <tr>
        <th colspan="4" class="text-center">FOTOS</th>
      </tr>
      <tr>
        <td class="text-center">imagem</td>
        <td>Tipo</td>
        <td>Extensão</td>
        <td>Status</td>
      </tr>
    </thead>

    <tbody>

      @forelse ($produto->photos as $photo)
        {{-- <div class="card" style="width: 16rem">
          <img src="{{ asset('storage/produtos/'.$produto->id.'/'.$photo->name) }}" alt="" class="card-img-top"/>
        </div> --}}
        <tr>
          <td class="text-center">
            <img src="{{ asset('storage/produtos/'.$produto->id.'/'.$photo->name) }}" alt="" class="img-thumbnail" width="150px"/>
          </td>
          <td>{{ $photo->type }}</td>
          <td>{{ $photo->extension }}</td>
          <td>{{ __(1) }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="text-center">Nenhuma imagem encontrada. <a href="{{ route('photo.create', $produto->id) }}">Adcionar imagens.</a></td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection