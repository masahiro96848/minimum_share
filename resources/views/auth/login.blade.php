@extends('app')

@section('title', 'ログイン')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">Login</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('login')}}">
              @csrf
              <label for="email">Email</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="email" required value="{{ old('email')}}">
              </div>
              <label for="email">Password</label>
              <div class="c-form">
                <input type="password" class="c-form--control" name="password" required>
              </div>
                <button class="c-button c-button--submit " type="submit">Login</button>
                <p class="c-form--link">新規登録は<a href="{{ route('register')}}">こちら</a></p>
            </form>
          </div>
        </div>  
      </div>
    </div>
  @include('footer')
@endsection