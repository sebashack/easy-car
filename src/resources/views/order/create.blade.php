@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Order</div>
                    <div class="card-body">
                    <div class="container text-center">
                    @foreach($viewData["cars"] as $key => $car)
                    <div class="card">
                      <div class="row">
                        <div class="col">
                        <img src="{{ URL::asset('storage/' . $car->getImageUri())}}" style="width: '100%';" class="img-thumbnail" alt="car nout found :(">
                        </div>
                        <div class="col text-left">
                                <div class="card-body">
                                <h5 class="card-title">{{$car->getCarModel()->getModel()}}</h5>
                                <p class="card-text"> Color: {{ $car->getColor()}} </p>
                                <p class="card-text"><small class="text-muted">{{ $car->getPrice()}} </small></p>
                              </div>
                        </div>
                      </div>
                      </div>
                      <br/>
                      @endforeach
                    </div>
                    <p class=""> Total: {{ $viewData["total"] }} </p>
                        <a href="{{ route('order.removeAll') }}" class="btn bg-primary text-white">{{ __('Delete') }}</a>
                        <a href="#" class="btn bg-primary text-white">{{ __('Create order') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
