@extends('app')

@section('title', '商品詳細')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_90 u-m_auto">
      <div class="l-container--box l-container--flex">
        <div class="p-detail--imageBox">
          <img src="{{ $product->photo }}" alt="" class="p-detail--image">
        </div>
        <div class="p-detail--body">
          <div class="p-detail--content">
            <div class="p-detail--title">
              <h4>{{ $product->title }}</h4>
            </div>
            <div class="c-product--wrapper">
              <a href="">
                <img src="../img/sample42.jpeg" alt="" class="c-user--image">
              </a>
              <span class="c-user--name">masahiro</span>
            </div>
            <div class="p-detail--review">
              <p>{{ $product->review }}</p>
            </div>
            <div class="p-detail--tag">
              <a href="" class="p-detail--tagList">#おしゃれ</a>
              <a href="" class="p-detail--tagList">#コンパクト</a>
            </div>
            @if(Auth::id() === $product->user_id)
              <div class="p-panel--iconContainer">
                <div class="p-detail--heart">
                  <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
                  <a href="{{route("products.edit", ['id' => $product])}}">
                    <i class="p-panel--edit fa fa-pencil-square fa-lg" aria-hidden="true"></i>
                  </a>
                  <form action="{{ route('products.destroy', ['id' => $product])}}" method="POST" class="p-panel--trash">
                    @csrf
                    @method('DELETE')
                    <button class="p-panel--trash--button">
                      <i class="fa fa-trash fa-lg" aria-hidden="true"></i>
                    </button>
                  </form>
                </div>
              </div>
            @endif
            <div class="c-product--wrapper--end">
              <p class="p-detail--price">¥{{ $product->price }}</p>
            </div>
            @if(!empty($product->url))
            <div class="p-detail--purchase ">
              <p class="p-detail--button">
                <a href="{{ $product->url }}">購入する</a> 
                @else
                <div class="p-detail--purchase">
                  <p class="p-detail--button--none"></p>
                </div>
              </p>
            </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection