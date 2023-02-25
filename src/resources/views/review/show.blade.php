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
        <!-- This is a comment

        <p class="card-text">{{ $viewData["review"]["content"] }}</p>
        <a href="{{ route('review.delete', ['id'=> $viewData['review']['id']]) }}"
           class="btn bg-primary text-white">Delete</a>
        -->

        <form action="{{ route('review.delete', ['id'=> $viewData['review']['id']]) }}" method="post">
          <input class="btn bg-primary text-white" type="submit" value="Delete" />
          @csrf
          @method('delete')
        </form  >
      </div>
    </div>
  </div>
</div>
@endsection
