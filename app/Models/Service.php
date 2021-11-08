<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Service extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['company', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function typeService()
    {
        return $this->belongsTo(TypeService::class);
    }
    public function resService()
    {
        return $this->hasMany(ResService::class);
    }
}