@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    <h1 class="card-title text-center">{{ __("My profile") }} &#128100;</h1>
    <div class="profile-info-container">
        <div>
            <p class="card-info">
                <b>{{ __("User") }}:</b> {{ $viewData['user']->getName() }}
                {{ $viewData['user']->getLastName() }}
            </p>
            <p class="card-info">
                <b>{{ __("Email") }}:</b> {{ $viewData['user']->getEmail() }}
            </p>
            <p class="card-info"><b>{{ __("Current balance") }} &#128184;:</b> ${{ $viewData['user']->getBalance() }}</p>
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
            <h3>{{  __('Cars') }}</h3>
            <div class="mb-2">
                <a href="{{ route('car.index') }}" class="btn btn-outline-dark"> {{ __('View Cars') }} </a>
            </div>
        </div>
        <div>
            <h3>{{  __('Car models')  }}</h3>
            <div class="mb-2">
                <a href="{{ route('carModel.index') }}" class="btn btn-outline-dark"> {{ __('View Cars models') }} </a>
            </div>
        </div>
        <div>
            <h3>{{ __('Orders')  }}</h3>
            <div class="mb-2">
                <a href="{{ route('order.index') }}" class="btn btn-outline-dark"> {{ __('View my orders') }} </a>
            </div>
        </div>
        <div>
            <h3>{{ __('Reviews')  }}</h3>
            <div class="mb-2">
                <a href="{{ route('review.index') }}" class="btn btn-outline-dark"> {{ __('View my reviews') }} </a>
            </div>
        </div>
        <div>
            <h3>{{  __('Car publish requests') }}</h3>
            <div class="mb-3">
                <a href="{{ route('publishRequest.create') }}" class="btn btn-outline-dark"> {{ __('Create car publish request') }} </a>
            </div>
        </div>
    <div>
</div>
@endsection
