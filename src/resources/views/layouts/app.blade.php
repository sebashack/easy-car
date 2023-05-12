<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            crossorigin="anonymous"
        />
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('/css/reviews.css') }}" />
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        @yield('script-map')
        @yield('style-map')
        <title>@yield('title', 'EasyCar')</title>
    </head>
    <body>
        <!-- header -->
        <nav class="navbar navbar-expand-lg py-3">
            <div
                class="pe-lg-0 ps-lg-5 container-fluid justify-content-between"
            >
                <a class="navbar-brand" href="{{ route('home.index') }}">
                    <img
                        src="{{ asset('/images/Logo.jpg') }}"
                        height="100"
                        alt="logo"
                    />
                </a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div
                    class="collapse navbar-collapse justify-content-end"
                    id="navbarSupportedContent"
                >
                    <div class="nav_left d-lg-flex align-items-center">
                        <nav>
                            <div
                                class="nav d-block d-lg-flex nav-tabs"
                                id="nav-tab"
                                role="tablist"
                            >
                                <a
                                    class="nav-link active"
                                    href="{{ route('home.index') }}"
                                >
                                    {{ __("Home") }}
                                </a>
                                <a
                                    class="nav-link"
                                    href="{{ route('car.index') }}"
                                >
                                    {{ __("Cars") }}
                                </a>
                                <a
                                    class="nav-link"
                                    href="{{ route('community.index') }}"
                                >
                                    {{ __("Community") }}
                                </a>
                                <li class="nav-item dropdown">
                                <a class="btn btn-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __("Choose a language") }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="{{route('setLanguage', ['es'])}}">{{ __("Spanish") }}</a>
                                    <a class="dropdown-item" href="{{route('setLanguage', ['en'])}}">{{ __("English") }}</a>
                                </div>
                                </li>
                                @guest
                                <div class="vr bg-black mx-2 d-none d-lg-block">
                                </div>
                                <a
                                    id="button-link"
                                    class="nav-link"
                                    href="{{ route('login') }}"
                                >
                                    {{ __("Log in") }}
                                </a>
                                <a
                                    class="nav-link"
                                    href="{{ route('register') }}"
                                >
                                    {{ __("Register") }}
                                </a>
                                @else
                                <a
                                    id="button-link"
                                    class="nav-link"
                                    href="{{ route('publishRequest.create') }}"
                                >
                                    {{ __("Post your car") }}
                                </a>
                                <div class="vr bg-black mx-2 d-none d-lg-block">
                                </div>
                                <a
                                    class="nav-link"
                                    href="{{ route('user.show') }}"
                                >
                                    {{ __("My profile") }}
                                </a>
                                @endguest
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container my-4">@yield('content')</div>

        <!-- footer -->
        <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <p class="col-md-4 mb-0 text-muted">&copy; 2023 EasyCar</p>
                <ul class="nav col-md-4 justify-content-end">
                  <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link px-2 text-muted">{{ __('Home') }}</a></li>
                  <li class="nav-item"><a href="{{ route('home.about') }}" class="nav-link px-2 text-muted">{{ __('About') }}</a></li>
                  <li class="nav-item"><a href="{{ route('home.contact') }}" class="nav-link px-2 text-muted">{{__('Contact Us') }}</a></li>
                  <li class="nav-item"><a href="{{ route('community.index') }}" class="nav-link px-2 text-muted">{{__('Community') }}</a></li>
                </ul>
            </footer>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>
