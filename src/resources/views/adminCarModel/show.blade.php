@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
            <div class="card-body">
                <h3 class="card-text">{{ __("Brand") }}: {{ $viewData['carModel']->getBrand() }}</h3>
                <p class="card-text">
                    <strong>{{ __("Model") }}:</strong> {{ $viewData['carModel']->getModel() }}
                </p>
                <p class="card-text">
                    <strong>{{ __("Description") }}:</strong> {{ $viewData['carModel']->getDescription() }}
                </p>
                <button class="btn btn-primary mb-3 reviews">Show reviews</button>
                <div class="hide">
                <div class="row">
                    @foreach ($viewData['carModel']->getReviews() as $review)
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
                                @auth
                                <form action="{{ route('review.delete', ['id'=> $review->getId()]) }}" method="post">
                                    <input class="btn btn-danger text-white" type="submit" value="{{ __('Delete') }}" />
                                    @csrf
                                    @method('delete')
                                </form  >
                                @endauth
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                </div>
                </br>
                </br>
                @auth
                <form action="{{ route('adminCarModel.delete', ['id'=> $viewData['carModel']->getId()]) }}" method="post">
                    <input class="btn bg-danger text-white" type="submit" value="{{ __('Delete') }}"/>
                    @csrf
                    @method('delete')
                </form>
                @endauth
            </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('js/reviewsManageInCarModel.js') }}"></script>
@endsection
