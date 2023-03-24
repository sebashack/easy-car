<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

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

        $carModel = CarModel::findOrFail($id);

        $carModel->setBrand($request->brand);
        $carModel->setModel($request->model);
        $carModel->setDescription($request->description);
        $carModel->update();

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
