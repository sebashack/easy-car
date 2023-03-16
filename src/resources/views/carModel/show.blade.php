@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
<<<<<<< HEAD
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    {{ __("Car Model") }}: {{ $viewData["id"] }}
                </h5>
                <p class="card-text">
                    {{ __("Brand") }}: {{ $viewData['carModel']->getBrand() }}
                </p>
                <p class="card-text">
                    {{ __("Model") }}: {{ $viewData['carModel']->getModel() }}
                </p>
                <p class="card-text">
                    {{ __("Description") }}:
                    {{ $viewData['carModel']->getDescription() }}
                </p>

                @if ($viewData['isAdminUser'])
                <form
                    action="{{ route('carModel.delete', ['id'=> $viewData['carModel']->getId()]) }}"
                    method="post"
                >
                    <input
                        class="btn bg-primary text-white"
                        type="submit"
                        value="{{ __('Delete') }}"
                    />
                    @csrf @method('delete')
                </form>
                @endif
            </div>
        </div>
=======
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ __('Car Model') }}: {{$viewData['id']}}
        </h5>
        <p class="card-text">{{ __('Brand') }}: {{ $viewData['carModel']->getBrand() }}</p>
        <p class="card-text">{{ __('Model') }}: {{ $viewData['carModel']->getModel() }}</p>
        <p class="card-text">{{ __('Description') }}: {{ $viewData['carModel']->getDescription() }}</p>
        @if ($viewData['isAuthUser'])
        <a class="btn btn-primary" href="{{ route('review.create',['id'=> $viewData['carModel']->getId()]) }}">Make review</a>
        @endif
        @if ($viewData['isAdminUser'])
        <form action="{{ route('carModel.delete', ['id'=> $viewData['carModel']->getId()]) }}" method="post">
          <input class="btn bg-primary text-white" type="submit" value="{{ __('Delete') }}" />
          @csrf
          @method('delete')
        </form>
        @endif
      </div>
>>>>>>> a71c7be (Implement review in the corresponding car model)
    </div>
</div>
@endsection
