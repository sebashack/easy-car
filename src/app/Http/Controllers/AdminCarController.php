<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCarController extends Controller
{
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Car';
        $viewData['carModels'] = CarModel::all();

        return view('adminCar.create')->with('viewData', $viewData);
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
}
