@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           ID: {{ $viewData['car']['id'] }} 
        </h5>
        <p>Color: {{ $viewData['car']['color']}}</p>
        <p>Price: ${{ $viewData['car']['price']}}</p>
        <p>Kilometers: {{ $viewData['car']['kilometers'] }} km </p>

        <p>
        @if ($viewData['car']['price'] ) 
        Nuevo
        @else 
        Usado
        @endif   
        </p>
        <p>
        @if ($viewData['car']['price']) 
        Disponible
        @else 
        No Disponible
        @endif   
        </p>
      </div>
    </div>
  </div>
</div>
@endsection