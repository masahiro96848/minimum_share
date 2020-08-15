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
            <div class="p-panel--content">
              <h5 class="p-panel--title">{{ $product->title }}</h5>
              {{-- <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i> --}}
              <product-like
                :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($product->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('product.like', ['product' => $product])}}"
              >
            
              </product-like>
            </div>
            <div class="c-product--wrapper">
              @if (!isset($product->user->profile_image))
                <a href="{{ route('users.mypage')}}">
                  <img src="../img/no_image.jpg" alt="" class="c-user--image">
                </a>
              @else
                <a href="{{ route('users.mypage')}}">
                  <img src="{{$product->user->profile_image}}" alt="" class="c-user--image">
                </a>
              @endif
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
        </div>
      @endforeach
    </div>
  </div>
  @include('footer')
@endsection