@extends('app')

@section('title', '商品編集')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="POST" action="{{ route('products.update', ['id' => $product])}}" enctype="multipart/form-data">
          @include('products.form')
          @method('PUT')
          @csrf
          <button class="c-button--submit" type="submit">Update</button>
        </form>
      </div>
    </div>
  </div>
  @include('footer')
@endsection