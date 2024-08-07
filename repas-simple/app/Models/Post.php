<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'text',
        'user_id', // Include all the attributes you want to be mass assignable
    ];
    
    public function users() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function photo()
    {
        return $this->hasOne(Photo::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    
    public function comments()
{
    return $this->hasMany(Comments::class);
}
}
