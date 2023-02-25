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
        <p>{{ $review["content"] }}</p>
        <p>Rating: {{ $review["rating"] }} out of 5</p>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
