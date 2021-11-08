<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class ResHall extends BaseModel
{
    use HasFactory;

    protected $fillable = ['url', 'type', 'hall_id'];

    protected $casts = ['hall_id' => 'integer'];

    protected $hidden = ['created_at', 'updated_at'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}