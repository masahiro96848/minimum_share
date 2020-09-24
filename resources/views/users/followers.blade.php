@extends('app')

@section('title', $user->name. 'のフォロワーリスト')
    
@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--title--tag">{{$user->name}}のフォロワーリスト</h2>
    </div>
    <div class="l-container--wrapperList ">
      <div class="l-container--follow">
        
        @foreach ($followers as $follower)
        <div class="p-follow--list">
          <a href="{{  route('users.show', ['name' => $follower->name])}}">
            <div class="c-user--image u-flex">
              <img src="{{ $follower->profile_image}}" alt="" class="c-user--image--sm ">
                <span class="c-user--name">{{ $follower->name}}</span>
            </div>
          </a>
          <div class="c-user--followsList">
            <div class="c-user--followList">
              <span>{{ $follower->count_followings}} フォロー</span>
            </div>
            <div class="c-user--followerList">
              <span>{{ $follower->count_followers}} フォロワー</span>
            </div>
            <div class="p-user--followButton">
              <follow-button
                :initial-is-followed-by='@json($follower->isFollowedBy(Auth::user()))'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('users.follow', ['name' => $follower->name])}}"
              >
              </follow-button>    
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @include('footer')  
@endsection

