@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-left">
    <div class="text-center">
        <h1>{{ __("Shoes") }}</h1>
    </div>

    <div class="row">
        @foreach ($viewData["shoes"] as $shoe)
        <div class="col-md-4 col-lg-3 mb-2">
            <div id="car-card" class="card">
                <img
                    id="car-image"
                    src="{{ $shoe['imagen']  }}"
                    class="img-fluid rounded-start"
                />
                <div id="car-info" class="card-body">
                    <h6>{{ __("Brand") }}: {{ $shoe['marca']  }}</h6>
                    <h6>{{ __("Product") }}: {{ $shoe['producto'] }}</h6>
                    <h6>{{ __("Size") }}: {{ $shoe['talla'] }}</h6>
                    <div class="car-card-actions">
                        <a
                            href="{{ $shoe['url_producto'] }}"
                            class="btn action-bg-color"
                        >
                            {{ __("Check Shoe") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection