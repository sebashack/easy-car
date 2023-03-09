@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ URL::asset('storage/' . $viewData['car']->getImageUri())}}"  class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           ID: {{ $viewData['car']->getId() }}
        </h5>
        <p>{{ __('Color') }}: {{ $viewData['car']->getColor() }}</p>
        <p>{{ __('Price') }}: ${{ $viewData['car']->getPrice() }}</p>
        <p>{{ __('Kilometers') }}: {{ $viewData['car']->getKilometers() }} km </p>

        <p>
        @if ($viewData['car']->getIsNew())
          {{ __('New Model') }}
        @else
          {{ __('Used Car') }}
        @endif
        </p>
        <p>
        @if ($viewData['car']->getIsAvailable())
          {{ __('Available') }}
        @else
          {{ __('Not Available') }}
        @endif
        </p>

        <form action="{{ route('car.delete', ['id'=> $viewData['car']->getId()]) }}" method="post">
          <input class="btn bg-primary text-white" type="submit" value="{{ __('Delete') }}" />
          @csrf
          @method('delete')
        </form  >
      </div>
    </div>
  </div>
</div>
@endsection
