@extends('app')

@section('title', '商品一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--title--tag">Product List</h2>
    </div>
    <div class="l-container--wrapper u-pt_0 l-container--between">
      @foreach ($products as $product)
        <div class="p-panel--box">
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
            <div class="c-product--wrapper--between">
              <a href="{{ route('users.show', ['name' => $product->user->name])}}">
                @if (!isset($product->user->profile_image))
                  <img src="../img/no_image.jpg" alt="" class="c-user--image">
                @else
                  <img src="{{$product->user->profile_image}}" alt="" class="c-user--image">
                @endif
                <span class="c-user--name">{{ $product->user->name}}</span>
              </a>
              <span class="c-product--date">{{ $product->created_at->format('Y-m-d')}}</span> 
            </div>
            <div class="c-product--wrapper c-product--wrapper--end ">
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
  </div>
  @include('footer')
@endsection