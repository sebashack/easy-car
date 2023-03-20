@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
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
</div>
@endsection
