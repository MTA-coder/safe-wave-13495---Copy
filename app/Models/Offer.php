<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Offer extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'hall_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}