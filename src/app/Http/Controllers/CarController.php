<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Cars - EasyCar';
        $viewData['cars'] = Car::all();

        return view('car.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Car';
        $viewData['carModels'] = CarModel::all();

        return view('car.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'is_available' => $request->is_available === 'on',
            'image_uri' => $imageName,
            'car_model_id' => 1,
            'transmission_type' => $request->transmission_type,
            'type' => $request->type,
            'manufacture_year' => $request->manufacture_year,
            'car_model_id' => $request->car_model_id,
        ]);

        return back()->with('status', __('Successfully created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $viewData = [];
        $car = Car::findOrFail($id);
        $viewData['title'] = 'Car';
        $viewData['car'] = $car;
        $viewData['model'] = $car->getCarModel();

        return view('car.show')->with('viewData', $viewData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): RedirectResponse
    {
        $car = Car::findOrFail($id);
        $storeInterface = app(ImageStorage::class);
        $imageName = $storeInterface->delete($car->getImageUri());

        Car::destroy($id);

        return redirect('cars');
    }

    /**
     * Add car to session Cart.
     */
    public function addToCart(string $id, Request $request): RedirectResponse
    {
        $cartData = $request->session()->get('cart_data');
        $cartData[$id] = $id;
        $request->session()->put('cart_data', $cartData);

        return back();
    }
}
