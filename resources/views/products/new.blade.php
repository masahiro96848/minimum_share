@extends('app')

@section('title', '商品投稿')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="POST" action="{{ route('products.create')}}" enctype="multipart/form-data">
          @csrf
          @include('products.form')
          <button class="c-button c-button--submit " type="submit">Post</button>
        </form>
      </div>
    </div>
  </div>
  @include('footer')  
@endsection