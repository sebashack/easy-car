<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function save(Request $request): RedirectResponse
    {
        return back()->with('status', __('Successfully created'));
    }
}
