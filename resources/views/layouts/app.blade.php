<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<!--head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
-->
    <!-- CSRF Token 
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    -->
    <!-- Styles
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
 -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
 @include('including/header')
 <?php
 $id_user = Auth::user()->id;
 $notify_data = DB::table('notify')
                ->where('id_user_A', $id_user)
                ->orwhere('id_user_B', $id_user)
                ->get();
if(!empty($notify_data)){
foreach($notify_data as $a){
    $id_notify = $a->id;
    if($a->id_user_A == $id_user){
        $id_owner = $a->id_user_A;
        $id_trader = $a->id_user_B;
        $db_owner = DB::table('users')->where( ['id'=> $id_owner])->first();
        $db_trader = DB::table('users')->where( ['id'=> $id_trader])->first();
        $name_owner  =$db_owner->name;
        $name_trader  =$db_trader->name;
    }
    else if ($a->id_user_B == $id_user){
        $id_owner = $a->id_user_B;
        $id_trader = $a->id_user_A;
        $db_owner = DB::table('users')->where( ['id'=> $id_owner])->first();
        $db_trader = DB::table('users')->where( ['id'=> $id_trader])->first();
        $name_owner  =$db_owner->name;
        $name_trader  =$db_trader->name;
    }
    $notify[] = array(
        'id_notify'=> $id_notify,
        'name_owner' => $name_owner,
        'name_trader' => $name_trader,
    );
}
}
 
 ?>
<body class="first-bg">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Recypid
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger"><?php echo count($notify)?></span>
            </a>
            <ul class="dropdown-menu notify">
              <li class="header">คุณมีแจ้งเตือนทั้งหมด <?php echo count($notify)?> แจ้งเตือน</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                  <?php
                  if(!empty($notify))
                  {
                     
                      foreach($notify as $a){
                        echo '<a href="/notify/'.$a['id_notify'].'">
                        <i class="fa fa-star text-yellow"></i> กรุณาให้กดให้คะแนน  <i class="fa fa-user text-red"></i>'.$a['name_trader'].'
                        </a>';
                      }
                  }else{
                    echo '<a href="#">
                    <i class="fa fa-shopping-cart text-green"></i> คุณไม่มีการแจ้งเตือน
                    </a>';
                  }
                    ?>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('googlemap')
    
   
    <script src="/js/googlemap.js"></script>
</body>
</html>
