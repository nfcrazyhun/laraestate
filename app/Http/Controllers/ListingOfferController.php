<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingOfferRequest;
use App\Models\Offer;
use App\Models\Listing;
use App\Notifications\OfferMade;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, ListingOfferRequest $request): \Illuminate\Http\RedirectResponse
    {
        $this->authorize('view', $listing);

        $offer = $listing->offers()->save(
            Offer::make(
                $request->validated()
            )->bidder()->associate($request->user())
        );
        $listing->owner->notify(
            new OfferMade($offer)
        );

        return redirect()->back()->with(
            'success',
            'Offer was made!'
        );
    }
}
