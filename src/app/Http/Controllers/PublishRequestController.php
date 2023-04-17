<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Car;
use App\Models\CarModel;
use App\Models\PublishRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PublishRequestController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('Publish requests');
        $viewData['publishRequests'] = PublishRequest::all();

        return view('publishRequest.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $publishRequest = PublishRequest::findOrFail($id);
        $viewData['title'] = 'User PublishRequest';

        $viewData['publishRequest'] = $publishRequest;

        $car = $publishRequest->getCar();
        $viewData['car'] = $car;
        $viewData['carModel'] = $car->getCarModel();

        $publisher = $publishRequest->getUser();
        $viewData['publisher_name'] = $publisher->getName().' '.$publisher->getLastName();

        return view('publishRequest.show')->with('viewData', $viewData);
    }

    public function create(): View|RedirectResponse
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
            'state' => 'pending',
            'user_id' => Auth::id(),
        ]);

        return back()->with('status', __('Successfully created'));
    }

    public function accept(string $id): RedirectResponse
    {
        $publishRequest = PublishRequest::findOrFail($id);

        if ($publishRequest->getState() === 'pending') {
            $publishRequest->setState('accepted');
            $publishRequest->update();

            return back()->with('status_updated', __('Successfully accepted'));
        } else {
            return back()->with('status_not_updated', __('State cannot be changed'));
        }
    }

    public function reject(string $id): RedirectResponse
    {
        $publishRequest = PublishRequest::findOrFail($id);

        if ($publishRequest->getState() === 'pending') {
            $publishRequest->setState('rejected');
            $publishRequest->update();

            return back()->with('status_updated', __('Successfully rejected'));
        } else {
            return back()->with('status_not_updated', __('State cannot be changed'));
        }
    }
}
