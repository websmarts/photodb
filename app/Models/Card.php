<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable =['id','user_id','name','note'];


    public function photos()
    {
        return $this->belongsToMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
