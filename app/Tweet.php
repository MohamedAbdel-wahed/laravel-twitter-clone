<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Like;


class Tweet extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function isLikedBy(User $user)
    {
       return $this->likes()->where('user_id',$user->id)->exists();
    }


    public function like(User $user)
    {
         Like::create([
            'user_id' => $user->id,
            'tweet_id'=>$this->id
        ]);
    }


    public function unlike(User $user)
    {
        return $this->likes()->where('user_id',$user->id)->delete();
    }
    

    public function likeToggle(User $user)
    {
        if($this->isLikedBy($user)){
            $this->unlike($user);
        }
        else{
            $this->like($user);
        }
    }

    
    public function latest_likes()
    {
        $user_ids=$this->likes()->latest()->take(3)->get()->pluck('user_id');

        return User::whereIn('id',$user_ids)->get()->pluck('photo');
    }


    public function users_liked_tweet()
    {
        $user_ids=$this->likes()->latest()->get()->pluck('user_id');

        return User::whereIn('id',$user_ids)->get();
    }


}
