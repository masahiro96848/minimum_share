@extends('app')

@section('title', $user->name. 'のマイページ')
    
@section('content')
  @include('nav')
    @include('users.user')
  @include('footer')  
@endsection

