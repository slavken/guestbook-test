@extends('layouts.default')

@section('content')
<h1 class="text-center h2">Вход в Админ панель</h1>
  <form class="col-md-8 mx-auto" action="{{ route('admin.login') }}" method="post">
    @csrf

    @if ($errors->any())
      <div class="alert alert-danger mt-3">
        <ul>
          @foreach ($errors->all() as $key => $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="form-group">
      <label for="email">Email адрес</label>
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" aria-describedby="emailHelp" placeholder="Email" required autofocus>
      <small id="emailHelp" class="form-text text-muted">
        We'll never share your email with anyone else.
      </small>
    </div>
    <div class="form-group">
      <label for="password">Пароль</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password" required>

      @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
    </div>
    <div class="form-group">
      <div class="col-md-6 mx-auto">
        <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_KEY') }}"></div>
      </div>
    </div>
    <button type="submit" class="btn btn-lg btn-block btn-info">
      Войти
    </button>
  </form>
@endsection
