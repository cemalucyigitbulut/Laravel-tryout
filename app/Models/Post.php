<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'body'
    ];

    public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id); // (contains) a collection method
    }

    public function user(){
        return $this->belongsTo(User::class); //return post belongs to user
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    // public function ownedBy(User $user){
        // return $user->id === $this->user_id; //compare the users id we passed in to this current post user_id
    // }

}
