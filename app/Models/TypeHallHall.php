<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class TypeHallHall extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
    public function typeHall()
    {
        return $this->belongsTo(TypeHall::class);
    }
}
