@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    <h1 class="card-title">{{ $viewData['user']->getName() }} {{ $viewData['user']->getLastName() }}</h1>
    <br/>
    <p>Current balance: ${{ $viewData['user']->getBalance() }}</p>
    <br/>
    <div>
        <div>
            <h3>Car publish requests</h3>
            <ul class="list-group">
                <a href="{{ route('publishRequest.create') }}" class="list-group-item link-info"> {{ __('Create car publish request') }} </a>
            </ul>
        </div>
    <div>
</div>
@endsection
