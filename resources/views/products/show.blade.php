@extends('app')

@section('title', '商品詳細')

@section('content')
  @include('nav')
  <div class="l-container--wrapper">
    <div class="l-container--box l-container--flex">
      <div class="p-detail--imageBox">
        <img src="../img/01-65-300x200.jpg" alt="" class="p-detail--image">
      </div>
      <div class="p-detail--body">
        <div class="p-detail--content">
          <div class="p-detail--title">
            <h4>4畳半最高!!</h4>
          </div>
          <div class="c-product--wrapper">
            <a href="">
              <img src="../img/sample42.jpeg" alt="" class="c-user--image">
            </a>
            <span class="c-user--name">masahiro</span>
          </div>
          <div class="p-detail--review">
            <p>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
          <div class="p-detail--tag">
            <a href="" class="p-detail--tagList">#おしゃれ</a>
            <a href="" class="p-detail--tagList">#コンパクト</a>
          </div>
          <div class="p-detail--heart">
            <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
          </div>
          <div class="c-product--wrapper--end u-pr_l ">
            <p class="p-detail--price">¥2,000</p>
          </div>
          <div class="p-detail--purchase ">
            <p class="p-detail--button">
              購入する
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
    
@endsection