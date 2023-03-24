@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __("Edit review") }}</div>
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
                    <form method="POST" action="{{ route('review.update',['id'=> $viewData['review']->getId()]) }}">
                        @csrf
                        @method('patch')
                        <input
                            type="text"
                            class="form-control mb-2"
                            value="{{ $viewData['review']->getContent() }}"
                            name="content"
                        />
                        <div class="form-group">
                            <label for="Rating"><strong>{{ __("Rating") }}:</strong></label>
                            <select class="form-control" name="rating">
                                <option value="1">&#11088</option>
                                <option value="2">&#11088 &#11088</option>
                                <option value="3">&#11088 &#11088 &#11088</option>
                                <option value="4">&#11088 &#11088 &#11088 &#11088</option>
                                <option value="5">&#11088 &#11088 &#11088 &#11088 &#11088</option>
                            </select>
                        </div>
                        </br>
                        <input
                            type="submit"
                            class="btn btn-primary"
                            value="Update"
                        />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
