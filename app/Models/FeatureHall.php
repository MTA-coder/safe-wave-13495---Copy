<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class FeatureHall extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['hall_id', 'feature_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}