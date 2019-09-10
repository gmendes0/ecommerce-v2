@extends('templates.main')

@section('title', 'photos')

@section('content')
  @component('components.title')
    {{ __('Fotos') }}
  @endcomponent

  <div class="container">
    @forelse($photos as $photo)
      <div class="card-columns text-center">
        <div class="card">
          
        </div>
      </div>
    @empty
      <div class="text-center">
        <p>Nenhuma imagem encontrada. <a href="#">Adcionar imagens</a></p>
      </div>
    @endforelse
  </div>
@endsection