<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class ResService extends BaseModel
{
    use HasFactory;

    protected $fillable = ['url', 'type'];

    protected $hidden = ['created_at', 'updated_at'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}