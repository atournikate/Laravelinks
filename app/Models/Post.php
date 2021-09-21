<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body'
    ];

    public function likedBy(User $user) {

        //in this example, 'likes' is a collection, and 
        //'contains' allows us to look inside the collection
        //and then it checks for 'user_id' to see if the 'user's 'id'
        //is located in the model
        //will return a true or false value.
        return $this->likes->contains('user_id', $user->id);
    }

    // public function ownedBy(User $user) {
    //     return $user->user_id === $this->user_id;
    // }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function receivedLikes() {
        return $this->hasManyThrough(Like::class, Post::class);
    }

}
