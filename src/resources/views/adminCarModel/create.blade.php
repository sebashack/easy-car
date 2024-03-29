@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Add Car Model") }}</div>
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
                    <form method="POST" action="{{ route('adminCarModel.save') }}">
                        @csrf
                        <input
                            type="text"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter brand') }}"
                            name="brand"
                            value="{{ old('brand') }}"
                        />
                        <input
                            type="text"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter model') }}"
                            name="model"
                            value="{{ old('model') }}"
                        />
                        <input
                            type="text"
                            class="form-control mb-2"
                            placeholder="{{ __('Enter description') }}"
                            name="description"
                            value="{{ old('description') }}"
                        />
                        <input
                            type="submit"
                            class="btn btn-success"
                            value="Send"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection