@extends('app')

@section('title', 'Topページ')

@section('content')
  @include('nav')
    <div class="l-container">
      <div class="l-container--top">
        <div class="p-home--main">
          <div class="p-home--mainTitle">
            <h2 class="p-home--title">ミニマリストの生活を</h2>
            <h2 class="p-home--title">Shareしませんか？</h2>
          </div>
        </div>
        <div class="p-home--contentsTitle">
          <h3>minimum-shareとは？</h3>
          <p class="p-home--paragraph">
            minimum-shareは、ミニマリストの共有プラットフォームです。<br>
            引越しや日々の生活など、必要最小限で良いという人が増えています。<br>
            ミニマリストの生活を共有して、必要最小限の生活をしましょう！！
          </p>
        </div>
        <div class="p-home--contents">
          <div class="p-home--panel">
            <div class="p-home--head">
              <img src="./img/content01.jpeg" alt="">
            </div>
            <div class="p-home--body">
              <p>これからミニマリストになる人にも、できるだけ不必要なものを減らすことができます。</p>
            </div>
          </div>
          <div class="p-home--panel">
            <div class="p-home--head">
              <img src="./img/content02.jpg" alt="">
            </div>
            <div class="p-home--body">
              <p>本当に必要な物だけを揃えることができます。<br>
                 無駄なコストを抑え、自分にあった最適な生活を目指しましょう！！                 
              </p>
            </div>
          </div>
          <div class="p-home--panel">
            <div class="p-home--head">
              <img src="./img/content03.jpg" alt="">
            </div>
            <div class="p-home--body">
              <p>SNSで自分の生活をシェアしてミニマリストの生活を広めよう！！</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @include('footer')
@endsection