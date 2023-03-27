@extends('layouts.app')
@section('content')
</br>
</br>
</br>
</br>
<main role="main">
  <div style="background: url('{{ asset('/images/home-car.png') }}')" class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
      <h1 class="display-4"><strong>{{__('Welcome to easy car') }}</strong></h1>
      <p class="lead my-3">{{__('HOME_INTRO') }}</p>
      @guest
      <p class="lead"><a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Register now</a></p>
      @endguest
    </div>
  </div>
</main>
</br>
</br>
</br>
@endsection
