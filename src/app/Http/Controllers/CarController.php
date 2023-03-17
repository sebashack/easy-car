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
        $viewData = [];
        $viewData['title'] = 'Cars - EasyCar';
        $viewData['cars'] = Car::all();
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
        $user = Auth::user();
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();
        return view('car.show')->with('viewData', $viewData);
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
