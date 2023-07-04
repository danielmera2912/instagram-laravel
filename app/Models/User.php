<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table='users'; 
    protected $fillable = [
        'role',
        'name',
        'surname',
        'nick',
        'email',
        'password',
        'image'
    ];

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class)->orderBy('id','desc');;
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class)->orderBy('id','desc');;
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->orderBy('id','desc');;
    }


    //poner la hora en formato legible para nosotros
    public function getCreatedAtFormattedAttribute(): string
    {
        return \Carbon\Carbon::parse($this->created_at)->format('d-m-Y H:i');
    }

    public function getUpdatedAtFormattedAttribute(): string
    {
        return \Carbon\Carbon::parse($this->updated_at)->format('d-m-Y H:i');
    }
    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

  
    
}
