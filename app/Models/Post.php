<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable= ['title','content'];
//One to many
//    public function comments()
//    {
//        return $this->hasMany(comment::class);
//    }

    //one to many polymorphic
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //one to one
    public function image()
    {
        return $this->hasOne(Image::class);
    }
    //has through
    public function imageArtist()
    {
        return $this->hasOneThrough(Artist::class, Image::class);
    }


    //many to many
    public function tags()
    {
        return $this->belongsToMany(Tag::class);

    }
}
