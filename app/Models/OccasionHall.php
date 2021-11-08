<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class OccasionHall extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['occasion_id', 'hall_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function occasion()
    {
        return $this->belongsTo(Occasion::class);
    }
}
