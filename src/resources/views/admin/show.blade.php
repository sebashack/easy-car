@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    <h1 class="card-title text-center">Profile &#128100;</h1>
    <p class="card-info"><b>User:</b> {{ $viewData['user']->getName() }} {{ $viewData['user']->getLastName() }}</p>    
    <p class="card-title"><b>Email:</b> {{ $viewData['user']->getEmail() }}</p>
    <hr />
    <div>
        <div>
            <h3>{{ __('Car models') }}</h3>
                <div class="mb-2">
                    <a href="{{ route('adminCarModel.index') }}" class="btn btn-outline-dark"> {{ __('View car models') }} </a>
                </div>
                <div>
                    <a href="{{ route('adminCarModel.create') }}" class="btn btn-outline-dark"> {{ __('Register new car model') }} </a>
                </div>
        </div>
        <br/>
        <div>
            <h3>{{ __('Cars') }}</h3>
            <div class="mb-2">
                <a href="{{ route('adminCar.index') }}" class="btn btn-outline-dark"> {{ __('View cars') }} </a>
            </div>
            <div>
                <a href="{{ route('adminCar.create') }}" class="btn btn-outline-dark"> {{ __('Register new car') }} </a>
            </div>
        </div>
        <br/>
        <div>
            <h3>Car publish requests</h3>
            <div class="mb-2">
                <a href="{{ route('publishRequest.index') }}" class="btn btn-outline-dark"> {{ __('View car publish requests') }} </a>
            </div>
        </div>
        <br/>
        <div>
            <h3>Orders</h3>
            <div class="mb-2">
                <a href="{{ route('order.index') }}" class="btn btn-outline-dark"> {{ __('View car orders') }} </a>
            </div>
        </div>
        <br/>
        <div>
            <h3>User</h3>
            <div>
                <a href="{{ route('admin.showUsers') }}" class="btn btn-outline-dark"> {{ __('View registered users') }} </a>
            </div>
        </div>
    <div>
    <br/>
    <br/>
</div>
@endsection
