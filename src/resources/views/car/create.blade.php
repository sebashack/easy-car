@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Car</div>
          <div class="card-body">
          @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif

            <form method="POST" action="{{ route('car.save') }}">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter color" name="color" value="{{ old('color') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter kilometers" name="kilometers" value="{{ old('kilometers') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />


              
                <input class="form-check-input" type="checkbox" name="isNew">
                <label class="form-check-label" for="flexCheckDefault">
                    Mark if the car is new
                </label>
             

              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="isAvailable" >
                <label class="form-check-label" for="flexCheckDefault">
                    Mark if the car is available
                </label>
              </div>

              <input type="submit" class="btn btn-primary" value="Send" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection