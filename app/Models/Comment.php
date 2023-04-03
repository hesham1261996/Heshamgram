<?php

namespace App\Models;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'body'];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function owner(){
        return $this->belongsTo(User::class , "user_id");
    }
}
