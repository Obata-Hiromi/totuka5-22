<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <title>戸塚ハッカソン</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- Material Kit CSS -->
    <link href="{{asset('material-kit-master/assets/css/material-kit.css?v=2.0.4')}}" rel="stylesheet" />
    <!-- tablesorter -->
    <script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.0/js/jquery.tablesorter.min.js"></script>

    <style type="text/css">
        .tablesorter-headerUnSorted {
            height:80%;
            background-image: url("{{asset('img/sort-icon.png')}}");
            background-repeat: no-repeat;
            background-size:auto 60%;
            background-position: center right;
        }
        .tablesorter-headerAsc {
            background-image: url("{{asset('img/sort-asc-icon.png')}}");
            background-repeat: no-repeat;
            background-size:auto 60%;
            background-position: center right;
        }
        .tablesorter-headerDesc {
            background-image: url("{{asset('img/sort-desc-icon.png')}}");
            background-repeat: no-repeat;
            background-size:auto 60%;
            background-position: center right;
        }
    </style>
  </head>
  <body>
<div class="app index-page sidebar-collapse">
  <nav class="navbar navbar-color-on-scroll navbar-expand-lg" color-on-scroll="100">
    <div class="container">
        <div class="navbar-translate">
          <a class="navbar-brand" href="{{ url('/') }}">戸塚ハッカソン</a>
  
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="sr-only">Toggle navigation</span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
              <span class="navbar-toggler-icon"></span>
          </button>
        </div>
  
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="material-icons">run_circle</i>避難所マップ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="material-icons">warning</i>危険地点マップ</a>
            </li>
          </ul>
          <ul class="navbar-nav">
          @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}"><i class="material-icons">login</i>ログイン</a>
              </li>
              @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}"><i class="material-icons">person_add</i>ユーザー登録</a>
                </li>
              @endif
            @else
            <li class="nav-item dropdown"> 
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                <i class="material-icons">person</i>{{Auth::user()->name}}<span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('user.show',Auth::id()) }}">
                      ユーザー情報
                  </a>
                  <a class="dropdown-item" href="{{ route('group.create') }}">
                      グループ作成
                  </a>
                  <a class="dropdown-item" href="{{ route('group.show',1) }}">
                      グループ作成
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      ログアウト
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
              </div>
              @endguest
            </li>
          </ul>
        </div>
    </div>
  </nav>
</div>
<main class="container">
  <!--ここに内容-->
  @yield('content')
</main>

<footer class="footer footer-default">
  <div class="container">
    <nav class="float-left">
      <ul>
        <li>
          <a href="https://www.creative-tim.com/">
              Creative Tim
          </a>
        </li>
      </ul>
    </nav>
    <div class="copyright float-right">
        &copy;
        <script>
            document.write(new Date().getFullYear())
        </script>, made with <i class="material-icons">favorite</i> by
        <a href="https://www.creative-tim.com/" target="blank">Creative Tim</a> for a better web.
    </div>
  </div>
</footer>
<!--   Core JS Files   -->
<script src="{{asset('material-kit-master/assets/js/core/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material-kit-master/assets/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material-kit-master/assets/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
<script src="{{asset('material-kit-master/assets/js/plugins/moment.min.js')}}"></script>
<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
<script src="{{asset('material-kit-master/assets/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{asset('material-kit-master/assets/js/plugins/nouislider.min.js')}}" type="text/javascript"></script>



<!--  Google Maps Plugin  -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
<script src="{{asset('material-kit-master/assets/js/material-kit.js?v=2.0.4')}}" type="text/javascript"></script>

</body>

</html>