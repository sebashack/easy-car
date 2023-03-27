@extends('layouts.app') @section('title', $viewData["title"])
@section('content')
<div class="text-left">
    <div class="text-center">
        <h1>{{ __("Car Models") }}</h1>
    </div>
    <div class="row">
        @foreach ($viewData["carModels"] as $carModel)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <p>{{ __("Brand") }}: {{ $carModel->getBrand() }}</p>
                    <p>{{ __("Model") }}: {{ $carModel->getModel() }}</p>
                    <div id="car-model-actions">
                        <a
                            href="{{ route('adminCarModel.show', ['id'=> $carModel->getId()]) }}"
                            class="btn action-bg-color"
                        >
                            {{ __("Check car model") }}
                        </a>
                        <a
                            href="{{ route('adminCarModel.edit', ['id'=> $carModel->getId()]) }}"
                            class="btn bg-success text-white"
                        >
                            <span>&#9998;</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
