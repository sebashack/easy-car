<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\PublishRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublishRequestController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'PublishRequests - EasyCar';
        $viewData['publishRequests'] = PublishRequest::all();

        return view('publishRequest.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $publishRequest = PublishRequest::findOrFail($id);
        $viewData['title'] = 'User PublishRequest';
        $viewData['publishRequest'] = $publishRequest;

        return view('publishRequest.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = __('Create car publish request');
        $viewData['carModels'] = CarModel::all();

        return view('publishRequest.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Car::validate($request);
        $storeInterface = app(ImageStorage::class);
        $imageName = $storeInterface->store($request);
        $car = Car::create([
            'color' => $request->color,
            'kilometers' => $request->kilometers,
            'price' => $request->price,
            'is_new' => false,
            'is_available' => false,
            'image_uri' => $imageName,
            'transmission_type' => $request->transmission_type,
            'type' => $request->type,
            'manufacture_year' => $request->manufacture_year,
            'car_model_id' => $request->car_model_id,
        ]);

        PublishRequest::validate($request);

        PublishRequest::create([
            'car_id' => $car->getId(),
            'message' => $request->message,
            'state' => 'Pending',
        ]);

        return back()->with('status', __('Successfully created'));
    }

    public function delete(string $id): RedirectResponse
    {
        PublishRequest::destroy($id);

        return redirect('publish-requests');
    }
}
