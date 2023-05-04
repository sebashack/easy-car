<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarModel;
use App\Services\PriceRange;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('Cars - EasyCar');

        $state = null;
        $stateOption = $request->query('car_state');
        if ($stateOption != 'NA') {
            $state = $stateOption;
        }

        $brand = null;
        $brandOption = $request->query('car_brand');
        if ($brandOption != 'NA') {
            $brand = $brandOption;
        }

        $transmission = null;
        $transmissionOption = $request->query('transmission_type');
        if ($transmissionOption != 'NA') {
            $transmission = $transmissionOption;
        }

        $price = new PriceRange();
        $rangeOption = $request->query('price_range');
        $priceRange = $price->calculatePriceRange($rangeOption);

        $viewData['cars'] = Car::getCarsBySearchParams($state, $brand, $transmission, $priceRange);
        $viewData['carModels'] = CarModel::all()->unique('brand');

        $carIds = $request->session()->get('cart_car_ids');
        if ($carIds) {
            $viewData['cart_length'] = count($carIds);
        } else {
            $viewData['cart_length'] = 0;
        }

        return view('car.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $car = Car::findOrFail($id);
        $viewData['title'] = 'Car';
        $viewData['car'] = $car;
        $viewData['model'] = $car->getCarModel();

        return view('car.show')->with('viewData', $viewData);
    }

    public function addToCart(string $id, Request $request): RedirectResponse
    {
        $carIds = $request->session()->get('cart_car_ids');
        $carIds[$id] = $id;
        $request->session()->put('cart_car_ids', $carIds);

        return back();
    }
}
