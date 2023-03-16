@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Create Car") }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif @if (session('status'))
                    <div class="alert alert-success">
                        {{ session("status") }}
                    </div>
                    @endif

                    <form
                        method="POST"
                        action="{{ route('car.save') }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <input
                            type="text"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter color') }}"
                            name="color"
                            value="{{ old('color') }}"
                        />
                        <input
                            type="number"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter kilometers') }}"
                            name="kilometers"
                            id="kilometers"
                            value="{{ old('kilometers') }}"
                        />
                        <input
                            type="number"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter price') }}"
                            name="price"
                            value="{{ old('price') }}"
                        />
                        <div class="form-group">
                            <label>{{ __("Image") }}:</label>
                            <input type="file" name="image_uri" />
                        </div>
                        <div class="form-group">
                            <label for="transmission">
                                {{ __("Transmission") }}:
                            </label>
                            <select
                                class="form-control"
                                name="transmission_type"
                            >
                                <option value="automatic">
                                    {{ __("Automatic") }}
                                </option>
                                <option value="mechanic">
                                    {{ __("Mechanic") }}
                                </option>
                                <option value="triptronic">
                                    {{ __("Triptonic") }}
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="carModels">
                                {{ __("Car Models") }}:
                            </label>
                            <select class="form-control" name="car_model_id">
                                @foreach($viewData['carModels'] as $carModel)
                                <option value="{{ $carModel->getId() }}">
                                    {{ $carModel->getBrand() . ' ' . $carModel->getModel() }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vehicle-type">
                                {{ __("Type of Vehicle") }}:
                            </label>
                            <select class="form-control" name="type">
                                <option value="van">{{ __("Van") }}</option>
                                <option value="sedan">{{ __("Sedan") }}</option>
                                <option value="truck">{{ __("Truck") }}</option>
                                <option value="suv">{{ __("SUV") }}</option>
                                <option value="coupe">{{ __("Coupe") }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">
                                {{ __("Manufacture year") }}:
                            </label>
                            <input
                                type="number"
                                class="form-control"
                                name="manufacture_year"
                                id="manufacture_year"
                                min="2000"
                                max="2023"
                            />
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="is_new"
                                id="is_new"
                            />
                            <label
                                class="form-check-label"
                                for="flexCheckDefault"
                            >
                                {{ __("Mark if the car is new") }}
                            </label>
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="is_available"
                            />
                            <label
                                class="form-check-label"
                                for="flexCheckDefault"
                            >
                                {{ __("Mark if the car is available") }}
                            </label>
                        </div>
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="{{ __('Send') }}"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/manufactureYear.js') }}"></script>
@endsection
