<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Feature extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function featureHalls()
    {
        return $this->hasMany(FeatureHall::class);
    }
}