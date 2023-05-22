@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-left">
    <div class="text-center">
        <h1>{{ __("Orders") }}</h1>
    </div>
    <br />

    <div class="row">
        @foreach ($viewData["orders"] as $order)
        <div class="col-md-4 col-lg-3 mb-2">
            <div class="card">
                <div class="card-body text-center">
                    <p><strong>{{ __('Id') }}</strong>: {{ $order->getId() }}</p>
                    <p><strong>{{ __('Date') }}</strong>: {{ $order->getDateStr() }}</p>
                    <p><strong>{{ __('Customer') }}</strong>: {{ $order->getUser()->getName() }} {{ $order->getUser()->getLastName() }} </p>
                    <a href="{{ route('order.show',['id'=>$order->getId()]) }}" class="btn btn-sm action-bg-color">{{ __('Check order') }}</a>
                </div>
            </div>
        </div>
        @endforeach
        {{$viewData["orders"]->links()}}
    </div>
</div>
@endsection
