<?php

namespace App\Http\Controllers;

use App\Notifications\LikeNotification;
use App\Tweet;


class TweetController extends Controller
{
   
    public function index()
    {
        $user=auth()->user();
       $tweets=auth()->user()->timeline();
       $newNotifications=auth()->user()->unreadNotifications;

        return view('tweets.index',compact('user','tweets','newNotifications'));
    }

    public function show(Tweet $tweet)
    { 
        $newNotifications=auth()->user()->unreadNotifications;

        return view('tweets.show',compact('tweet','newNotifications'));
    }


    public function store()
    {
       $data=request()->validate([
                'content'=>['min:1','max:500'],
                'image' => 'nullable|sometimes',
                'image.*' => 'mimes:doc,zip,pdf,jpg,jpeg,png,gif,bmp',
        ]);

        $tweet_images=[];
   
        if(request('image')){
            foreach($data['image'] as $key=>$file){
                    $tmp_name=$_FILES['image']['tmp_name'][$key];
                    $file_type=$_FILES['image']['type'][$key];
                    $ext=explode('/',$file_type);
                    $imgPath=uniqid('tweet.',true).'.'.strtolower(end($ext));
                    array_push($tweet_images,$imgPath);
                    move_uploaded_file($tmp_name,public_path('uploads/tweets/'.$imgPath));
                }
        }

        auth()->user()->tweets()->create([
            'body'=>$data['content'],
            'image'=>$tweet_images
        ]);

      return back();
    }

    public function like(Tweet $tweet)
    {
        $tweet->likeToggle(auth()->user());
       if( $tweet->isLikedBy(auth()->user()) ){
           $tweet->user->notify(new LikeNotification(auth()->user(), $tweet));
        }
        
    }

}
