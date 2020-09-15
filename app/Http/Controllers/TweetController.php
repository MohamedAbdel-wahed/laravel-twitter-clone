<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;


class TweetController extends Controller
{
   
    public function index()
    {
       $tweets=auth()->user()->timeline();
       
        return view('tweets.index',compact('tweets'));
    }


    public function store()
    {
        $data=request()->validate([
            'tweet'=>'min:1|max:500'
        ]);

        Tweet::create([
            'user_id'=>auth()->user()->id,
            'body'=>$data['tweet']
        ]);

         return back();
    }

    public function like(Tweet $tweet)
    {
        $tweet->likeToggle(auth()->user());
    }

}
