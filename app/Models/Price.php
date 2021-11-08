<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Price extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'hall_id'];

    protected $hidden = ['created_at', 'updated_at'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}