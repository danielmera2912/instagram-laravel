<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;
    protected $table='comments'; 
    protected $fillable = [
        "user_id", "image_id", "content"
    ];
    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function image(): BelongsTo 
    {
        return $this->belongsTo(Image::class);
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
