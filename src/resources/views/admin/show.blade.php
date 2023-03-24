@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    <h1 class="card-title">{{ $viewData['user']->getName() }} {{ $viewData['user']->getLastName() }}</h1>
    <br/>
    <div>
        <div>
            <h3>{{ __('Car models') }}</h3>
                <div class="mb-2">
                    <a href="{{ route('adminCarModel.index') }}" class="btn btn-secondary"> {{ __('View car models') }} </a>
                </div>
                <div>
                    <a href="{{ route('adminCarModel.create') }}" class="btn btn-secondary btn-block"> {{ __('Register new car model') }} </a>
                </div>
        </div>
        <br/>
        <div>
            <h3>{{ __('Cars') }}</h3>
            <div class="mb-2">
                <a href="{{ route('adminCar.index') }}" class="btn btn-secondary"> {{ __('View cars') }} </a>
            </div>
            <div>
                <a href="{{ route('adminCar.create') }}" class="btn btn-secondary"> {{ __('Register new car') }} </a>
            </div>
        </div>
        <br/>
        <div>
            <h3>Car publish requests</h3>
            <div class="mb-2">
                <a href="{{ route('publishRequest.index') }}" class="btn btn-secondary"> {{ __('View car publish requests') }} </a>
            </div>
        </div>
        <br/>
        <div>
            <h3>Orders</h3>
            <div class="mb-2">
                <a href="{{ route('order.index') }}" class="btn btn-secondary"> {{ __('View car orders') }} </a>
            </div>
        </div>
        <br/>
        <div>
            <h3>User</h3>
            <div>
                <a href="{{ route('admin.showUsers') }}" class="btn btn-secondary"> {{ __('View registered users') }} </a>
            </div>
        </div>
    <div>
    <br/>
    <br/>
</div>
@endsection
