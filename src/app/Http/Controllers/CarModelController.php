<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\CarModel;
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
        #$viewData['carModels'] = CarModel::all();
        return view('carModel.index')->with('viewData',$viewData);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Car Models - EasyCar';
        return view('carModel.create')->with('viewData',$viewData);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'model'=>'required',
            'brand'=>'required',
            'description'=>'required'
        ]);
        CarModel::create($request->only(["brand","model","description"]));
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //
    }
}
