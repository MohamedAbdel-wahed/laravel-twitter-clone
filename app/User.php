<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use App\Tweet;


class User extends Authenticatable
{
    use Notifiable;
   
    protected $guarded=[];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }


    public function timeline()
    {
        $ids=$this->following()->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('user_id',$ids)->latest()->get();
     }

     public function following()
     {
        return $this->belongsToMany(User::class,'follows','user_id','following_user_id')->withTimestamps();
     }
 
     
     public function isFollowing(User $user)
     {
         return $this->following()->where('following_user_id',$user->id)->exists();
     } 
 
 
     public function follow(User $user)
     {
         return $this->following()->save($user);
     }
 
 
     public function unfollow(User $user)
     {
        return $this->following()->detach($user);
     } 
 
 
     public function toggleFollow(User $user)
     {
        if($this->isFollowing($user)){
            return $this->unfollow($user);
        }
        else{
            return $this->follow($user);
        }
        
     }

      public function followers()
     {
         $follower_ids= DB::table('follows')->where('following_user_id','=',$this->id)->get()->pluck('user_id');
        
        return DB::table('users')->whereIn('id',$follower_ids)->get();
     }


     public function photo()
     {
        $path='';
        if($this->photo){
            $path='/storage/'.$this->photo; 
        }
        else{
            $path='/images/default.png';
            $image=Image::make(public_path($path))->fit(300,300);
            $image->save();
        }

        return $path;
     }

}
