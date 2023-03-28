@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Edit CarModel") }}</div>
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
                    <form method="POST" action="{{ route('adminCarModel.update',['id'=> $viewData['carModel']->getId()]) }}">
                        @csrf
                        @method('PATCH')
                        <input
                            type="text"
                            class="form-control mb-2"
                            value="{{ $viewData['carModel']->getBrand() }}"
                            name="brand"
                        />
                        <input
                            type="text"
                            class="form-control mb-2"
                            value="{{ $viewData['carModel']->getModel() }}"
                            name="model"
                        />
                        <input
                            type="text"
                            class="form-control mb-2"
                            value="{{ $viewData['carModel']->getDescription() }}"
                            name="description"
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
