@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Add Car Model</div>
          <div class="card-body">
            <form method="POST" action="{{ route('carModel.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter brand" name="brand" value="{{ old('brand') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter model" name="model" value="{{ old('model') }}" />
              <input type="text" class="form-control mb-2" placeholder="Enter description" name="description" value="{{ old('description') }}" />
              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection