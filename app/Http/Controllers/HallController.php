<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Hall;
use App\Models\Feature;
use App\Models\Occasion;
use App\Models\Offer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Hall\CreateHallRequest;
use App\Http\Requests\Hall\UpdateHallRequest;
use App\Http\Requests\Hall\DeleteHallRequest;
use App\Http\Requests\Hall\GetDetailsHallRequest;
use App\Http\Requests\Hall\GetHallFilterRequest;
use App\Http\Requests\Hall\GetHallRequest;
use App\Http\Requests\Hall\GetMostRateRequest;
use App\Models\Request;
use App\Models\Watch;
use Kouja\ProjectAssistant\Helpers\ResponseHelper;

class HallController extends Controller
{
    private $hall;

    public function __construct(Hall $hall)
    {
        $this->hall = $hall;
    }

    public function getOccasion()
    {
        $data = (new Occasion())->getData();
        return ResponseHelper::select($data);
    }

    public function getCities()
    {
        $data = (new City())->getData();
        return ResponseHelper::select($data);
    }

    public function getFeatures()
    {
        $data = (new Feature())->getData();
        return ResponseHelper::select($data);
    }

    public function get(GetHallFilterRequest $request)
    {
        $data = $request->validated();
        $halls = $this->hall->getData(
            function ($query) use ($data) {
                return $query
                    ->when(isset($data['city_id']), function ($query) use ($data) {
                        return $query->where('city_id', $data['city_id']);
                    })
                    ->when($data['occasion_id'], function ($query) use ($data) {
                        return $query->whereHas('occasionHalls', function ($query) use ($data) {
                            return $query->where('occasion_id', $data['occasion_id']);
                        });
                    });
            },
            ['discounts', 'offers', 'files', 'occasions', 'features']
        );
        return ResponseHelper::select($halls);
    }


    public function getMost(GetHallRequest $request)
    {
        $data = $request->validated();
        return ResponseHelper::select($this->hall->getAllHallsFilter($data['most']));
    }

    public function getDetails(GetDetailsHallRequest $request)
    {
        $data = $request->validated();

        if (Auth::check()) {
            $data['user_id'] = Auth::id();
            if (empty((new Watch())->findData($data))) {
                (new Watch())->createData($data);
            }
        }

        return ResponseHelper::select($this->hall->getDetailsById($data['hall_id']));
    }

    public function create(CreateHallRequest $request)
    {
        $data = $request->validated();
        $hall = $this->hall->createData($data);
        return ResponseHelper::create($hall);
    }

    public function update(UpdateHallRequest $request, $hallId)
    {
        $data = $request->validated();
        unset($data['hall_id']);
        $updated = $this->hall->updateData(['id' => $hallId], $data);
        return ResponseHelper::update($updated);
    }

    public function delete(DeleteHallRequest $request, $hallId)
    {
        $request->validated();
        $this->hall->softDeleteData(['id' => $hallId]);
        return  ResponseHelper::delete();
    }
}