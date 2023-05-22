<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AlliedProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = __('Cars - EasyCar');

        $response = Http::get('http://35.209.141.153/public/api/shoes');
        $shoes = $response->json();

        $viewData['shoes'] = $shoes;
        return view('shoes.index')->with('viewData', $viewData);
    }
}
