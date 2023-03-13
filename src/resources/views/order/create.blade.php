@extends('layouts.app')
@section('title', $viewData['title'])
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Order</div>
                    <div class="card-body">
                        <ul>
                            @foreach($viewData["cars"] as $key => $car)
                              <li>
                                Id: {{ $key }} - {{ $car }} 
                              </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('order.removeAll') }}" class="btn bg-primary text-white">{{ __('Delete') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
