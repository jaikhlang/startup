<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'StartUp 5.3') }}</title>
    
    <!-- Styles Authy-->
    <link rel="stylesheet" href="/css/flags.authy.css">
    <link rel="stylesheet" href="/css/form.authy.css">
    <!-- Styles App-->
    <link rel="stylesheet" href="/css/app.css">
    <!-- Styles StartUp-->
    <link rel="stylesheet" href="/css/startup.css">
    <!-- Style Font Awesome -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- Bootstrap Select -->
    <link rel="stylesheet" href="/css/bootstrap-select.min.css">    
     <!-- SimpleMDE -->
    <link rel="stylesheet" href="/css/simplemde.min.css">   
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
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
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                <li class="{{ set_active(['/', '/']) }}"><a href="{{ url('/') }}">{{ trans('startup.nav.front.home') }}</a></li>
                <li class="{{ set_active(['contact', 'contact']) }}"><a href="{{ url('/contact') }}">{{ trans('startup.nav.front.contact') }}</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ trans('startup.nav.front.language') }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/setlang/en') }}">
                                      @if ( session()->get('locale') === 'en') <i class="fa fa-check" aria-hidden="true"></i> @endif  {{ trans('startup.english') }}
                                    </a>  
                                 </li>                                 
                                <li>
                                    <a href="{{ url('/setlang/no') }}">
                                    @if ( session()->get('locale') === 'no') <i class="fa fa-check" aria-hidden="true"></i> @endif {{ trans('startup.norwegian') }}
                                    </a>  
                                 </li>  
                            </ul>
                        </li>    
                    
                    @if (Auth::guest())
                        <li class="{{ set_active(['login', 'login']) }}"><a href="{{ url('/login') }}">{{ trans('startup.nav.front.login') }}</a></li>
                        <li class="{{ set_active(['register', 'register']) }}"><a href="{{ url('/register') }}">{{ trans('startup.nav.front.register') }}</a></li>
                    @else

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle profile-image" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="/uploads/avatars/{{ Auth::user()->profile_photo }}" width="30" height="30" class="img-circle"> 
                                    {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                
                                @can('access-profile')
                                <li>
                                    <a href="{{ url('/profile') }}">{{ trans('startup.nav.front.profile') }}</a>
                                </li> 
                                @endcan
                                
                                @can('access-backend')
                                <li>
                                    <a href="{{ url('/admin') }}">{{ trans('startup.nav.front.admin') }}</a>
                                </li>   
                                @endcan
                                
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ trans('startup.nav.front.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
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

 <div class="navbar navbar-default navbar-fixed-bottom">
    <div class="container">
      <p class="navbar-text pull-left">{{ config('app.name', 'StartUp 5.3') }} -
           {{ trans('startup.built_with') }} <i class="fa fa-coffee" aria-hidden="true"></i> {{ trans('startup.and') }} <i class="fa fa-heart" aria-hidden="true"></i>
      </p>
      
      <a href="{{ config('app.url', 'http://localhost') }}" class="navbar-text pull-right">
      {{ trans('startup.version') }} 1.3</a>
    </div>
    
    
  </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/startup.js"></script>
    <script src="/js/form.authy.js"></script>
    <script src="/js/bootstrap-select.min.js"></script>
    <script src="/js/simplemde.min.js"></script>    
    <script> var simplemde = new SimpleMDE(); </script>    
    
    @yield('scripts')  
    
</body>
</html>
