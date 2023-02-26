<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\PublishRequest;
 
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
            'message' => 'required',
            'state' => 'required',
        ]);

        PublishRequest::create($request->only(['message', 'state']));

        return back()->with('status', 'successfully created');
    }

    public function delete(string $id): \Illuminate\Http\RedirectResponse
    {
        PublishRequest::destroy($id);

        return redirect('publishRequest');
    }
}