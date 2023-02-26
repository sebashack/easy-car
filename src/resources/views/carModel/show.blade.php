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
        <p class="card-text">Brand: {{ $viewData['carModel']['brand'] }}</p>
        <p class="card-text">Model: {{ $viewData['carModel']['model'] }}</p>
        <p class="card-text">Description: {{ $viewData['carModel']['description'] }}</p>

        <form action="{{ route('carModel.delete', ['id'=> $viewData['carModel']['id']]) }}" method="post">
          <input class="btn bg-primary text-white" type="submit" value="Delete" />
          @csrf
          @method('delete')
        </form 
      </div>
    </div>
  </div>
</div>
@endsection