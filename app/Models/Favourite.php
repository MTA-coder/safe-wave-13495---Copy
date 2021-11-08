<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Favourite extends BaseModel
{
    use HasFactory;

    protected $fillable = ['user_id', 'hall_id', 'is_favourite'];

    protected $hidden = ['created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}