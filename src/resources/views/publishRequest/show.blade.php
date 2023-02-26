@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           Message: {{ $viewData['publishRequest']['message'] }} / 5
        </h5>

        <form action="{{ route('publishRequest.delete', ['id'=> $viewData['publishRequest']['id']]) }}" method="post">
          <input class="btn bg-primary text-white" type="submit" value="Delete" />
          @csrf
          @method('delete')
        </form  >
      </div>
    </div>
  </div>
</div>
@endsection