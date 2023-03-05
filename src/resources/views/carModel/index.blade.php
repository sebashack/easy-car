@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
  <div>
    <h1>Car Models</h1>
  </div>
  @foreach ($viewData["carModels"] as $carModel)
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <p>Brand: {{ $carModel->getBrand() }}</p>
        <p>Model: {{ $carModel->getModel() }}</p>
        <p>Description: {{ $carModel->getDescription() }}</p>
        <a href="{{ route('carModel.show', ['id'=> $carModel->getId() }} class="btn bg-primary text-white">Check car model</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection