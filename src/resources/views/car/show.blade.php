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
          Model: {{ $viewData['model']->getModel() }} 
        </p>
          Brand: {{ $viewData['model']->getBrand() }}
        <p>
        @if ($viewData['car']->getIsAvailable())
          {{ __('Available') }}
        @else
          {{ __('Not Available') }}
        @endif
        </p>
        <button class="btn btn-primary">Show reviews</button>
        <div class="reviews">
            @foreach ($viewData['model']->getReviews() as $review)
                <div>
                  <p>Auth: {{ $review->getUser()->getName() }}</p>
                  <p>Rating: {{ $review->getRating() }}</p>
                  <p>Content: {{ $review->getContent() }}</p>
                </div>
            @endforeach
        </div>

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
@section('scripts')
<script src="{{ asset('js/reviews-manage.js }}"></script>
@endsection
