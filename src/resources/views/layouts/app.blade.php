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
                                @guest
                                <div class="vr bg-black mx-2 d-none d-lg-block">
                                </div>
                                <a
                                    id="button-link"
                                    class="nav-link"
                                    href="{{ route('login') }}"
                                >
                                    {{ __("Login") }}
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
                                <form
                                    id="logout"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                >
                                    <a
                                        role="button"
                                        class="nav-link"
                                        onclick="document.getElementById('logout').submit();"
                                    >
                                        {{ __("Logout") }}
                                    </a>
                                    @csrf
                                </form>
                                @endguest
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>

        <div class="container my-4">@yield('content')</div>

        <!-- footer -->
        <div class="copyright py-4 text-center text-black">
            <div class="container">
                <small> Copyright 2023 - EasyCar </small>
            </div>
        </div>
        <!-- footer -->
        @yield('scripts')
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
