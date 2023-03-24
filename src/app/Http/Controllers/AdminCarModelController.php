<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\CarModel;

class AdminCarModelController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Car Models - EasyCar';
        $viewData['carModels'] = CarModel::all();

        return view('adminCarModel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $carModel = CarModel::findOrFail($id);
        $viewData['title'] = 'Car Model Info - Easy Car';
        $viewData['id'] = $carModel->getId();
        $viewData['carModel'] = $carModel;

        return view('adminCarModel.show')->with('viewData', $viewData);
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $carModel = CarModel::findOrFail($id);
        $viewData['title'] = 'Car Model Info - Easy Car';
        $viewData['id'] = $carModel->getId();
        $viewData['carModel'] = $carModel;

        return view('adminCarModel.edit')->with('viewData', $viewData);
    }

    public function update(request $request, string $id): RedirectResponse
    {
        CarModel::validate($request);

        CarModel::where('id', $id)->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'description' => $request->description,
        ]);

        return redirect(route('adminCarModel.index'));
    }

    public function create(): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = 'Car Models - EasyCar';

        return view('adminCarModel.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        CarModel::validate($request);
        CarModel::create($request->only(['brand', 'model', 'description']));

        return back()->with('status', __('Successfully created'));
    }

    public function delete(string $id): RedirectResponse
    {
        CarModel::destroy($id);

        return redirect()->route('adminCarModel.index');
    }

}
