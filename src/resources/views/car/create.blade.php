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
          @if (session('status'))
            <div class="alert alert-success">
              {{ session('status') }}
            </div>
          @endif

            <form method="POST" action="{{ route('car.save') }}" enctype="multipart/form-data">
              @csrf
              <input type="text" class="form-control mb-2" placeholder="Enter color" name="color" value="{{ old('color') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter kilometers" name="kilometers" value="{{ old('kilometers') }}" />
              <input type="number" class="form-control mb-2" placeholder="Enter price" name="price" value="{{ old('price') }}" />
              <div class="form-group">
                <label>Image:</label>
                <input type="file" name="image_uri" />
              </div>
              <div class="form-group">
                <label for="transmission">Transmission:</label>
                <select class="form-control" name="transmission_type">
                  <option value="automatic">Automatic</option>
                  <option value="mechanic">Mechanic</option>
                  <option value="triptronic">Triptronic</option>
                </select>
              </div>
              <div class="form-group">
                <label for="vehicle-type">Type of Vehicle:</label>
                <select class="form-control" name="type">
                  <option value="van">Van</option>
                  <option value="sedan">Sedan</option>
                  <option value="truck">Truck</option>
                  <option value="suv">SUV</option>
                  <option value="coupe">Coupe</option>
                </select>
              </div>
              <div class="form-group">
                <label for="year">Manufacture day:</label>
                <input type="number" class="form-control"  name="manufacture_date" min="1900" max="2099">
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_new">
                <label class="form-check-label" for="flexCheckDefault">
                    Mark if the car is new
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="is_available" >
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