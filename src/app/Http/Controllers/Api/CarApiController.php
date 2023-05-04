<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Http\JsonResponse;

class CarApiController extends Controller
{
    public function getAvailableCars(): JsonResponse
    {
        $cars = CarResource::collection(Car::getAvailableCars());

        return response()->json($cars, 200)->setEncodingOptions(JSON_UNESCAPED_SLASHES);
    }
}
