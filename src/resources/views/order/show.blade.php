@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    <p><strong>{{ __('Date') }}</strong>: {{ $viewData['order']->getDateStr() }}</p>
    <p><strong>{{ __('Customer') }}</strong>: {{ $viewData['order']->getUser()->getName() }} {{ $viewData['order']->getUser()->getLastName() }} </p>
    <p><strong>{{ __('Total') }}</strong>: ${{ $viewData['order']->getTotal() }} </p>
    <div>
        @foreach ($viewData["items"] as $item)
        <div class="row">
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>{{ __('Item') }}: {{ $item->getId() }} </h3>
                        <p><strong>{{ __('Model') }}</strong>: {{ $item->getCar()->getCarModel()->getModel() }} </p>
                        <p><strong>{{ __('Brand') }}</strong>: {{ $item->getCar()->getCarModel()->getBrand() }} </p>
                        <p><strong>{{ __('Price to date') }}</strong>: ${{ $item->getPriceToDate() }} </p>
                        <a href="{{ route('car.show',['id'=>$item->getCar()->getId()]) }}" class="btn btn-sm btn-primary">{{ __('Check car') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    <div>
</div>
@endsection
