@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
  <h1>Cars</h1>
  </br>
  @foreach ($viewData["cars"] as $car)
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <p>ID: {{ $car["id"] }}</p>
        <p>Color: {{ $car["color"] }} </p>
        <a href="{{ route('car.show', ['id'=> $car['id']]) }}" class="btn bg-primary text-white">Check Car</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection