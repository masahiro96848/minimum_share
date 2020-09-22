@extends('app')

@section('title', 'コメント編集')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="POST" action="{{ route('comments.update', ['product_id' => $product->id, 'comment_id' => $comment->id])}}" enctype="multipart/form-data">
          @include('comments.form')
          @method('PUT')
          @csrf
          <button class="c-button c-button--submit" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
  @include('footer')
@endsection