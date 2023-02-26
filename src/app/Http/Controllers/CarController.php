<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

        return view('car.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'color' => 'required',
            'kilometers' => 'required | min: 0 | lt: 320000',
            'price' => 'required | min:1 ',
        ]);
        // dd($request->all());
        Car::create([
            'color' => $request->color,
            'kilometers' => $request->kilometers,
            'price' => $request->price,
            'isNew' => $request->isNew === 'on',
            'isAvailable' => $request->isAvailable === 'on',
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
