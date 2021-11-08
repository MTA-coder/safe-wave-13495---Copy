<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kouja\ProjectAssistant\Bases\BaseModel;

class City extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function halls()
    {
        return $this->hasMany(Hall::class);
    }
}