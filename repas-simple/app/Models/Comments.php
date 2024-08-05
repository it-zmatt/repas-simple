<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'post_id',
        'userid',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    // A comment belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }

}
