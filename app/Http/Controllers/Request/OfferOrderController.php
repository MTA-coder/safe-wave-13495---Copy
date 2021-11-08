<?php

namespace App\Http\Controllers\Request;

use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;
use App\Http\Requests\Request\CreateOfferOrderRequest;
use App\Http\Requests\Request\GetOfferOrderRequest;
use App\Http\Requests\Request\UpdateOfferOrderRequest;

class OfferOrderController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(GetOfferOrderRequest $request)
    {
        $data = $request->validated();
        $requests = $this->request->getData(function ($query) use ($data) {
            return $query
                ->when(isset($data['date']), function ($query) use ($data) {
                    return $query->whereBetween('created_at', [$data['date'], $data['date']]);
                })
                ->where('offer_id', $data['offer_id']);
        }, ['user', 'offer']);
        return ResponseHelper::select($requests);
    }

    public function create(CreateOfferOrderRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $order = $this->request->createData($data);
        if (empty($order))
            return ResponseHelper::operationFail();
        return ResponseHelper::create($order);
    }

    public function update(UpdateOfferOrderRequest $request, $requestId)
    {
        $data = $request->validated();
        unset($data['request_id']);
        $updated = $this->request->updateData(['id' => $requestId], $data);
        return ResponseHelper::update($updated);
    }
}