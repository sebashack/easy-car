@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-left">
    <div class="text-center">
        <h1>{{ __("Cars") }}</h1>
    </div>
    <br />
    <div class="row">
        @foreach ($viewData["cars"] as $car)
        @if($car->carIsVisible())
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <img
                    src="{{ URL::asset('storage/' . $car->getImageUri())}}"
                    class="img-fluid rounded-start"
                />
                <div class="card-body text-center">
                    <p>
                        {{ $car->getCarModel()->getBrand() . ' ' . $car->getCarModel()->getModel()}}
                    </p>
                    <p>{{ __("Color") }}: {{ $car->getColor() }}</p>
                    <a
                        href="{{ route('adminCar.show', ['id'=> $car->getId()]) }}"
                        class="btn bg-primary text-white"
                    >
                        {{ __("Check Car") }}
                    </a>
                    <a
                        href="{{ route('adminCar.edit', ['id'=> $car->getId()]) }}"
                        class="btn bg-primary text-white"
                    >
                    <span>&#9998;</span>
                    </a>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
