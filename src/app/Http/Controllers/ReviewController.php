<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $user = Auth::user();
        $viewData['title'] = 'Reviews - EasyCar';
        $viewData['reviews'] = Review::all();
        $viewData['current_user_id'] = Auth::id();
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();

        return view('review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $user = Auth::user();
        $viewData = [];
        $review = Review::findOrFail($id);
        $review_owner = $review->getUser();
        $viewData['title'] = 'User Review';
        $viewData['is_the_review_owner'] = Auth::id() == $review_owner->getId();
        $viewData['review_owner'] = $review_owner;
        $viewData['review'] = $review;
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();

        return view('review.show')->with('viewData', $viewData);
    }

    public function create(string $id): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Review';
        $viewData['model_id'] = $id;

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request, string $id): RedirectResponse
    {
        Review::validate($request);
        $user_id = Auth::id();
        Review::create([
            'content' => $request->content,
            'rating' => $request->rating,
            'car_model_id' => $id,
            'user_id' => $user_id,
        ]);

        return back()->with('status', __('Successfully created'));
    }

    public function delete(string $id): RedirectResponse
    {
        Review::destroy($id);

        return redirect()->route('review.index');
    }
}
