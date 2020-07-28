@extends('app')

@section('title', '新規登録')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            <h3 class="c-form--title">Register</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('register')}}">
              @csrf
              <label for="nickname">NickName</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="nickname" required value="{{ old('nickname')}}">
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
              {{-- <div class="c-button--form"> --}}
                <button class="c-button--submit " type="submit">Register</button>
              {{-- </div> --}}
            </form>
          </div>
        </div>  
      </div>
    </div>
@endsection