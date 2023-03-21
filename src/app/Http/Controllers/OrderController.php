<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function index(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Orders - EasyCar';

        $user = Auth::user();

        if ($user->isAdmin()) {
            $viewData['orders'] = Order::all()->sortBy('created_at');
        } else {
            $viewData['orders'] = $user->getOrders();
        }

        return view('order.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = 'Orders - EasyCar';
        $user = Auth::user();
        $order = Order::findOrFail($id);
        $customer = $order->getUser();

        if ($user->isAdmin() || $user->getId() === $customer->getId()) {
            $viewData['order'] = $order;
            $viewData['items'] = $order->getItems();

            return view('order.show')->with('viewData', $viewData);
        } else {
            return redirect()->route('home.unauthorized');
        }
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

        $user = Auth::user();
        $userBalance = $user->getBalance();
        if ($userBalance < $total) {
            throw ValidationException::withMessages([__('Insufficient funds')]);
        }

        $currentBalance = $userBalance - $total;
        $user->setBalance($currentBalance);
        $user->update();

        if ($fetchedCars) {
            foreach ($fetchedCars as $key => $carId) {
                $car = Car::findOrFail($carId);
                $car->setIsAvailable(false);
                $car->update();
            }
        }

        $order = Order::create([
            'shipping_address' => $request->shipping_address,
            'total' => $total,
            'user_id' => $user->getId(),
        ]);

        $order->items()->createMany($items);

        $request->session()->forget('cart_car_ids');

        return back()->with('status', __('Successfully created'));
    }

    public function remove(Request $request): RedirectResponse
    {
        $request->session()->forget('cart_car_ids');

        return back();
    }

    public function pdf(string $id)
    {
        $order = Order::findOrFail($id);
        $pdf = Pdf::loadView('order.pdf',compact('order'));
        return $pdf->download('order.pdf');
    }
}
