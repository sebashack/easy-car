@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <h3 class="card-text">{{ __("Brand") }}: {{ $viewData['carModel']->getBrand() }}</h3>
                <p class="card-text">
                    <strong>{{ __("Model") }}:</strong> {{ $viewData['carModel']->getModel() }}
                </p>
                <p class="card-text">
                    <strong>{{ __("Description") }}:</strong> {{ $viewData['carModel']->getDescription() }}
                </p>
                @auth
                <a class="btn btn-primary" href="{{ route('review.create',['id'=> $viewData['carModel']->getId()]) }}">Make review</a>
                @endauth
                @if ($viewData['is_admin'])
                </br>
                </br>
                <form action="{{ route('carModel.delete', ['id'=> $viewData['carModel']->getId()]) }}" method="post">
                    <input class="btn bg-danger text-white" type="submit" value="{{ __('Delete') }}"/>
                    @csrf
                    @method('delete')
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
