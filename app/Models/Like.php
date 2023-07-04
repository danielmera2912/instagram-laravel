<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Like extends Model
{
    use HasFactory;

    protected $table='likes';

    protected $fillable = [
        "user_id", "image_id"
    ];
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
    public function images(): HasMany 
    {
        return $this->hasMany(Image::class)->orderBy('id','desc');;
    }

    public function getCreatedAtFormattedAttribute(): string
     {
         return \Carbon\Carbon::parse($this->created_at)->format('d-m-Y H:i');
     }
 
     public function getUpdatedAtFormattedAttribute(): string
     {
         return \Carbon\Carbon::parse($this->updated_at)->format('d-m-Y H:i');
     }
}
