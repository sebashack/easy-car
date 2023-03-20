@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
  <h1>{{__('Car publish requests')}}</h1>
  </br>
  @foreach ($viewData["publishRequests"] as $publishRequest)
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <strong>Id: {{ $publishRequest->getId() }}</strong>
        <p><strong>{{__('State') }}</strong> : {{ __($publishRequest->getState()) }}</p>
        <a href="{{ route('publishRequest.show', ['id'=> $publishRequest->getId()]) }}" class="btn bg-primary text-white">{{__('See More')}}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
