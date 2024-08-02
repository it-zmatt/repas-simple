<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id'];

    public function photo()
    {
        return $this->belongsTo(Photo::class); // Adjust if the relationship is different
    }

}
