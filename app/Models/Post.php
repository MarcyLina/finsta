<?php

namespace App\Models;

use App\Contracts\Likeable;
use App\Models\Concerns\HasLikes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Likeable
{
    use HasFactory;
    use HasLikes;

    protected $fillable = [
        'caption',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
