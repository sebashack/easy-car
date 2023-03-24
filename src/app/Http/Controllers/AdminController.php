<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function showUsers(): View
    {
        $viewData = [];
        $viewData['title'] = 'Users - EasyCar';
        $viewData['users'] = User::all();

        return view('admin.showUsers')->with('viewData', $viewData);
    }

    public function show(): View
    {
        $user = Auth::user();
        $viewData = [];
        $viewData['title'] = 'Admin Profile';
        $viewData['user'] = $user;

        return view('admin.show')->with('viewData', $viewData);
    }
}
