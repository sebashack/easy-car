@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
<div class="card mb-3">
    <div class="row g-0">
        <div class="col-md-8">
            <div class="card-body">
                <h5>{{ $viewData['review']->getCarModel()->getBrand() }}:</h5>
                @if ($viewData['review']->getRating() == 5)
                    <p><strong>{{ __('Rating') }}: </strong>&#11088 &#11088 &#11088 &#11088 &#11088</p>
                    @elseif ($viewData['review']->getRating() == 4)
                    <p><strong>{{ __('Rating') }}: </strong>&#11088 &#11088 &#11088 &#11088</p>
                    @elseif ($viewData['review']->getRating() == 3)
                    <p><strong>{{ __('Rating') }}: </strong>&#11088 &#11088 &#11088</p>
                    @elseif ($viewData['review']->getRating() == 2)
                    <p><strong>{{ __('Rating') }}: </strong>&#11088 &#11088</p>
                    @else
                    <p><strong>{{ __('Rating') }}: </strong>&#11088</p>
                @endif
                <p class="mt-3"><strong>{{ __("User") }}:</strong> {{ $viewData['review_owner']->getName() }}</p>
                <p><strong>{{ __("Review") }}:</strong> {{ $viewData['review']->getContent() }}</p>
                @if ($viewData['is_the_review_owner'] || $viewData['is_admin'])
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
