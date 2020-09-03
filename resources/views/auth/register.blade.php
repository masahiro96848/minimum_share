@extends('app')

@section('title', '新規登録')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">Register</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('register')}}">
              @csrf
              <label for="nickname">NickName</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="name" required value="{{ old('name')}}">
              </div>
              <label for="email">Email</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="email" required value="{{ old('email')}}">
              </div>
              <label for="email">Password</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password" required>
              </div>
              <label for="email">Password Confirmation</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password_confirmation" required>
              </div>
                <button class="c-button c-button--submit " type="submit">Sign up</button>
                <a href="{{ route('login.{provider}', ['provider' => 'google'])}}" class="c-button c-button--google " type="submit">
                  <i class="fa fa-google fa-2x" style="margin-right: 10px" aria-hidden="true"></i>
                    Google 新規登録
                </a>
                <p class="c-form--link">ログインは<a href="{{ route('login')}}">こちら</a></p>
            </form>
          </div>
        </div>  
      </div>
    </div>
  @include('footer')
@endsection