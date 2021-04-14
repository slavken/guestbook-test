@extends('layouts.default')

@section('title', 'Гостевая книга')

@section('content')
  <div>
    <h1 class="text-center">Гостевая книга</h1>

    <form-component></form-component>

    <hr class="mb-4" />

    <h2 class="h3">
      <i class="far fa-envelope"></i>
      Сообщения
    </h2>

    @if ($messages->isNotEmpty())
      @foreach ($messages as $item)
        @include('includes.card')
      @endforeach
    @else
      <p>Не найдено</p>
    @endif


    <div class="d-flex justify-content-center mt-4">
      {{ $messages->links() }}
    </div>
  </div>
@endsection
