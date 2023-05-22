<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class AlliedProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = __('Cars - EasyCar');

        $url = $_ENV['EXTERNAL_API_URL'].'/public/api/shoes';
        $response = Http::get($url);
        $shoes = $response->json();

        $viewData['shoes'] = $shoes;

        return view('shoes.index')->with('viewData', $viewData);
    }
}
