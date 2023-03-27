@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-left">
    <div class="text-center">
        <h1>{{ __("Cars") }}</h1>
    </div>

    <form method="GET" action="{{ route('car.index') }}" enctype="multipart/form-data" >
        @csrf
        <div class="input-group">
            <div class="form-group">
                <select class="form-select mb-2" name="car_state">
                    <option value="NA">
                        {{ __("Condition") }}
                    </option>
                    <option value="new">
                        {{ __("New") }}
                    </option>
                    <option value="used">
                        {{ __("Used") }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-select mb-2"" name="car_brand">
                    <option value="NA">
                        {{ __("Brand") }}
                    </option>
                    @foreach($viewData['carModels'] as $carModel)
                    <option value="{{ $carModel->getBrand() }}">
                        {{ $carModel->getBrand() }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-select mb-2"" name="transmission_type">
                    <option value="NA">
                        {{ __("Transmission") }}
                    </option>
                    <option value="automatic">
                        {{ __("Automatic") }}
                    </option>
                    <option value="mechanic">
                        {{ __("Mechanic") }}
                    </option>
                    <option value="triptonic">
                        {{ __("Triptonic") }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-select mb-2" name="price_range">
                    <option value="NA">
                        {{ __("Price range") }}
                    </option>
                    <option value="range1">
                        {{ __("$10M -- $40M") }}
                    </option>
                    <option value="range2">
                        {{ __("$40M -- $80M") }}
                    </option>
                    <option value="range3">
                        {{ __("$80M -- $120M") }}
                    </option>
                    <option value="range4">
                        {{ __("$120M -- $150M") }}
                    </option>
                    <option value="range5">
                        {{ __("$150M -- $200M") }}
                    </option>
                    <option value="range6">
                        {{ __("$200M >") }}
                    </option>
                </select>
            </div>
            <input type="submit" class="btn bt-bg-color" value="{{ __('Filter') }}"/>
        </div>
    </form>

    <br />
    @auth
    <a class="btn btn-outline-dark" href="{{ route('order.create') }}">
        &#128100; {{ __("Check out your cars") }}: {{ $viewData["cart_length"] }}
    </a>
    <br />
    <br />
    @endauth
    <div class="row">
        @foreach ($viewData["cars"] as $car)
        @if($car->carIsVisible())
        <div class="col-md-4 col-lg-3 mb-2">
            <div id="car-card" class="card">
                <img
                    id="car-image"
                    src="{{ URL::asset('storage/' . $car->getImageUri())}}"
                    class="img-fluid rounded-start"
                />
                <div id="car-info" class="card-body">
                    <p>
                        {{ $car->getCarModel()->getBrand() . ' ' . $car->getCarModel()->getModel()}}
                    </p>
                    <h6>{{ __("Price") }}: ${{ $car->getPrice() }}</h6>
                    <div class="car-card-actions">
                        <a
                            href="{{ route('car.show', ['id'=> $car->getId()]) }}"
                            class="btn action-bg-color"
                        >
                            {{ __("Check Car") }}
                        </a>
                        @auth
                        <a
                            href="{{ route('car.addToCart', ['id'=> $car->getId()]) }}"
                            class="btn action-bg-color"
                        >
                            <b>&#43;</b> {{ __("Add to cart") }}
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
