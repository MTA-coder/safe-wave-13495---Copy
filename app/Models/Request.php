<?php

namespace App\Models;

use Kouja\ProjectAssistant\Bases\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Request extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'status', 'message', 'hall_id', 'offer_id', 'date'];

    protected $casts = [
        'hall_id' => 'integer',
        'offer_id' => 'integer'
    ];

    protected $hidden = ['deleted_at'];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}