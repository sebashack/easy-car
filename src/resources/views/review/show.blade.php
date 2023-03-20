@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                @if ($viewData['review']->getRating() == 5)
                    <h5>Rating:</h5>
                    <h5 class="car-title star d-line">★★★★★</h5>
                    @elseif ($viewData['review']->getRating() == 4)
                    <h5>Rating:</h5>
                    <h5 class="car-title star">★★★★</h5>
                    @elseif ($viewData['review']->getRating() == 3)
                    <h5>Rating:</h5>
                    <h5 class="car-title star">★★★</h5>
                    @elseif ($viewData['review']->getRating() == 2)
                    <h5>Rating:</h5>
                    <h5 class="car-title star">★★</h5>
                    @else
                    <h5>Rating:</h5>
                    <h5 class="car-title star">★</h5>
                @endif
                <p class="mt-3"><strong>User:</strong> {{ $viewData['review_owner']->getName() }}</p>
                <p><strong>Review:</strong> {{ $viewData['review']->getContent() }}</p>
                @if ($viewData['current_user_id'] == $viewData['review_owner']->getId())
                    <form
                        action="{{ route('review.delete', ['id'=> $viewData['review']->getId()]) }}"
                        method="post"
                    >
                        <input class="btn bg-danger text-white" type="submit"
                        value={{ __("Delete") }} />
                    @csrf @method('delete')
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
