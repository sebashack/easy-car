@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<h1>
    {{ $viewData['model']->getBrand() }} {{ $viewData['model']->getModel() }}
</h1>
<div class="card">
    <div class="row justify-content-center">
        <div class="col">
            <img
                src="{{ URL::asset('storage/' . $viewData['car']->getImageUri())}}"
                class="img-fluid rounded-start"
            />
        </div>

        <div class="col">
            <br />
            <h3>Price &#128184; : $ {{ $viewData['car']->getPrice() }}</h3>
            <br />
            <h5 class="card-title">
                {{ __("Details") }}
            </h5>
            <table class="car-info-table">
                <tr>
                  <th>{{ __("Color") }}</th>
                  <td>{{ $viewData['car']->getColor() }}</td>
                </tr>
              
                <tr>
                  <th>{{ __("Kilometers") }}</th>
                  <td>{{ $viewData['car']->getKilometers() }} km</td>
                </tr>
              
                <tr>
                    <th>{{ __("Condition") }}</th>
                    @if ($viewData['car']->getIsNew())
                    <td>{{ __("New") }}</td>
                    @else
                    <td>{{ __("Used") }}</td>
                    @endif
                </tr>

                <tr>
                    <th>{{ __("Transmission") }}</th>
                    <td>{{ $viewData['car']->getTransmissionType() }}</td>
                </tr>
              </table>
        </div>
        <div class="card-body text-right">
            <button class="btn action-bg-color mb-3">
                {{ __("Show reviews") }}
            </button>
            <a
                href="{{ route('carModel.show',['id'=>$viewData['model']->getId()]) }}"
                class="btn action-bg-color mb-3"
                >{{ __("Check model") }}</a
            >
            <div class="hide">
                <div class="row">
                    @foreach ($viewData['model']->getReviews() as $review)
                    <div class="col-sm col-lg-3 mb-2">
                        <div class="card bg-light mb-3">
                            <div class="car-header text-center mt-2">
                                {{ __("User") }}:
                                {{ $review->getUser()->getName() }}
                            </div>
                            <div class="card-body text-center">
                                @if ($review->getRating() == 5)
                                <p>
                                    &#11088; &#11088; &#11088; &#11088; &#11088;
                                </p>
                                @elseif ($review->getRating() == 4)
                                <p>&#11088; &#11088; &#11088; &#11088;</p>
                                @elseif ($review->getRating() == 3)
                                <p>&#11088; &#11088; &#11088;</p>
                                @elseif ($review->getRating() == 2)
                                <p>&#11088; &#11088;</p>
                                @else
                                <p>&#11088;</p>
                                @endif
                                <p class="car-text">
                                    {{ __("Review") }}:
                                    {{ $review->getContent() }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')
<script src="{{ asset('js/reviewsManageInCar.js') }}"></script>
@endsection
