<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>
    @yield('title')
  </title>
  <!-- Font Awesome -->
  {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> --}}
  <!-- Bootstrap core CSS -->
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"> --}}
  <!-- Material Design Bootstrap -->
  
  <script src="{{asset('js/bootstrap.js')}}"></script>
  
  {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet"> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" /> --}}
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Vollkorn rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Oswald:700 rel="stylesheet">

  <link rel="stylesheet" href={{ asset('css/app.css')}} >
  
</head>

<body>
  <div id="app">
    @yield('content')
  </div>

  
 {{-- <script type="module"
src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script> --}}


  
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ mix('js/main.js')}}"></script>                                                          
  {{-- <script src="{{ mix('js/app.js')}}"></script> --}}
</body>
</html>