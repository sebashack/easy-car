<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Interfaces\ImageStorage;

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

        return view('car.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request): RedirectResponse
    {
        Car::validate($request);
        // dd($request->all());
        $storeInterface = app(ImageStorage::class);
        $imageName = $storeInterface->store($request);
        Car::create([
            'color' => $request->color,
            'kilometers' => $request->kilometers,
            'price' => $request->price,
            'is_new' => $request->is_new === 'on',
            'is_available' => $request->is_available === 'on',
            'image_uri' => $imageName,
            'transmission_type' => $request->transmission_type,
            'type' => $request->type,
            'manufacture_date' => $request->manufacture_date,
        ]);

        return back()->with('status', 'Successfully created');
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

        return view('car.show')->with('viewData', $viewData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): RedirectResponse
    {
        Car::destroy($id);

        return redirect('cars');
    }
}
