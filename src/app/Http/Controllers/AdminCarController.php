<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Interfaces\SalesReportGenerator;
use App\Models\Car;
use App\Models\CarModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCarController extends Controller
{
    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = __('Cars - EasyCar');
        $viewData['cars'] = Car::all();
        $viewData['carModels'] = CarModel::all();

        return view('adminCar.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $car = Car::findOrFail($id);
        $viewData['title'] = 'Car';
        $viewData['car'] = $car;
        $viewData['model'] = $car->getCarModel();

        return view('adminCar.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Car';
        $viewData['carModels'] = CarModel::all();

        return view('adminCar.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Car::validate($request);
        $storeInterface = app(ImageStorage::class);
        $imageName = $storeInterface->store($request);
        Car::create([
            'color' => $request->color,
            'kilometers' => $request->kilometers,
            'price' => $request->price,
            'is_new' => $request->is_new === 'on',
            'image_uri' => $imageName,
            'transmission_type' => $request->transmission_type,
            'type' => $request->type,
            'manufacture_year' => $request->manufacture_year,
            'car_model_id' => $request->car_model_id,
        ]);

        return back()->with('status', __('Successfully created'));
    }

    public function edit(string $id): View
    {
        $viewData = [];
        $car = Car::findOrFail($id);
        $viewData['title'] = 'Car';
        $viewData['car'] = $car;
        $viewData['model'] = $car->getCarModel();
        $viewData['carModels'] = CarModel::all();

        return view('adminCar.edit')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $car = Car::findOrFail($id);
        $storeInterface = app(ImageStorage::class);
        $imageName = $storeInterface->delete($car->getImageUri());

        Car::destroy($id);

        return redirect()->route('adminCar.index');
    }

    public function update(request $request, string $id): RedirectResponse
    {
        Car::validateUpdate($request);

        $car = Car::findOrFail($id);
        if ($request->hasFile('image_uri')) {
            $storeInterface = app(ImageStorage::class);
            $imageName = $storeInterface->store($request);
            $prevUri = $car->getImageUri();
            $car->setImageUri($imageName);
            $storeInterface->delete($prevUri);
        }

        $car->setKilometers($request->kilometers);
        $car->setIsNew($request->is_new === 'on');
        $car->setPrice($request->price);
        $car->setCarModelId($request->car_model_id);
        $car->setManufactureYear($request->manufacture_year);
        $car->setColor($request->color);
        $car->setTransmissionType($request->transmission_type);
        $car->setType($request->type);
        $car->update();

        return redirect(route('adminCar.index'));
    }

    public function downloadReport(request $request)
    {
        $type = $request->get('report_type');
        $reportGenerator = app(SalesReportGenerator::class, ['report_type' => $type]);

        return $reportGenerator->download($request);
    }
}
