<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Users - EasyCar';
        $viewData['users'] = User::all();

        return view('user.index')->with('viewData', $viewData);
    }

    public function show(): View|RedirectResponse
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('user.showAdmin');
        }

        $viewData = [];
        $viewData['title'] = 'User Profile';
        $viewData['user'] = $user;

        return view('user.show')->with('viewData', $viewData);
    }

    public function showAdmin(): View
    {
        $user = Auth::user();
        $viewData = [];
        $viewData['title'] = 'Admin Profile';
        $viewData['user'] = $user;

        return view('user.showAdmin')->with('viewData', $viewData);
    }
}
