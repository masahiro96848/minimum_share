@extends('app')

@section('title', 'パスワード再設定')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--wrapper u-width_100">
        <div class="l-container--form">
          <div class="c-form--container">
            @include('error')
            <h3 class="c-form--title">Password Reset</h3>
          </div>
          <div class="c-form--body">
            <form method="post" action="{{ route('password.email')}}">
              @csrf
              <label for="email">Email</label>
              <div class="c-form">
                <input type="text" class="c-form--control" name="email" required >
              </div>
                <button class="c-button c-button--submit " type="submit">Send Email</button>
            </form>
          </div>
        </div>  
      </div>
    </div>
  @include('footer')
@endsection