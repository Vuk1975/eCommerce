<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    
    



   
    
    


@notifyCss
<x:notify-messages />
@notifyJs
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    @if(Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('order')}}">Orders</a>
                    </li>
                    @endif
                        <!-- Authentication Links -->
                        <a href="{{route('cart.show')}}" class="nav-link">
                            <span class="fas fa-shopping-cart">
                             ({{session()->has('cart')?session()->get('cart')->totalQty:'0'}})
                            </span>
                        </a>
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-0">
            @yield('content')
        </main>
    </div>
    <!--footer-->

 <footer id="fh5co-footer" class="fh5co-bg" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>About Company.</h3>
					<p class="color: blue">Facilis ipsum reprehenderit nemo molestias. Aut cum mollitia reprehenderit. Eos cumque dicta adipisci architecto culpa amet.</p>
					<p><a class="btn btn-primary" href="#">Become A Member</a></p>
				</div>
				<div class="col-md-8">
					
                    <div class="row">
					    <div class="col-md-4 fh5co-widget">
                        <h3>Category</h3>
						    <ul class="fh5co-footer-links">
                                @foreach(App\Models\Category::all() as $cat)
							    <li><a href="{{route('product.list', [$cat->slug])}}">{{$cat->name}}</a></li>
							    @endforeach
						    </ul>
					    </div>

					<div class="col-md-4 fh5co-widget">
                    <h3>Company name</h3>
						<ul class="fh5co-footer-links">
							
							<li>Adress</li>
							<li>City</li>
                            <li>State</li>
							
						</ul>
					</div>

					<div class="col-md-4 fh5co-widget">
                    <h3>&nbsp</h3>
						<ul class="fh5co-footer-links">
                        
							<li><i class="fas fa-phone"></i> Phone</li>
							<li><i class="fas fa-mobile"></i> Mobile</li>
                            <li><i class="fas fa-envelope"></i> E-mail</li>
						</ul>
					</div>
                    </div>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
                <!--social-->
<!-- Facebook -->
<a class="m-3 pb-3" style="color: #3b5998" href="#!" role="button"
  ><i class="fab fa-facebook-f fa-lg"></i
></a>

<!-- Twitter -->
<a class="m-3" style="color: #55acee" href="#!" role="button"
  ><i class="fab fa-twitter fa-lg"></i
></a>

<!-- Google -->
<a class="m-3" style="color: #dd4b39" href="#!" role="button"
  ><i class="fab fa-google fa-lg"></i
></a>

<!-- Instagram -->
<a class="m-3" style="color: #ac2bac" href="#!" role="button"
  ><i class="fab fa-instagram fa-lg"></i
></a>
					
                   
                    <br>
                    <p>
						<small class="block">&copy; 2021 | All Rights Reserved.</small> 
						<small class="block">Powered by Igor Vukojević</small>
					</p>
				</div>
			</div>

		</div>
	</footer>
   
</body>
</html>
