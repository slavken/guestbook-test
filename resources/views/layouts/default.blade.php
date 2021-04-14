<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @hasSection('title')
    <title>@yield('title'){{' | ' . config('app.name') }}</title>
  @else
    <title>{{ config('app.name') }}</title>
  @endif

  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div id="app">
    @include('includes.navbar')
  
    <div class="container my-5">
      @yield('content')
    </div>
  </div>

  @include('includes.footer')

  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
