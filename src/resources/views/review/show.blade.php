@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           Rating: {{ $viewData['review']['rating'] }} / 5
        </h5>
        <p class="card-text">{{ $viewData["review"]["content"] }}</p>
      </div>
    </div>
  </div>
</div>
@endsection
