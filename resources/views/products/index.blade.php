@extends('app')

@section('title', '商品一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper l-container--between ">
      @foreach ($products as $product)
        <div class="p-panel--box ">
        <a href="{{route('products.show', [$product->id])}}">
          <div class="p-panel--image">
            <img src="{{ $product->photo}}" class="c-shadow--image" alt="">
          </div>
        </a>
        <div class="p-panel--body">
          <h5 class="p-panel--title">{{ $product->title }}</h5>
          <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
        </div>
        <div class="c-product--wrapper">
          
          <a href="{{ route('users.mypage')}}">
            <img src="{{asset('storage/' . $product->user->profile_image)}}" alt="" class="c-user--image">
          </a>
          
          <span class="c-user--name">{{ $product->user->name}}</span>
        </div>
        <div class="c-product--wrapper--between">
           <p class="c-product--date">{{ $product->created_at->format('Y-m-d')}}</p> 
          <span class="c-product--price">¥{{ $product->price}} </span>
        </div>
      </div>
      @endforeach
    </div>
  </div>
  @include('footer')
@endsection