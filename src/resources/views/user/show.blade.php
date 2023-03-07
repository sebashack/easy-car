@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body">
        <h3 class="card-title">
           {{ $viewData['user']->getName() }} {{ $viewData['user']->getLastName() }}
        </h3>
      </div>
    </div>
  </div>
</div>
@endsection
