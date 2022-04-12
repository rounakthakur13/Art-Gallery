<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('', 'Art Gallery') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
   
         <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
   
    <script type="text/javascript">
      $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        $(this).toggleClass('active');
            });
        });
    </script>
    <!-- Fonts -->
    <!-- Styles -->
  <!-- Google Font: Source Sans Pro -->
   <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
     @toastr_css
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header text-center">
            @auth
            <img src="{{ asset('public/images/'.Auth::user()->image) }}" width="80px" height="80px" class="rounded-circle">
            @endauth
            <h3>Administrator</h3>
        </div>

        <ul class="list-unstyled components">
            <li class="">
                <a href="{{ route('home') }}"><i class="fa fa-home fa-lg"></i>  Dashboard</a>
            </li>
            <li>
                <a href="{{ route('users.index') }}"><i class="fa fa-users"></i>  Users</a>
            </li>
            <li>
                <a href="{{ route('products.index') }}"><i class="fa fa-bitbucket fa-lg"></i>  Products</a>
            </li>
            <li>
                <a href="{{ route('categories.index') }}"><i class="fa fa-list-alt"></i> Categories</a>
            </li>
            <li>
                <a href="{{ route('feedbacks.index') }}"><i class="fa fa-comment"></i> Feedbacks</a>
            </li>
        </ul>
    </nav>
    <div id="content" class="container-fluid m-0 p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fa fa-align-left"></i>
                <span>Admin</span>
            </button>
            @guest
             @else
                                <a id="navbarDropdown" class="nav-link dropdown-toggle p-1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                   <img src="{{ asset('public/images/'.Auth::user()->image) }}" width="40px" height="40px" class="rounded-circle"> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right text-justify" aria-labelledby="navbarDropdown">
                                    <p class="text-danger text-center">Welcome</p>
                                   <a class="dropdown-item" href=""><p class="text-info">{{ Auth::user()->name }}</p></a>
                                    <a class="dropdown-item" href=""><p class="text-info">{{ Auth::user()->email }}</p></a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <p class="text-info"> {{ __('Logout') }}</p>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
             @endguest
                
        </div>

    </nav>
    <div class="container-fluid mb-5">
        <main>   
                 @yield('content')
       </main>
       
</div>

   
</body>
@jquery
@toastr_js
@toastr_render
</html>
