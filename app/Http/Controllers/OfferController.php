<?php

namespace App\Http\Controllers;

use App\Http\Requests\Offer\CreateOfferRequest;
use App\Http\Requests\Offer\DeleteOfferRequest;
use App\Http\Requests\Offer\GetOfferRequest;
use App\Http\Requests\Offer\UpdateOfferRequest;
use App\Models\Hall;
use App\Models\Offer;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class OfferController extends Controller
{
    private $offer;

    public function __construct(Offer $offer)
    {
        $this->offer = $offer;
    }

    public function get(GetOfferRequest $request, $hallId)
    {
        $request->validated();
        $offers = (new Hall())->findData(['id' => $hallId], '*', ['offers']);
        return ResponseHelper::select($offers);
    }

    public function create(CreateOfferRequest $request)
    {
        $data = $request->validated();
        $offer = $this->offer->createData($data);
        if (empty($offer)) return ResponseHelper::operationFail();
        return ResponseHelper::create($offer);
    }

    public function update(UpdateOfferRequest $request, $offerId)
    {
        $data = $request->validated();
        unset($data['offer_id']);
        $offer = $this->offer->updateData(['id' => $offerId], $data);
        if (empty($offer)) return ResponseHelper::operationFail();
        return ResponseHelper::update($offer);
    }

    public function delete(DeleteOfferRequest $request, $offerId)
    {
        $request->validated();
        $deleted = $this->offer->softDeleteData(['id' => $offerId]);
        if (empty($deleted)) return ResponseHelper::operationFail();
        return ResponseHelper::delete();
    }
}