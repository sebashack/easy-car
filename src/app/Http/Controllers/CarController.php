<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CarController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();
        $viewData = [];
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();
        $viewData['title'] = 'Cars - EasyCar';

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

        $priceRange = null;
        $rangeOption = $request->query('price_range');
        $tenMillion = 10000000;
        if ($rangeOption === 'range1') {
        } elseif ($rangeOption === 'range2') {
            $priceRange = [$tenMillion, 4 * $tenMillion];
        } elseif ($rangeOption === 'range3') {
            $priceRange = [4 * $tenMillion, 8 * $tenMillion];
        } elseif ($rangeOption === 'range4') {
            $priceRange = [8 * $tenMillion, 12 * $tenMillion];
        } elseif ($rangeOption === 'range5') {
            $priceRange = [12 * $tenMillion, 15 * $tenMillion];
        } elseif ($rangeOption === 'range6') {
            $priceRange = [20 * $tenMillion, 100 * $tenMillion];
        }

        $viewData['cars'] = Car::getCarsBySearchParams($state, $brand, $transmission, $priceRange);
        $viewData['carModels'] = CarModel::all();

        $carIds = $request->session()->get('cart_car_ids');
        if ($carIds) {
            $viewData['cart_length'] = count($carIds);
        } else {
            $viewData['cart_length'] = 0;
        }

        return view('car.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Car';
        $viewData['carModels'] = CarModel::all();

        return view('car.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Car::validate($request);
        $storeInterface = app(ImageStorage::class);
        $imageName = $storeInterface->store($request);
        Car::create([
            'color' => $request->color,
            'kilometers' => $request->kilometers,
            'price' => $request->price,
            'is_new' => $request->is_new === 'on',
            'image_uri' => $imageName,
            'car_model_id' => 1,
            'transmission_type' => $request->transmission_type,
            'type' => $request->type,
            'manufacture_year' => $request->manufacture_year,
            'car_model_id' => $request->car_model_id,
        ]);

        return back()->with('status', __('Successfully created'));
    }

    public function show(string $id): View
    {
        $user = Auth::user();
        $viewData = [];
        $car = Car::findOrFail($id);
        $viewData['title'] = 'Car';
        $viewData['car'] = $car;
        $viewData['model'] = $car->getCarModel();
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();

        return view('car.show')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $car = Car::findOrFail($id);
        $viewData['title'] = 'Car';
        $viewData['car'] = $car;
        $viewData['model'] = $car->getCarModel();
        $viewData['carModels'] = CarModel::all();
        $user = Auth::user();
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();

        return view('car.edit')->with('viewData', $viewData);
    }

    public function update(request $request, string $id): RedirectResponse
    {
        Car::validateUpdate($request);
        if ($request->hasFile('image_uri')) {
            $car = Car::findOrFail($id);
            $storeInterface = app(ImageStorage::class);
            $imageName = $storeInterface->store($request);
            Car::where('id', $id)->update([
                'image_uri' => $imageName,
            ]);
            $imageName = $storeInterface->delete($car->getImageUri());
        }

        Car::where('id', $id)->update([
            'color' => $request->color,
            'kilometers' => $request->kilometers,
            'price' => $request->price,
            'is_new' => $request->is_new === 'on',
            'car_model_id' => 1,
            'transmission_type' => $request->transmission_type,
            'type' => $request->type,
            'manufacture_year' => $request->manufacture_year,
            'car_model_id' => $request->car_model_id,
        ]);

        return redirect(route('car.index'));
    }

    public function delete(string $id): RedirectResponse
    {
        $car = Car::findOrFail($id);
        $storeInterface = app(ImageStorage::class);
        $imageName = $storeInterface->delete($car->getImageUri());

        Car::destroy($id);

        return redirect('cars');
    }

    public function addToCart(string $id, Request $request): RedirectResponse
    {
        $carIds = $request->session()->get('cart_car_ids');
        $carIds[$id] = $id;
        $request->session()->put('cart_car_ids', $carIds);

        return back();
    }
}
