<?php

namespace App\Models;

use App\Enums\RequestEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Hall extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'Latitude',
        'Longitude',
        'area',
        'capacity',
        'priority',
        'user_id',
        'city_id',
        'rate',
        'address',
        'price'
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'city_id' => 'integer',
        'user_id' => 'integer',
    ];

    public function is_favourtie()
    {
        return $this->hasMany(Favourite::class)->where('user_id', Auth::id() ?? 0);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class);
    }

    public function files()
    {
        return $this->hasMany(ResHall::class);
    }
    public function occasionHalls()
    {
        return $this->hasMany(OccasionHall::class);
    }

    public function occasions()
    {
        return $this->belongsToMany(Occasion::class, OccasionHall::class);
    }

    public function types()
    {
        return $this->belongsToMany(TypeHall::class, 'type_halls_halls');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'feature_halls');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class);
    }

    public function watches()
    {
        return $this->hasMany(Watch::class);
    }

    public function prices()
    {
        return $this->hasMany(Price::class);
    }

    public function reserveHall()
    {
        return $this->hasMany(Request::class)->where('status', RequestEnum::completed);
    }

    public function resreveOffer()
    {
        return $this->hasManyThrough(Request::class, Offer::class)->where('status', RequestEnum::completed);
    }

    public function getAllHallsFilter($orderby)
    {
        $data =  $this->withCount(['watches', 'reserveHall', 'resreveOffer'])->withAvg('rates', 'rate')->with('user')->get();
        collect($data)->each(function ($hall) {
            $hall['resereves_count'] = $hall['reserve_hall_count'] + $hall['resreve_offer_count'];
            unset($hall['reserve_hall_count']);
            unset($hall['resreve_offer_count']);
        })->sortBy($orderby);
        return $data;
    }

    public function getDetailsById($hallId)
    {
        $data = $this->where('id', $hallId)->with(
            [
                'files', 'is_favourtie', 'user',
                'occasions', 'types', 'features', 'discounts', 'prices'
            ]
        )->withAvg('rates', 'rate')->get();
        collect($data)->each(function ($hall) {
            $hall['num_halls'] = count($hall['user']['halls']);
            unset($hall['user']['halls']);
        });
        return $data;
    }
}