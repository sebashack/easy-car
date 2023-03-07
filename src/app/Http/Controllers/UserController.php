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

    public function show(string $id): View|RedirectResponse
    {
        $auth_id = Auth::id();
        $user = User::findOrFail($id);

        if ($auth_id != $user->getId()) {
            return redirect('/');
        } else {
            $viewData = [];
            $viewData['title'] = 'User Profile';
            $viewData['user'] = $user;

            return view('user.show')->with('viewData', $viewData);
        }
    }
}
