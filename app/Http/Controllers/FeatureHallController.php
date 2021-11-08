<?php

namespace App\Http\Controllers;

use App\Http\Requests\Feature\CreateFeatureHallRequest;
use App\Http\Requests\Feature\DeleteFeatureHallRequest;
use App\Http\Requests\Feature\GetFeatureHallRequest;
use App\Http\Requests\Feature\UpdateFeatureHallRequest;
use App\Models\Feature;
use App\Models\FeatureHall;
use App\Models\Hall;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class FeatureHallController extends Controller
{
    private $feature;

    public function __construct(FeatureHall $feature)
    {
        $this->feature = $feature;
    }

    public function get(GetFeatureHallRequest $request, $hallId)
    {
        $data = $request->validated();
        $features = (new Hall())->findData(['id' => $hallId], '*', 'features');
        return ResponseHelper::select($features);
    }

    public function create(CreateFeatureHallRequest $request)
    {
        $data = $request->validated();
        if (!empty((new FeatureHall())->findData($data))) return ResponseHelper::AlreadyExists();

        $feature = $this->feature->createData($data);
        if (empty($feature)) return ResponseHelper::operationFail();
        return ResponseHelper::create($feature);
    }

    public function update(UpdateFeatureHallRequest $request, $featureHall)
    {
        $data = $request->validated();
        unset($data['feature_hall_id']);

        $updated = $this->feature->updateData(['id' => $featureHall], $data);
        if (empty($updated)) return ResponseHelper::operationFail();
        return ResponseHelper::update($updated);
    }

    public function delete(DeleteFeatureHallRequest $request)
    {
        $data = $request->validated();
        $deleted = $this->feature->forceDeleteData($data);
        if (empty($deleted)) return ResponseHelper::operationFail();
        return ResponseHelper::delete($deleted);
    }
}