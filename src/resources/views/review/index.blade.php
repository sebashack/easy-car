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
                    <h4>{{ __("Id") }}: {{ $review->getId() }}</h4>
                    @if ($review->getRating() == 5)
                        {{ __("Rating") }}:
                        <p class="star">★★★★★</p>
                        @elseif ($review->getRating() == 4)
                        {{ __("Rating") }}:
                        <p class="star">★★★★</p>
                        @elseif ($review->getRating() == 3)
                        {{ __("Rating") }}:
                        <p class="star">★★★</p>
                        @elseif ($review->getRating() == 2)
                        {{ __("Rating") }}:
                        <p class="star">★★</p>
                        @else
                        {{ __("Rating") }}:
                        <p class="star">★</p>
                    @endif
                    <a
                        href="{{ route('review.show', ['id'=> $review->getId()]) }}"
                        class="btn bg-primary text-white"
                    >
                        {{ __("Check review") }}
                    </a>
                    @if (!$viewData['is_admin'])
                    <a
                    href="{{ route('review.edit', ['id'=> $review->getId()]) }}"
                    class="btn bg-primary text-white"
                    >
                        <span>&#9998;</span>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
