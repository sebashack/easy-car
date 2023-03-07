@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
           Car Model: {{$viewData['id']}}
        </h5>
        <p class="card-text">Brand: {{ $viewData['carModel']->getBrand() }}</p>
        <p class="card-text">Model: {{ $viewData['carModel']->getModel() }}</p>
        <p class="card-text">Description: {{ $viewData['carModel']->getDescription() }}</p>

        @if ($viewData['isAdminUser'])
        <form action="{{ route('carModel.delete', ['id'=> $viewData['carModel']->getId()]) }}" method="post">
          <input class="btn bg-primary text-white" type="submit" value="Delete" />
          @csrf
          @method('delete')
        </form>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
