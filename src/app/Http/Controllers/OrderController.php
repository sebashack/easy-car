<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function create(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Order';

        $cars = [];
        $total = 0;
        $fetchedCars = $request->session()->get('cart_car_ids');
        if ($fetchedCars) {
            foreach ($fetchedCars as $key => $car) {
                $cars[$key] = Car::findOrFail($key);
                $total = $total + $cars[$key]->getPrice();
            }
        }
        $viewData['cars'] = $cars;
        $viewData['total'] = $total;

        return view('order.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Order::validate($request);
        $items = [];
        $total = 0;
        $fetchedCars = $request->session()->get('cart_car_ids');
        if ($fetchedCars) {
            foreach ($fetchedCars as $key => $car) {
                $car = Car::findOrFail($key);
                array_push($items, ['price_to_date' => $car->getPrice(), 'car_id' => $key]);
                $total = $total + $car->getPrice();
            }
        }

        $order = Order::create([
            'shipping_address' => $request->shipping_address,
            'total' => $total,
            'user_id' => $id = Auth::id(),
        ]);

        $order->items()->createMany($items);

        $request->session()->forget('cart_car_ids');

        return back()->with('status', __('Successfully created'));
    }

    public function removeAll(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_car_ids');

        return back();
    }
}
