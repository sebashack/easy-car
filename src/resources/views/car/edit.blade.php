@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Edit Car") }}</div>
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
                        action="{{ route('car.update',['id'=> $viewData['car']->getId()]) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        @method('patch')
                        <input
                            type="text"
                            value="{{ $viewData['car']->getColor() }}"
                            class="form-control mb-2"
                            name="color"
                        />
                        <input
                            type="number"
                            value="{{ $viewData['car']->getKilometers() }}""
                            class="form-control mb-2"
                            name="kilometers"
                            id="kilometers"
                        />
                        <input
                            type="number"
                            class="form-control mb-2"
                            value="{{ $viewData['car']->getPrice() }}"
                            name="price"                         
                        />
                        <div class="form-group">
                            <label>{{ __("Image") }}:</label>
                            <img src="{{ URL::asset('storage/' . $viewData['car']->getImageUri()) }}" alt="Imagen del carro" width="100">
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
                                <option value="automatic" {{ $viewData['car']->getTransmissionType() == 'automatic' ? 'selected' : ''}}>
                                    {{ __("Automatic") }}
                                </option>
                                <option value="mechanic"  {{ $viewData['car']->getTransmissionType() == 'mechanic' ? 'selected' : ''}}>
                                    {{ __("Mechanic") }}
                                </option>
                                <option value="triptonic"  {{ $viewData['car']->getTransmissionType() == 'triptonic' ? 'selected' : ''}}>
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
                                <option value="{{ $carModel->getId() }}"  {{ $viewData['model']->getModel() == $carModel->getModel() ? 'selected' : ''}}>
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
                                <option value="van" {{ $viewData['car']->getType() == 'van' ? 'selected' : ''}}>{{ __("Van") }}</option>
                                <option value="sedan" {{ $viewData['car']->getType() == 'sedan' ? 'selected' : ''}}>{{ __("Sedan") }}</option>
                                <option value="truck" {{ $viewData['car']->getType() == 'truck' ? 'selected' : ''}}>{{ __("Truck") }}</option>
                                <option value="suv" {{ $viewData['car']->getType() == 'suv' ? 'selected' : ''}}>{{ __("SUV") }}</option>
                                <option value="coupe" {{ $viewData['car']->getType() == 'coupe' ? 'selected' : ''}}>{{ __("Coupe") }}</option>
                                <option value="sport" {{ $viewData['car']->getType() == 'sport' ? 'selected' : ''}}>{{ __("Sport") }}</option>
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
                                value="{{ $viewData['car']->getManufactureYear() }}"
                                id="manufacture_year"
                                min="2000"
                                max="2023"
                            />
                        </div>
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                {{ $viewData['car']->getIsNew() === true? 'checked' : '' }}
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
