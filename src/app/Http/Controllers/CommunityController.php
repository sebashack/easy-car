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
        $carModels = CarModel::withAvg('reviews', 'rating')
                ->orderByDesc('reviews_avg_rating')
                ->limit(5)
                ->get();
        $viewData['carModels'] = $carModels;

        return view('community.index')->with('viewData', $viewData);
    }
}
