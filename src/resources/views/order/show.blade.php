@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    <p><strong>{{ __('Date') }}</strong>: {{ $viewData['order']->getDateStr() }}</p>
    <p><strong>{{ __('Customer') }}</strong>: {{ $viewData['order']->getUser()->getName() }} {{ $viewData['order']->getUser()->getLastName() }} </p>
    <p><strong>{{ __('Total') }}</strong>: ${{ $viewData['order']->getTotal() }} </p>
    <div>
        @foreach ($viewData["items"] as $item)
        @php $car = $item->getCar(); @endphp
        @if ($car)
        <div class="row">
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <div class="card-body text-center">
                        <h3>{{ __('Item') }}: {{ $item->getId() }} </h3>
                        @php $carModel = $car->getCarModel(); @endphp
                        <p><strong>{{ __('Model') }}</strong>: {{ $carModel->getModel() }} </p>
                        <p><strong>{{ __('Brand') }}</strong>: {{ $carModel->getBrand() }} </p>
                        <p><strong>{{ __('Price to date') }}</strong>: ${{ $item->getPriceToDate() }} </p>
                        <a href="{{ route('car.show',['id'=>$item->getCar()->getId()]) }}" class="btn btn-sm btn-primary">{{ __('Check car') }}</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    <div>
    <a class="btn btn-success mb-2"  href="{{ route('order.pdf',['id'=>$viewData['order']->getId()]) }}">PDF</a>
</div>
@endsection
