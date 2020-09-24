@extends('app')

@section('title', 'コメント投稿')

@section('content')
  @include('nav')
  <div class="l-container">
     <div class="l-container--title">
      <h2 class="l-container--title--tag">Product Comment</h2>
    </div>
    <div class="l-container--wrapper u-pt_40 u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="POST" action="{{ route('comments.create', ['id' => $product->id])}}" enctype="multipart/form-data">
          @csrf
            @include('comments.form')
          <button class="c-button c-button--submit " type="submit">Post</button>
        </form>
      </div>
    </div>
  </div>
  @include('footer')  
@endsection

{{-- {{dd($product->id)}} --}}