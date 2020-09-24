@extends('app')

@section('title', $user->name. 'のフォローリスト')
    
@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--title--tag">{{$user->name}}のフォローリスト</h2>
    </div>
    <div class="l-container--wrapperList u-width_100">
      <div class="l-container--follow">
        @foreach ($followings as $following)
        <div class="p-follow--list">
          <a href="{{  route('users.show', ['name' => $following->name])}}">
            <div class="c-user--image u-flex">
              <img src="{{ $following->profile_image}}" alt="" class="c-user--image--sm ">
                <span class="c-user--name">{{ $following->name}}</span>
            </div>
          </a>
          <div class="c-user--followsList">
            <div class="c-user--followList">
              <span>{{ $following->count_followings}} フォロー</span>
            </div>
            <div class="c-user--followerList">
              <span>{{ $following->count_followers}} フォロワー</span>
            </div>
            {{-- <div class="p-user--followButton"> --}}
              @if(Auth::id() !== $following->id)
                <follow-button
                  :initial-is-followed-by='@json($following->isFollowedBy(Auth::user()))'
                  :authorized='@json(Auth::check())'
                  endpoint="{{ route('users.follow', ['name' => $following->name])}}"
                >
  
                </follow-button>    
              @endif
            {{-- </div> --}}
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @include('footer')  
@endsection

{{-- {{dd($following->name)}} --}}