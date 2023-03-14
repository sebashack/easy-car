<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrderController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Order';

        $cars = [];
        $total = 0;
        $carsFetch = $request->session()->get('cart_data'); //we get the products stored in session
        if ($carsFetch) {
            foreach ($carsFetch as $key => $car) {
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
        return back()->with('status', __('Successfully created'));
    }

     /**
      * Remove session Cart info.
      */
     public function removeAll(Request $request): RedirectResponse
     {
         $request->session()->forget('cart_data');

         return back();
     }
}
