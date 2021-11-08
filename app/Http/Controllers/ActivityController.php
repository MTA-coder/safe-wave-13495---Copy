<?php

namespace App\Http\Controllers;

use App\Http\Requests\Activity\CreateFavourtieRequest;
use App\Http\Requests\Activity\RateHallRequest;
use App\Http\Requests\Activity\WatchHallRequest;
use App\Models\Favourite;
use App\Models\Rate;
use App\Models\User;
use App\Models\Watch;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class ActivityController extends Controller
{
    private $favourite, $watch, $rate, $user;

    public function __construct(Favourite $favourite, Watch $watch, Rate $rate, User $user)
    {
        $this->favourite = $favourite;
        $this->watch = $watch;
        $this->rate = $rate;
        $this->user = $user;
    }

    public function favourite(CreateFavourtieRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $favourite = $this->favourite->findData($data);
        $data['is_favourite'] = empty($favourite) ? true : !$favourite->is_favourite;

        $created = $this->favourite->updateOrCreateData(['user_id' => $data['user_id'], 'hall_id' => $data['hall_id']], $data);
        if (empty($created)) return ResponseHelper::operationFail();
        return ResponseHelper::create($created);
    }

    public function watch(WatchHallRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        if (!empty($this->watch->findData($data))) return ResponseHelper::AlreadyExists();

        $created = $this->watch->createData($data);
        if (empty($created)) return ResponseHelper::operationFail();
        return ResponseHelper::create($created);
    }

    public function rate(RateHallRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $rate = $this->rate->updateOrCreateData(['user_id' => Auth::id(), 'hall_id' => $data['hall_id']], $data);
        if (empty($rate)) return ResponseHelper::operationFail();
        return ResponseHelper::create($rate);
    }
}