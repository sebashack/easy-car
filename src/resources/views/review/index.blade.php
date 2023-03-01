@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
  <h1>Reviews</h1>
  </br>
  @foreach ($viewData["reviews"] as $review)
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <h4>Id: {{ $review->getId() }}</h4>
        <p>Rating: {{ $review->getRating() }} / 5</p>
        <a href="{{ route('review.show', ['id'=> $review->getId()]) }}" class="btn bg-primary text-white">Check review</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
