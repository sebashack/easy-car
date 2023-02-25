@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Review</div>
          <div class="card-body">
            <form method="POST" action="{{ route('review.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter review" name="content" value="{{ old('content') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter rating" name="rating" value="{{ old('rating') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
