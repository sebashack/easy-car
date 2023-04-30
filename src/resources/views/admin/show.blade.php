@extends('layouts.app') @section('title', $viewData["title"])
@section('content')
<div>
    <h1 class="card-title text-center">{{ __("My profile") }} &#128100;</h1>
    <div class="profile-info-container">
        <div>
            <p class="card-info">
                <b>{{ __("User") }}:</b> {{ $viewData['user']->getName() }}
                {{ $viewData['user']->getLastName() }}
            </p>
            <p class="card-title">
                <b>{{ __("Email") }}:</b> {{ $viewData['user']->getEmail() }}
            </p>
        </div>
        <div>
            <form id="logout" action="{{ route('logout') }}" method="POST">
                <a
                    role="button"
                    class="btn btn-outline-danger"
                    onclick="document.getElementById('logout').submit();"
                >
                    {{ __("Log out") }}
                </a>
                @csrf
            </form>
        </div>
    </div>
    <hr />
    <div>
        <div>
            <h3>{{ __("Car models") }}</h3>
            <div class="mb-2">
                <a
                    href="{{ route('adminCarModel.index') }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("View Cars models") }}
                </a>
            </div>
            <br/>
            <div>
                <a
                    href="{{ route('adminCarModel.create') }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("Register new car model") }}
                </a>
            </div>
        </div>
        <br />
        <div>
            <h3>{{ __("Cars") }}</h3>
            <div class="mb-2">
                <a
                    href="{{ route('adminCar.index') }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("View Cars") }}
                </a>
            </div>
            <br/>
            <div>
                <a
                    href="{{ route('adminCar.create') }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("Register new car") }}
                </a>
            </div>
            <br/>
            <div>
                <a
                    href="{{ route('adminCar.downloadReport') . '?report_type=pdf' }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("Download sales report PDF") }}
                </a>
            </div>
            <br/>
            <div>
                <a
                    href="{{ route('adminCar.downloadReport') . '?report_type=csv' }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("Download sales report CSV") }}
                </a>
            </div>
        </div>
        <br />
        <div>
            <h3>{{ __('Car publish requests') }}</h3>
            <div class="mb-2">
                <a
                    href="{{ route('publishRequest.index') }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("View car publish requests") }}
                </a>
            </div>
        </div>
        <br />
        <div>
            <h3>{{ __('Orders') }}</h3>
            <div class="mb-2">
                <a
                    href="{{ route('order.index') }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("View car orders") }}
                </a>
            </div>
        </div>
        <br />
        <div>
            <h3>{{ __('User') }}</h3>
            <div>
                <a
                    href="{{ route('admin.showUsers') }}"
                    class="btn btn-outline-dark"
                >
                    {{ __("View registered users") }}
                </a>
            </div>
        </div>
        <div>
            <br />
            <br />
        </div>
        @endsection
    </div>
</div>
