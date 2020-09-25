<header class="l-header--nav ">
  <h1 class="l-header--title u-mt_m u-ml_l ">
    <a href="{{ route('products.index')}}" class="l-header--title"> Minimum Share</a>
  </h1>
  <div class="p-menu--button u-mr_l">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav class="p-menu--wrap">
    <ul class="p-menu--list u-pl_0 u-mt_l u-mb_l">
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('products.index')}}">Top</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('tags.index')}}">Tags</a></li>
      @if (Auth::check())
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('products.new')}}">Post</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('users.show', ['name' => Auth::user()->name])}}">Mypage</a></li>
      <li class="p-menu--item ">
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="p-menu--logout">
          @csrf
            <button id="logout" type="submit" class="p-menu--link" onfocus="this.blur();">Logout</button> 
        </form>
      </li>
      @else
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('login')}}">Login</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('register')}}">Register</a></li>    
      @endif
    </ul>
  </nav>
</header>