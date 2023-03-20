@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
    <h1>{{ __("Reviews") }}</h1>
    <br />
    <div class="row">
        @foreach ($viewData["reviews"] as $review)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <h4>Id: {{ $review->getId() }}</h4>
                    @if ($review->getRating() == 5)
                        Rating:
                        <p class="star">★★★★★</p>
                        @elseif ($review->getRating() == 4)
                        Rating:
                        <p class="star">★★★★</p>
                        @elseif ($review->getRating() == 3)
                        Rating:
                        <p class="star">★★★</p>
                        @elseif ($review->getRating() == 2)
                        Rating:
                        <p class="star">★★</p>
                        @else
                        Rating:
                        <p class="star">★</p>
                    @endif
                    <a
                        href="{{ route('review.show', ['id'=> $review->getId()]) }}"
                        class="btn bg-primary text-white"
                    >
                        {{ __("Check review") }}
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
