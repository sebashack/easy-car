@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div>
    <p><strong>{{ __('Message') }}:</strong> {{ $viewData['publishRequest']->getMessage() }}</p>
    <p><strong>{{ __('State') }}:</strong> {{ $viewData['publishRequest']->getState() }}</p>
    <form action="{{ route('publishRequest.delete', ['id'=> $viewData['publishRequest']->getId()]) }}" method="post">
        <input class="btn bg-primary text-white" type="submit" value="{{__('Delete')}}" />
        @csrf
        @method('delete')
    </form  >
</div>
@endsection
