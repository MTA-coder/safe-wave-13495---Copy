<?php

namespace App\Http\Controllers\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\CreateHallOrderRequest;
use App\Http\Requests\Request\GetHallOrderRequest;
use App\Http\Requests\Request\UpdateHallOrderRequest;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class HallOrderController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get(GetHallOrderRequest $request)
    {
        $data = $request->validated();
        $requests = $this->request->getData(function ($query) use ($data) {
            return $query
                ->when(isset($data['date']), function ($query) use ($data) {
                    return $query->whereBetween('created_at', [$data['date'], $data['date']]);
                })
                ->where('hall_id', $data['hall_id']);
        }, ['user', 'hall']);
        return ResponseHelper::select($requests);
    }

    public function create(CreateHallOrderRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        $order = $this->request->createData($data);
        if (empty($order))
            return ResponseHelper::operationFail();
        return ResponseHelper::create($order);
    }

    public function update(UpdateHallOrderRequest $request, $requestId)
    {
        $data = $request->validated();
        unset($data['request_id']);
        $updated = $this->request->updateData(['id' => $requestId], $data);
        return ResponseHelper::update($updated);
    }
}