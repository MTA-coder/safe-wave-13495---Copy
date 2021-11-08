<?php

namespace App\Http\Controllers;

use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Http\Requests\Discount\CreateDiscountRequest;
use App\Http\Requests\Discount\DeleteDiscountRequest;
use App\Http\Requests\Discount\GetDiscountRequest;
use App\Http\Requests\Discount\UpdateDiscountRequest;
use App\Models\Discount;

class DiscountController extends Controller
{
    private $discount;

    public function __construct(Discount $discount)
    {
        $this->discount = $discount;
    }

    public function get(GetDiscountRequest $request)
    {
        $data =  $request->validated();
        $discounts =  $this->discount->getData($data);
        return ResponseHelper::select($discounts);
    }

    public function create(CreateDiscountRequest $request)
    {
        $data = $request->validated();
        $discount = $this->discount->createData($data);
        if (empty($discount))
            return ResponseHelper::operationFail();
        return ResponseHelper::create($discount);
    }

    public function update(UpdateDiscountRequest $request, $discountId)
    {
        $data = $request->validated();
        unset($data['discount_id']);
        $updated = $this->discount->updateData(['id' => $discountId], $data);
        if (empty($updated))
            return ResponseHelper::operationFail();
        return ResponseHelper::update($updated);
    }

    public function delete(DeleteDiscountRequest $request, $discountId)
    {
        $request->validated();
        $deleted =  $this->discount->softDeleteData(['id' => $discountId]);
        return ResponseHelper::delete();
    }
}