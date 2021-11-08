<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class Occasion extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'image'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function occasionHalls()
    {
        return $this->hasMany(OccasionHall::class);
    }
}