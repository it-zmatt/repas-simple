<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_url',
        // Add other attributes you want to be mass assignable here
    ];
    
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
