<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CarRepairController extends Controller
{
    public function index(): View
    {
        return view('map.index');
    }

}