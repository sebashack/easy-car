<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CarModelController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Car Models - EasyCar';
        $viewData['carModels'] = CarModel::all();

        return view('carModel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $carModel = CarModel::findOrFail($id);
        $viewData['title'] = 'Car Model Info - Easy Car';
        $viewData['id'] = $carModel->getId();
        $viewData['carModel'] = $carModel;
        $viewData['current_user_id'] = Auth::id();

        return view('carModel.show')->with('viewData', $viewData);
    }
}
