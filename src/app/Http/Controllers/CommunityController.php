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
        $carModelsSold = CarModel::getMostSoldCarModels();
        $viewData['carModelsRating'] = $carModelsRating;
        $viewData['carModelsSold'] = $carModelsSold;

        return view('community.index')->with('viewData', $viewData);
    }
}
