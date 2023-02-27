<?php

namespace App\Http\Controllers;

use App\Models\PublishRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublishRequestController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'PublishRequests - EasyCar';
        $viewData['publishRequests'] = PublishRequest::all();

        return view('publishRequest.index')->with('viewData', $viewData);
    }

    public function show(string $id): View
    {
        $viewData = [];
        $publishRequest = PublishRequest::findOrFail($id);
        $viewData['title'] = 'User PublishRequest';
        $viewData['publishRequest'] = $publishRequest;

        return view('publishRequest.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Create PublishRequest';

        return view('publishRequest.create')->with('viewData', $viewData);
    }

    public function save(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'message' => 'required|max: 250',
            'state' => 'required|in:pending,accepted,rejected',
        ]);

        PublishRequest::create($request->only(['message', 'state']));

        return back()->with('status', 'successfully created');
    }

    public function delete(string $id): \Illuminate\Http\RedirectResponse
    {
        PublishRequest::destroy($id);

        return redirect('publish-request');
    }
}
