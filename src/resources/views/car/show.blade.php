@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<h1>{{ $viewData['model']->getBrand() }} {{ $viewData['model']->getModel() }}</h1>
<div class="card mb-3">
  <div class="row g-0">
  <img src="{{ URL::asset('storage/' . $viewData['car']->getImageUri())}}"  class="img-fluid rounded-start">

      <div class="card-body">
        <h5 class="card-title">
          {{ __('Details') }}
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
        @if ($viewData['car']->getIsAvailable())
          {{ __('Available') }}
        @else
          {{ __('Not Available') }}
        @endif
        </p>
        <button class="btn btn-primary mb-3">Show reviews</button>
        <div class="hide">
            <div class="row">
                @foreach ($viewData['model']->getReviews() as $review)
                  <div class="col-sm col-lg-3 mb-2">
                  <div class="card bg-light mb-3">
                  <div class="car-header text-center mt-2">{{ __('Auth') }}: {{ $review->getUser()->getName() }}</div>
                  <div class="card-body text-center">
                    <h5 class="car-title">{{ __('Rating') }}: {{ $review->getRating() }}</h5>
                    <p class="car-text">{{ __('Content') }}: {{ $review->getContent() }}</p>
                  </div>
                  </div>
                  </div>
                @endforeach
            </div>
        </div>


        <form action="{{ route('car.delete', ['id'=> $viewData['car']->getId()]) }}" method="post">
          <input class="btn bg-primary text-white" type="submit" value="{{ __('Delete') }}" />
          @csrf
          @method('delete')
        </form  >
      </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ asset('js/reviewsManage.js') }}"></script>
@endsection
