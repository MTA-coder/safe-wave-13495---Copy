<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Discount extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'value', 'from', 'to', 'hall_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}