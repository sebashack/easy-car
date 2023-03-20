<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

    public function create(): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = 'Car Models - EasyCar';

        return view('carModel.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        CarModel::validate($request);
        CarModel::create($request->only(['brand', 'model', 'description']));

        return back()->with('status', __('Successfully created'));
    }

    public function show(string $id): View
    {
        $viewData = [];
        $carModel = CarModel::findOrFail($id);
        $viewData['title'] = 'Car Model Info - Easy Car';
        $viewData['id'] = $carModel->getId();
        $viewData['carModel'] = $carModel;
        $user = Auth::user();
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();

        return view('carModel.show')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        CarModel::destroy($id);

        return redirect()->route('carModel.index');
    }
}
