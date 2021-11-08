<?php

namespace App\Http\Controllers;

use App\Http\Requests\Hall\UpdateHallRequest;
use App\Http\Requests\Price\CreatePriceRequest;
use App\Http\Requests\Price\DeletePriceRequest;
use App\Http\Requests\Price\UpdatePriceRequest;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class PriceController extends Controller
{
    private $price;

    public function __construct(Price $price)
    {
        $this->price = $price;
    }

    public function create(CreatePriceRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $created = $this->price->createData($data);
        if (empty($created)) return ResponseHelper::operationFail();
        return ResponseHelper::create($created);
    }

    public function update(UpdatePriceRequest $request, $priceId)
    {
        $data = $request->validated();
        unset($data['price_id']);
        $updated = $this->price->updateData(['id' => $priceId], $data);
        if (empty($updated)) return ResponseHelper::operationFail();
        return ResponseHelper::update($updated);
    }

    public function delete(DeletePriceRequest $request, $priceId)
    {
        $request->validated();
        $deleted = $this->price->forceDeleteData(['id' => $priceId]);
        if (empty($deleted)) return ResponseHelper::operationFail();
        return ResponseHelper::delete($deleted);
    }
}