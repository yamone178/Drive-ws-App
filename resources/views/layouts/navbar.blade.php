<nav class="navbar  navbar-expand-lg navbar-light bg-white shadow-sm position-relative" style="z-index: 0">
    <div class="container px-3 py-2">
        <i class="bi bi-justify side-toggler  me-4 fs-4 fw-bold"></i>
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
           Easy Drive
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">


            </ul>


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">

                @auth
                    <form class="d-flex" role="search">
                        <input class="form-control me-2 border-0 shadow-sm" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn border-0" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                @endauth

                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item ">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown px-4 " >
                        <a id="navbarDropdown" class="fs-5  nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
