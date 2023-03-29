@extends('layouts.app')
@section('content')
<div class="text-center">
    <h1>{{ __("Top 5 best models") }}</h1>
    <table class="table table-striped">
    <thead>
        <tr>
        <th>{{ __("Car Model") }}</th>
        <th>{{ __("Average rating") }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['carModelsRating'] as $carModel)
        <tr>
            <td>{{ $carModel->getBrand() . " " . $carModel->getModel() }}</td>
            <td>{{ number_format((float)$carModel->reviews_avg_rating, 1, '.', '') }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
<hr>
<div class="text-center">
<h1>{{ __("Top 5 most sold models") }}</h1>
    <table class="table table-striped">
    <thead>
        <tr>
        <th>{{ __("Car Model") }}</th>
        <th>{{ __("Total sold") }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($viewData['carModelsSold'] as $carModel)
        <tr>
            <td>{{ $carModel->getBrand() . " " . $carModel->getModel() }}</td>
            <td>{{ $carModel->total_sold }}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection
