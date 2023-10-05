<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                      <img src="{{ asset('img/logo.png') }}" alt="logo" title="logo" style="max-height: 35px;">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                         <a class="nav-link" href="{{ route('catalog.index') }}">Catalog</a>
                     </li>
                @if(isset(auth()->user()->is_admin) 
                    && auth()->user()->is_admin)
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.index') }}">Admin</a>
                 </li>
                @endif
                </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Cart::count() > 0)
                            <li class="nav-item">
                                <a href="{{ route('cart.index') }}" class="nav-link waves-effect">
                                    <span class="badge red z-depth-1 mr-1">
                                        {{ Cart::count() }}
                                    </span>
                                    <i class="far far-shopping-cart"></i>
                                    <span class="clearfix d-none d-sm-inline-block">
                                        Cart
                                    </span>
                                </a>
                            </li>
                        @endif
                        <!-- Authentication Links -->
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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