@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
  <h1>{{ __('Cars') }}</h1>
  </br>
  <div class="row">

    @foreach ($viewData["cars"] as $car)
    <div class="col-md-4 col-lg-3 mb-2">
      <div class="card">
        <img src="{{ URL::asset('storage/' . $car->getImageUri())}}"  class="img-fluid rounded-start">
        <div class="card-body text-center">
          <p>{{ $car->getCarModel()->getBrand() . ' ' . $car->getCarModel()->getModel()}}</p>
          <p>{{ __('Color') }}: {{ $car->getColor() }} </p>
          <a href="{{ route('car.show', ['id'=> $car->getId()]) }}" class="btn bg-primary text-white">{{ __('Check Car') }}</a>
          @auth
          <a href="{{ route('car.addToCart', ['id'=> $car->getId()]) }}" class="btn bg-primary text-white">{{ __('Add to cart') }}</a>
          @endauth
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection