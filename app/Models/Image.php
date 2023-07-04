<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Image extends Model
{
    use HasFactory;
    protected $table='images'; 
    protected $fillable = [
        "user_id", "image_path", "description"
    ];
    
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(): HasMany 
    {
        return $this->hasMany(Like::class)->orderBy('id','desc');
    }
    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class)->orderBy('id','desc');
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
     
}
