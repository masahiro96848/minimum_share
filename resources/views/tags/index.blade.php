@extends('app')

@section('title', 'タグ一覧')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--title">
      <h2 class="l-container--title--tag">Tag Search</h2>
    </div>
    <div class="l-container--tags">
      <div class="l-container--wrapperList l-container--between ">
        @foreach ($tags as $tag)
          <div class="p-detail--tag">
            <a href="{{ route('tags.show', ['name' => $tag->name])}}" class="p-detail--tagList">
              ＃{{ $tag->name}}
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  @include('footer')
@endsection