<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;


class CarModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Car Models - EasyCar';
        $viewData['carModels'] = CarModel::all();

        return view('carModel.index')->with('viewData', $viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Car Models - EasyCar';

        return view('carModel.create')->with('viewData', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request): RedirectResponse
    {
        CarModel::validate($request);
        CarModel::create($request->only(['brand', 'model', 'description']));

        return back()->with('status', 'successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $viewData = [];
        $carModel = CarModel::findOrFail($id);
        $viewData['title'] = 'Car Model Info - Easy Car';
        $viewData['id'] = $carModel->getId();
        $viewData['carModel'] = $carModel;

        return view('carModel.show')->with('viewData', $viewData);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id): RedirectResponse
    {
        CarModel::destroy($id);

        return redirect('car-model');
    }
}
