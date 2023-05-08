<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User ;
use App\Models\Comment ;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['description' ,'slug' , 'image' ];
    public function owner(){
        return $this->belongsTo(User::class , "user_id");
    }

    public function comments(){
        return  $this->hasMany(Comment::class);
    }

    public function suggested_users(){
        return User::whereNot('id' , auth()->id())->get()->shuffle()->take(5);
    }

    public function likes(){
        return $this->belongsToMany(User::class , 'likes');
    }

    public function liked(User $user){
        return $this->likes()->where("user_id" , $user->id)->exists();
    }
}
