@extends('app')

@section('title', 'マイページ')
    
@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_100">
      <div class="l-container--mypage">
        <div class="c-user--avator">
          @if (!isset($user->prfile_image))
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
            <p>10フォロー</p>
          </div>
          <div class="c-user--follower">
            <p>10フォロワー</p>
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
          <div class="c-user--postProduct">
            <p>商品</p>
          </div>

          <div class="c-user--myFavorite">
            <p>お気に入りしたリスト</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('footer')  
@endsection