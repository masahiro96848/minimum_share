@extends('app')

@section('title', '商品一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper l-container--flex ">
      <div class="p-panel--box ">
        <a href="">
          <div class="p-panel--image">
            <img src="../img/01-65-300x200.jpg" class="c-shadow--image" alt="">
          </div>
        </a>
        <div class="p-panel--body">
          <h5 class="p-panel--title">紺のポーチ</h5>
          <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
        </div>
        <div class="c-product--wrapper">
          <a href="">
            <img src="../img/sample42.jpeg" alt="" class="c-user--image">
          </a>
          <span class="c-user--name">masahiro</span>
        </div>
        <div class="c-product--wrapper--end">
          <span class="c-product--price">¥2,000</span>
        </div>
      </div>
      <div class="p-panel--box ">
        <a href="">
          <div class="p-panel--image">
            <img src="../img/01-65-300x200.jpg" class="c-shadow--image" alt="">
          </div>
        </a>
        <div class="p-panel--body">
          <h5 class="p-panel--title">紺のポーチ</h5>
          <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
        </div>
        <div class="c-product--wrapper">
          <a href="">
            <img src="../img/sample42.jpeg" alt="" class="c-user--image">
          </a>
          <span class="c-user--name">masahiro</span>
        </div>
        <div class="c-product--wrapper--end">
          <span class="c-product--price">¥2,000</span>
        </div>
      </div>
      <div class="p-panel--box ">
        <a href="">
          <div class="p-panel--image">
            <img src="../img/01-65-300x200.jpg" class="c-shadow--image" alt="">
          </div>
        </a>
        <div class="p-panel--body">
          <h5 class="p-panel--title">紺のポーチ</h5>
          <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
        </div>
        <div class="c-product--wrapper">
          <a href="">
            <img src="../img/sample42.jpeg" alt="" class="c-user--image">
          </a>
          <span class="c-user--name">masahiro</span>
        </div>
        <div class="c-product--wrapper--end">
          <span class="c-product--price">¥2,000</span>
        </div>
      </div>
       <div class="p-panel--box ">
        <a href="">
          <div class="p-panel--image">
            <img src="../img/01-65-300x200.jpg" class="c-shadow--image" alt="">
          </div>
        </a>
        <div class="p-panel--body">
          <h5 class="p-panel--title">紺のポーチ</h5>
          <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
        </div>
        <div class="c-product--wrapper">
          <a href="">
            <img src="../img/sample42.jpeg" alt="" class="c-user--image">
          </a>
          <span class="c-user--name">masahiro</span>
        </div>
        <div class="c-product--wrapper--end">
          <span class="c-product--price">¥2,000</span>
        </div>
      </div>
       <div class="p-panel--box ">
        <a href="">
          <div class="p-panel--image">
            <img src="../img/01-65-300x200.jpg" class="c-shadow--image" alt="">
          </div>
        </a>
        <div class="p-panel--body">
          <h5 class="p-panel--title">紺のポーチ</h5>
          <i class="p-panel--heart fa fa-heart fa-lg" aria-hidden="true"></i>
        </div>
        <div class="c-product--wrapper">
          <a href="">
            <img src="../img/sample42.jpeg" alt="" class="c-user--image">
          </a>
          <span class="c-user--name">masahiro</span>
        </div>
        <div class="c-product--wrapper--end">
          <span class="c-product--price">¥2,000</span>
        </div>
      </div>
    </div>
  </div>
  @include('footer')
@endsection