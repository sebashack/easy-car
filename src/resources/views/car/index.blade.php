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
        <p>Color: {{ $car["color"] }}</p>
        <p>Price: ${{ $car["price"] }} </p>
        <p>Kilometers: {{ $car["price"] }} km </p>

        <p>
        @if ($car["isNew"] ) 
        Nuevo
        @else 
        Usado
        @endif   
        </p>
        <p>
        @if ($car["isAvailable"] ) 
        Disponible
        @else 
        No Disponible
        @endif   
        </p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection