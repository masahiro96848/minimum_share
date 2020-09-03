@extends('app')

@section('title', 'google新規登録')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">Google Register</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('register.{provider}', ['provider' => $provider])}}">
              @csrf
              <input type="hidden" name="token" value="{{ $token }}">
              <label for="nickname">NickName</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="name" required >
              </div>
              <label for="email">Email</label>
              <div class="c-form">
                <input type="text" class="c-form--control u-background--form" name="email" required value="{{ $email}}" disabled>
              </div>
                <button class="c-button c-button--submit " type="submit">Sign up</button>
            </form>
          </div>
        </div>  
      </div>
    </div>
  @include('footer')
@endsection