<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'filepath',
        'filesize',
        'width',
        'height',
    ];

    public function cards()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
