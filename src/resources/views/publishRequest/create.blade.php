@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Create publishrequest')}}</div>
                <div class="card-body">
                    @if ($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('publishRequest.save') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="form-control mb-2" placeholder="{{ __('Message placeholder') }}" name="message" value="{{ old('message') }}" />
                        <h6>Car info</h6>
                        <input type="text" class="form-control mb-2" placeholder="Enter car color" name="color" value="{{ old('color') }}" />
                        <input type="number" class="form-control mb-2" placeholder="{{ __('Enter kilometers') }}" name="kilometers" value="{{ old('kilometers') }}" />
                        <input type="number" class="form-control mb-2" placeholder="{{ __('Enter price') }}" name="price" value="{{ old('price') }}" />
                        <div class="form-group">
                            <label>{{ __('Image') }}:</label>
                            <input type="file" name="image_uri" />
                        </div>
                        <div class="form-group">
                            <label for="transmission">{{ __('Transmission') }}:</label>
                            <select class="form-select mb-2" name="transmission_type" default="automatic">
                                <option value="automatic">{{ __('Automatic') }}</option>
                                <option value="mechanic">{{ __('Mechanic') }}</option>
                                <option value="triptronic">{{ __('Triptonic') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vehicle-type">{{ __('Type of Vehicle') }}:</label>
                            <select class="form-select mb-2" name="type" default="van">
                                <option value="van">{{ __('Van') }}</option>
                                <option value="sedan">{{ __('Sedan') }}</option>
                                <option value="truck">{{ __('Truck') }}</option>
                                <option value="suv">{{ __('SUV') }}</option>
                                <option value="coupe">{{ __('Coupe') }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="carModels">{{ __('Car Models') }}:</label>
                            <select class="form-select mb-2" name="car_model_id">
                              @foreach($viewData['carModels'] as $carModel)
                                <option value="{{ $carModel->getId() }}">{{ $carModel->getBrand() . ' ' . $carModel->getModel() }}</option>
                              @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="year">{{ __('Manufacture year') }}:</label>
                            <input type="number" class="form-control" name="manufacture_year" min="2000" max="2023">
                        </div>
                        <input type="submit" class="btn btn-primary" value="{{ __('Send') }}" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
