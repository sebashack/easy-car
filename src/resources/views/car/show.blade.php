@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<h1>
    {{ $viewData['model']->getBrand() }} {{ $viewData['model']->getModel() }}
</h1>
<div class="card mb-3">
    <div class="row g-0">
        <img
            src="{{ URL::asset('storage/' . $viewData['car']->getImageUri())}}"
            class="img-fluid rounded-start"
        />

        <div class="card-body">
            <h5 class="card-title">
                {{ __("Details") }}
            </h5>
            <p>{{ __("Color") }}: {{ $viewData['car']->getColor() }}</p>
            <p>{{ __("Price") }}: ${{ $viewData['car']->getPrice() }}</p>
            <p>
                {{ __("Kilometers") }}:
                {{ $viewData['car']->getKilometers() }} km
            </p>
            <p>
                @if ($viewData['car']->getIsNew())
                {{ __("Condition") }}: {{ __("New") }}
                @else
                {{ __("Condition") }}: {{ __("Used") }}
                @endif
            </p>
            <p>{{ __("Transmission") }}: {{ $viewData['car']->getTransmissionType() }}</p>
            <button class="btn btn-primary mb-3">{{ __('Show reviews') }}</button>
            <a href="{{ route('carModel.show',['id'=>$viewData['model']->getId()]) }}" class="btn btn-primary mb-3">{{ __('Check model') }}</a>
            <div class="hide">
                <div class="row">
                    @foreach ($viewData['model']->getReviews() as $review)
                    <div class="col-sm col-lg-3 mb-2">
                        <div class="card bg-light mb-3">
                            <div class="car-header text-center mt-2">
                                {{ __("User") }}: {{ $review->getUser()->getName() }}
                            </div>
                            <div class="card-body text-center">
                                @if ($review->getRating() == 5)
                                <h5 class="car-title star">★★★★★</h5>
                                @elseif ($review->getRating() == 4)
                                <h5 class="car-title star">★★★★</h5>
                                @elseif ($review->getRating() == 3)
                                <h5 class="car-title star">★★★</h5>
                                @elseif ($review->getRating() == 2)
                                <h5 class="car-title star">★★</h5>
                                @else
                                <h5 class="car-title star">★</h5>
                                @endif
                                <p class="car-text">
                                    {{ __("Review") }}: {{ $review->getContent() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @if ($viewData['is_admin'])
              <form action="{{ route('car.delete', ['id'=> $viewData['car']->getId()]) }}" method="post">
                <input class="btn btn-danger text-white" type="submit" value="{{ __('Delete car') }}" />
                @csrf
                @method('delete')
              </form  >
            @endif
        </div>
      </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/reviewsManageInCar.js') }}"></script>
@endsection
