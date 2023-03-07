@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="text-center">
  <h1>EasyCar users:</h1>
  </br>
  @foreach ($viewData["users"] as $user)
    <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        @if ($user->isAdmin() === true)
        <a href="{{ route('user.show', ['id'=> $user->getId()]) }}" class="link-info">{{ $user->getEmail() }} (admin)</a>
        @else
        <a href="{{ route('user.show', ['id'=> $user->getId()]) }}" class="link-info">{{ $user->getEmail() }}</a>
        @endif
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
