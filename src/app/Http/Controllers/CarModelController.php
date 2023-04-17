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
        $viewData['title'] = __('Car models');
        $viewData['carModels'] = CarModel::all();

        return view('carModel.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $carModel = CarModel::findOrFail($id);
        $viewData['title'] = __('Car model');
        $viewData['id'] = $carModel->getId();
        $viewData['carModel'] = $carModel;
        $viewData['current_user_id'] = Auth::id();

        return view('carModel.show')->with('viewData', $viewData);
    }
}
