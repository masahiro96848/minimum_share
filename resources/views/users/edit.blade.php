@extends('app')

@section('title', 'プロフィール編集')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_100">
      <div class="l-container--form">
        @include('error')
        <form method="POST" action="{{ route('users.update', ['name' => $user->name])}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="c-post--imageBox c-post--img--radius">
              {{-- <input type="file" name="profile_image" value="{{ $user->profile_image ?? old('profile_image') }}"> --}}
              <product-img-preview
                set-image-data='{{ $user->profile_image ?? ''}}'
                name="profile_image"
                class-object="c-post--img--radius"
              >

              </product-img-preview>
            </div>
            <label for="name">NickName</label>
            <div class="c-post">
              <input type="text" class="c-form--control" placeholder="20文字以内で入力してください"  name="name" value="{{ $user->name ?? old('name') }}">
            </div>
            <label for="intro">Intro</label>
            <div class="c-post">
              <textarea name="intro" cols="30" rows="10" class="c-form--control c-form--radius" placeholder="200文字以内で入力してください" >{{ $user->intro ?? old('intro') }}</textarea>
            </div>
            <label for="email">Email</label>
            <div class="c-post">
              <input type="text" class="c-form--control" placeholder="email形式"  name="email" value="{{ $user->email ?? old('email') }}">
            </div>
          <button class="c-button c-button--submit " type="submit">update</button>
        </form>
      </div>
    </div>
  </div>
  @include('footer')  
@endsection