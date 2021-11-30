<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable= ['title','content'];
//One to many
    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    //one to one
    public function image()
    {
        return $this->hasOne(Image::class);
    }

    //many to many
    public function tags()
    {
        return $this->belongsToMany(Tag::class);

    }
}
