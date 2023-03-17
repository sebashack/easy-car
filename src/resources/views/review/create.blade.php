@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Create Review") }}</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors" class="alert alert-danger list-unstyled">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif @if (session('status'))
                    <div class="alert alert-success">
                        {{ session("status") }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('review.save', ['id'=>$viewData['model_id']]) }}">
                        @csrf
                        <input
                            type="text"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter review') }}"
                            name="content"
                            value="{{ old('content') }}"
                        />
                        <input
                            type="text"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter rating') }}"
                            name="rating"
                            value="{{ old('rating') }}"
                        />
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="{{ __('Send') }}"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
