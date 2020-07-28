<header class="l-header--nav ">
  <h1 class="l-header--title u-mt_m u-ml_l ">
    Minimum Share
  </h1>
  <div class="p-menu--button u-mr_l">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <nav class="p-menu--wrap">
    <ul class="p-menu--list u-pl_0 u-mt_l u-mb_l">
      <li class="p-menu--item "><a class="p-menu--link" href="">Top</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="">Tags</a></li>
      @if (Auth::check())
      <li class="p-menu--item "><a class="p-menu--link" href="">Post</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="">Mypage</a></li>
      <li class="p-menu--item ">
        <a href="{{ route('login')}}" id="logout">Logout</a> 
          <form id="logout-form" method="POST" action="{{ route('logout') }}" >
            @csrf
          </form>
      </li>
      @else
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('login')}}">Login</a></li>
      <li class="p-menu--item "><a class="p-menu--link" href="{{ route('register')}}">Register</a></li>    
      @endif
    </ul>
  </nav>
</header>