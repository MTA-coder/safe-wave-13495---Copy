<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Watch extends BaseModel
{
    use HasFactory;

    protected $fillable = ['user_id', 'hall_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }
}