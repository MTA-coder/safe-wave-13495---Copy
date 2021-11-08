<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Kouja\ProjectAssistant\Traits\ModelTrait;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, ModelTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'phone1',
        'phone2',
        'company',
        'type',
        'password',
        'phone_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'updated_at', 'deleted_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function login($data)
    {
        $user = null;
        if (Auth::attempt($data)) {
            $user = Auth::user();
            $user->token = $user->createToken('salaApp')->accessToken;
        }
        return $user;
    }

    public function halls()
    {
        return $this->hasMany(Hall::class);
    }

    public function request()
    {
        return $this->hasMany(Request::class);
    }

    public function service()
    {
        return $this->hasMany(Service::class);
    }

    public function favourites()
    {
        return $this->belongsToMany(Hall::class, Favourite::class);
    }
}