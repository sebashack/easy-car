<?php

namespace App\Http\Controllers;

use App\Models\CarModel;
use Illuminate\View\View;

class CommunityController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'PublishRequests - EasyCar';
        $carModelsRating = CarModel::getBestRatingCarModels();
        $carModelsSelled = CarModel::getMostSelledCarModels();
        $viewData['carModelsRating'] = $carModelsRating;
        $viewData['carModelsSelled'] = $carModelsSelled;

        return view('community.index')->with('viewData', $viewData);
    }
}
