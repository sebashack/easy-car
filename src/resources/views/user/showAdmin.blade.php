@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<h1 class="card-title">{{ $viewData['user']->getName() }} {{ $viewData['user']->getLastName() }}</h1>
<br/>
<br/>
<div>
    <div>
        <h3>{{ __('Car models') }}</h3>
        <ul class="list-group">
            <a href="{{ route('carModel.index') }}" class="list-group-item link-info"> {{ __('View car models') }} </a>
            <a href="{{ route('carModel.create') }}" class="list-group-item link-info"> {{ __('Register new car model') }} </a>
        </ul>
    </div>
    <br/>
    <div>
        <h3>{{ __('Cars') }}</h3>
        <ul class="list-group">
            <a href="{{ route('car.index') }}" class="list-group-item link-info"> {{ __('View cars') }} </a>
            <a href="{{ route('car.create') }}" class="list-group-item link-info"> {{ __('Register new car') }} </a>
        </ul>
    </div>
    <br/>
    <div>
        <h3>Car publish requests</h3>
        <ul class="list-group">
            <a href="{{ route('publishRequest.index') }}" class="list-group-item link-info"> {{ __('View car publish requests') }} </a>
        </ul>
    </div>
<div>
@endsection
