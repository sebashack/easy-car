@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
    <h1>{{ __("Reviews") }}</h1>
    <div class="row">
        @foreach ($viewData["reviews"] as $review)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h4>{{ __("Brand") }}: {{ $review->getCarModel()->getBrand() }}</h4>
                    @if ($review->getRating() == 5)
                        <p>&#11088; &#11088; &#11088;&#11088; &#11088;</p>
                        @elseif ($review->getRating() == 4)
                        <p>&#11088; &#11088; &#11088; &#11088;</p>
                        @elseif ($review->getRating() == 3)
                        <p>&#11088; &#11088; &#11088;</p>
                        @elseif ($review->getRating() == 2)
                        <p>&#11088; &#11088;</p>
                        @else
                        <p class="star">&#11088;</p>
                    @endif
                    <a
                        href="{{ route('review.show', ['id'=> $review->getId()]) }}"
                        class="btn action-bg-color"
                    >
                        {{ __("Check review") }}
                    </a>
                    <a
                    href="{{ route('review.edit', ['id'=> $review->getId()]) }}"
                    class="btn bg-success text-white"
                    >
                        <span>&#9998;</span>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
