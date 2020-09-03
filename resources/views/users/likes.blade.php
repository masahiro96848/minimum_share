@extends('app')

@section('title', $user->name. 'のマイページ')
    
@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_100">
      <div class="l-container--mypage">
        <div class="c-user--avator">
          @if (!isset($user->profile_image))
            <img src="../img/no_image.jpg" alt="" class="c-user--image--lg">
          @else
            <img src="{{ $user->profile_image }}" alt="" class="c-user--image--lg">
          @endif
        </div>
        <div class="c-user--name--lg">
          <p>{{ $user->name }}</p>
        </div>
        <div class="c-user--follows">
          <div class="c-user--follow">
            <p>{{$user->count_followings}}フォロー</p>
          </div>
          <div class="c-user--follower">
            <p>{{$user->count_followers}}フォロワー</p>
          </div>
        </div>
        <div class="c-user--intro">
          <p>
            {{ $user->intro }}
          </p>
        </div>
        @if (Auth::id() === $user->id)
        <div class="c-button c-button--profileEdit">
          <a href="{{route('users.edit', ['name' => $user->name])}}">プロフィール編集</a>
        </div>
        @endif
        <div class="c-user--myProduct">
          <div class="c-user--postProduct u-border--none">
            <a href="{{ route('users.show', ['name' => $user->name])}}">商品</a>
          </div>

          <div class="c-user--myFavorite u-border--bt">
            <a href="{{ route('users.likes', ['name' => $user->name])}}">お気に入りしたリスト</a>
          </div>
        </div>
        <div class="l-container--between">
          @foreach ($products as $product)
            <div class="p-panel--box--Mypage">
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
      </div>
    </div>
  </div>
  @include('footer')  
@endsection

