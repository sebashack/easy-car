@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    @if (session('status_updated'))
    <div class="alert alert-success">
        {{ session("status_updated") }}
    </div>
    @endif

    @if (session('status_not_updated'))
    <div class="alert alert-warning">
        {{ session("status_not_updated") }}
    </div>
    @endif
    <img src="{{ URL::asset('storage/' . $viewData['car']->getImageUri())}}" class="img-fluid rounded-start" />
    <p><strong>{{ __('Car model') }}:</strong> {{ $viewData['carModel']->getModel() }}</p>
    <p><strong>{{ __('Car brand') }}:</strong> {{ $viewData['carModel']->getBrand() }}</p>
    <p><strong>{{ __('Kilometer') }}:</strong> {{ $viewData['car']->getKilometers() }}</p>
    <p><strong>{{ __('Price') }}:</strong> {{ $viewData['car']->getPrice() }}</p>
    <p><strong>{{ __('Type') }}:</strong> {{ $viewData['car']->getType() }}</p>
    <p><strong>{{ __('Transmission type') }}:</strong> {{ $viewData['car']->getTransmissionType() }}</p>
    <p><strong>{{ __('Year') }}:</strong> {{ $viewData['car']->getManufactureYear() }}</p>
    <p><strong>{{ __('User') }}:</strong> {{ $viewData['publisher_name'] }}</p>
    <p><strong>{{ __('Message') }}:</strong> {{ $viewData['publishRequest']->getMessage() }}</p>
    <p><strong>{{ __('State') }}:</strong> {{ $viewData['publishRequest']->getState() }}</p>

    @if ($viewData['publishRequest']->getState() === 'pending')
    <form action="{{ route('publishRequest.accept', ['id'=> $viewData['publishRequest']->getId()]) }}" method="post">
        <input class="btn btn-primary text-white" type="submit" value="{{__('Accept')}}" />
        @csrf
        @method('put')
    </form  >
    </br>
    <form action="{{ route('publishRequest.reject', ['id'=> $viewData['publishRequest']->getId()]) }}" method="post">
        <input class="btn btn-danger text-white" type="submit" value="{{__('Reject')}}" />
        @csrf
        @method('put')
    </form  >
    @endif
</div>
@endsection
