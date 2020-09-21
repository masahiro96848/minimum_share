@extends('app')

@section('title', '商品詳細')

@section('content')
  @include('nav')
  <div class="l-container">
    <div class="l-container--wrapper u-width_90 u-m_auto">
      <div class="l-container--box l-container--flex u-align-items--center">
        <div class="p-detail--imageBox">
          <img src="{{ $product->photo }}" alt="" class="p-detail--image">
        </div>
        <div class="p-detail--body">
          <div class="p-detail--content">
            <div class="p-detail--title">
              <h4>{{ $product->title }}</h4>
            </div>
            <div class="p-detail--sub">
              <span class="c-product--date u-pl_m">{{ $product->created_at->format('Y-m-d')}}</span> 
              <span class="c-product--category u-pr_m">{{ $product->category->name}}</span>
            </div>
            <div class="p-detail--review">
              <p>{{ $product->review }}</p>
            </div>
            @foreach ($product->tags as $tag)
              @if ($loop->first)
                <div class="p-detail--tag">  
              @endif
                <a href="{{ route('tags.show', ['name' => $tag->name])}}" class="p-detail--tagList">
                  {{ $tag->hashtag }}
                </a>
              @if ($loop->last)
                </div>  
              @endif
            @endforeach
            <div class="p-panel--iconContainer ">
              <product-like
                :initial-is-liked-by='@json($product->isLikedBy(Auth::user()))'
                :initial-count-likes='@json($product->count_likes)'
                :authorized='@json(Auth::check())'
                endpoint="{{ route('product.like', ['product' => $product])}}"
              >
              </product-like>
            </div>
            <div class="p-panel--snsShare">
              <p class="p-panel--snsTitle">お気に入りの写真があったら共有しよう!!</p>
              @if(Auth::id() === $product->user->id)
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
              @endif
            </div>
            <div class="p-panel--snsIcon">
            <a href="https://twitter.com/share?url=https://minimum-share.app/prouduct/{{ $product->id }}&text={{ $product->title }}">
                <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
              </a>
            </div>
            <div class="c-product--wrapper u-ml_m">
              <a href="{{ route('users.show', ['name' => $product->user->name])}}">
                @if (!isset($product->user->profile_image))
                  <img src="../img/no_image.jpg" alt="" class="c-user--image">
                @else
                  <img src="{{$product->user->profile_image}}" alt="" class="c-user--image">
                @endif
                <span class="c-user--name">{{ $product->user->name}}</span>
              </a>
            </div>
            <div class="p-detail--followContent">
              <div class="p-detail--followArea">
                <p class="p-detail--follow">{{ $product->user->count_followings}}フォロー</p>
                <p class="p-detail--follower">{{ $product->user->count_followers}}フォロワー</p>
              </div>
                {{-- <button class="c-button c-button--follow">フォロー</button> --}}
                @if(Auth::id() !== $product->user->id)
                  <follow-button
                    :initial-is-followed-by='@json($product->user->isFollowedBy(Auth::user()))'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('users.follow', ['name' => $product->user->name])}}"
                  >

                  </follow-button>
                @endif
            </div>
          </div>
        </div>
      </div>
      <div class="p-comment--container l-container--flex">
        <div class="p-comment--count">
          <div class="p-comment--commentCount">
            <p class="p-comment--countTimes">コメント{{ $comment_count}}件</p>
          </div>
          @if($product->user->id !== Auth::id() || !Auth::check())
            <a href="{{ route('comments.new', ['id' => $product->id])}}" class="c-button c-button--review">
              レビュー投稿
            </a>
          @endif
        </div>
        <div class="p-comment--area">
          @foreach($comments as $comment)
          <div class="p-comment--box">
            <div class="p-comment--img">
              <a href="{{ route('users.show', ['name' => $product->user->name])}}">
                @if (!isset($user->profile_image))
                  <img src="../img/no_image.jpg" alt="" class="c-user--image">
                @else
                  <img src="{{$user->profile_image}}" alt="" class="c-user--image">
                @endif
                <span class="c-user--name">{{ $comment->user->name}}</span>
              </a>
              @if(Auth::id() === $product->user->id)
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
              @endif
            </div>
            <div class="p-comment--title">
              <p>{{ $comment->title }}</p>
            </div>
            <div class="p-comment--star">
              <comment-star
                rating={{ $comment->star ?? old('star')}}
                :star-size=20
                :read-only=true
                >

  </comment-star>
              {{-- @foreach($comment as $key => $val) --}}
                {{-- <i class="fa fa-star fa-2x"></i> --}}
              {{-- @endforeach --}}
            </div>
            <div class="p-comment--body">
              <p>
                {{ $comment->body}}
              </p>
            </div>
          </div>
          @endforeach
          {{-- <div class="p-comment--box">
            <div class="p-comment--img">
              <a href="{{ route('users.show', ['name' => $product->user->name])}}">
                @if (!isset($product->user->profile_image))
                  <img src="../img/no_image.jpg" alt="" class="c-user--image">
                @else
                  <img src="{{$product->user->profile_image}}" alt="" class="c-user--image">
                @endif
                <span class="c-user--name">{{ $product->user->name}}</span>
              </a>
            </div>
            <div class="p-comment--title">
              <p>おしゃれです!! 住んでみたいです!!</p>
            </div>
            <div class="p-comment--star">
              <i class="fa fa-star fa-2x"></i>
            </div>
            <div class="p-comment--body">
              <p>
                AppleのBluetoothキーボード(UK配列)にコーヒーをこぼしてしまったので急遽購入しました。なるべく外観・機能ともに近く低価格のもの、という視点で選びましたが、使ってみたら元のキーボードよりもナイス。US配列の本品にはDeleteキーが付いていてとても使いやすいです。UK配列にはDeleteのかわりにEjectキーが同じ場所にありますが、使用頻度を考えるとDeleteのほうがありがたいです。また、US配列は#にあたる、数字の3のキーのシフト押下時は£なのですが、この部分については#の出し方とともに製品マニュアルにBritish English選択時のキーマッピングとして記載があり、良心を感じました。Apple製のひんやりしたアルミの(この製品より)重量のある高級感はなくても、このキーボードはひとつの製品として良くできています。キーピッチやタッチも標準的でクセがないと感じました。梱包されていた箱もダンボール製ですが必要最小限サイズで持ち歩きに再利用できそうな感じでよかったです。全体的にスマートな印象を受けました。
              </p>
            </div>
          </div>
          <div class="p-comment--box">
            <div class="p-comment--img">
              <a href="{{ route('users.show', ['name' => $product->user->name])}}">
                @if (!isset($product->user->profile_image))
                  <img src="../img/no_image.jpg" alt="" class="c-user--image">
                @else
                  <img src="{{$product->user->profile_image}}" alt="" class="c-user--image">
                @endif
                <span class="c-user--name">{{ $product->user->name}}</span>
              </a>
            </div>
            <div class="p-comment--title">
              <p>おしゃれです!! 住んでみたいです!!</p>
            </div>
            <div class="p-comment--star">
              <i class="fa fa-star fa-2x"></i>
            </div>
            <div class="p-comment--body">
              <p>
                AppleのBluetoothキーボード(UK配列)にコーヒーをこぼしてしまったので急遽購入しました。なるべく外観・機能ともに近く低価格のもの、という視点で選びましたが、使ってみたら元のキーボードよりもナイス。US配列の本品にはDeleteキーが付いていてとても使いやすいです。UK配列にはDeleteのかわりにEjectキーが同じ場所にありますが、使用頻度を考えるとDeleteのほうがありがたいです。また、US配列は#にあたる、数字の3のキーのシフト押下時は£なのですが、この部分については#の出し方とともに製品マニュアルにBritish English選択時のキーマッピングとして記載があり、良心を感じました。Apple製のひんやりしたアルミの(この製品より)重量のある高級感はなくても、このキーボードはひとつの製品として良くできています。キーピッチやタッチも標準的でクセがないと感じました。梱包されていた箱もダンボール製ですが必要最小限サイズで持ち歩きに再利用できそうな感じでよかったです。全体的にスマートな印象を受けました。
              </p>
            </div>
          </div>
          <div class="p-comment--box">
            <div class="p-comment--img">
              <a href="{{ route('users.show', ['name' => $product->user->name])}}">
                @if (!isset($product->user->profile_image))
                  <img src="../img/no_image.jpg" alt="" class="c-user--image">
                @else
                  <img src="{{$product->user->profile_image}}" alt="" class="c-user--image">
                @endif
                <span class="c-user--name">{{ $product->user->name}}</span>
              </a>
            </div>
            <div class="p-comment--title">
              <p>おしゃれです!! 住んでみたいです!!</p>
            </div>
            <div class="p-comment--star">
              <i class="fa fa-star fa-2x"></i>
            </div>
            <div class="p-comment--body">
              <p>
                AppleのBluetoothキーボード(UK配列)にコーヒーをこぼしてしまったので急遽購入しました。なるべく外観・機能ともに近く低価格のもの、という視点で選びましたが、使ってみたら元のキーボードよりもナイス。US配列の本品にはDeleteキーが付いていてとても使いやすいです。UK配列にはDeleteのかわりにEjectキーが同じ場所にありますが、使用頻度を考えるとDeleteのほうがありがたいです。また、US配列は#にあたる、数字の3のキーのシフト押下時は£なのですが、この部分については#の出し方とともに製品マニュアルにBritish English選択時のキーマッピングとして記載があり、良心を感じました。Apple製のひんやりしたアルミの(この製品より)重量のある高級感はなくても、このキーボードはひとつの製品として良くできています。キーピッチやタッチも標準的でクセがないと感じました。梱包されていた箱もダンボール製ですが必要最小限サイズで持ち歩きに再利用できそうな感じでよかったです。全体的にスマートな印象を受けました。
              </p>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
@include('footer')
@endsection

{{-- {{dd(User::id()->count_ollowings)}} --}}