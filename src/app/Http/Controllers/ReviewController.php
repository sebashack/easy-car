<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Reviews - EasyCar';
        $viewData['reviews'] = Review::all();

        return view('review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $review = Review::findOrFail($id);
        $viewData['title'] = 'User Review';
        $viewData['review'] = $review;

        return view('review.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create Review';

        return view('review.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);
        Review::create($request->only(['content', 'rating']));

        return back()->with('status', 'successfully created');
    }

    public function delete(string $id): RedirectResponse
    {
        Review::destroy($id);

        return redirect('reviews');
    }
}
