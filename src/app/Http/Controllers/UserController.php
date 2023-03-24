<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(): View|RedirectResponse
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return redirect()->route('admin.show');
        }

        $viewData = [];
        $viewData['title'] = 'User Profile';
        $viewData['user'] = $user;

        return view('user.show')->with('viewData', $viewData);
    }
}
