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
        $viewData['title'] = __('Reviews');

        if ($user->isAdmin()) {
            $viewData['reviews'] = Review::orderBy('rating')->paginate(5);
        } else {
            $viewData['reviews'] = Review::getReviewsByUserId($user->getId(), 5);
        }

        return view('review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $user = Auth::user();
        $viewData = [];
        $review = Review::findOrFail($id);
        $review_owner = $review->getUser();
        $viewData['title'] = __('User review');

        $viewData['is_the_review_owner'] = Auth::id() == $review_owner->getId();
        $viewData['review_owner'] = $review_owner;
        $viewData['review'] = $review;
        $viewData['is_admin'] = boolval($user) && $user->isAdmin();

        return view('review.show')->with('viewData', $viewData);
    }

    public function create(string $id): View|RedirectResponse
    {
        $viewData = [];
        $viewData['title'] = __('Create review');
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

    public function edit(string $id): View|RedirectResponse
    {
        $user = Auth::user();
        $review = Review::findOrFail($id);
        if ($user->getId() == $review->getUser()->getId()) {
            $viewData = [];
            $viewData['title'] = __('Review');
            $viewData['id'] = $review->getId();
            $viewData['review'] = $review;

            return view('review.edit')->with('viewData', $viewData);
        } else {
            return redirect()->route('home.unauthorized');
        }
    }

    public function update(request $request, string $id): RedirectResponse
    {
        $user = Auth::user();
        Review::validate($request);
        $review = Review::findOrFail($id);
        if ($user->getId() == $review->getUser()->getId()) {
            $review->setRating($request->rating);
            $review->setContent($request->content);
            $review->update();

            return redirect(route('review.index'));
        } else {
            return redirect()->route('home.unauthorized');
        }
    }

    public function delete(string $id): RedirectResponse
    {
        Review::destroy($id);

        return redirect()->route('review.index');
    }
}
