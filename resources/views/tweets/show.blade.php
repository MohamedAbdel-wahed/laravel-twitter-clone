@extends('layouts.app')

@section('content')
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         @include('_sidenavbar')
    </div>
    <div class="flex-1 mt-32 mx-6 px-2 rounded-lg">
        <div class="my-3 py-4 px-3 rounded-lg border border-gray-200">
            <div class="flex">
                <a href="{{ route('profile',$tweet->user->id) }}">
                    <img src="{{ asset($tweet->user->photo()) }}" class="w-10 h-10 rounded-full select-none" title="view profile">
                </a>
                <div class="select-none">
                    <h1 class="ml-2  font-semibold text-gray-800">
                        <a href="{{ route('profile',$tweet->user->id) }}" class="no-underline hover:underline hover:text-blue-900">{{ $tweet->user->fName.' '.$tweet->user->lName }}</a>
                    </h1>
                    <span class="ml-2 inline-block transform -translate-y-1 text-gray-500 text-xs">{{ $tweet->created_at->diffForHumans() }}</span>
                </div>
            </div>
            <div class="mt-4 px-12">
                <p class="text-sm text-gray-700 ml-2">{{ $tweet->body }}</p>
                @if($tweet->image)
                    <div class="flex flex-wrap rounded-lg">
                        @foreach ($tweet->image as $img )
                            <img src="{{ asset('uploads/tweets/'.$img) }}" class="w-40 h-40 ml-2 mt-2 rounded-md">
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="mt-6 ml-2 px-12">
                <form action="{{ route('tweets.like',$tweet->id) }}" method="POST">
                    @csrf 
                    <Like tweet_id="{{ $tweet->id }}" like_status="{{ $tweet->isLikedBy(Auth::user()) }}"/>
                </form>
            </div>
            <div class="flex justify-end items-center mr-6">
               @foreach ($tweet->latest_likes() as $photo)
                    <img src="{{ $photo ? asset('/uploads/personal/'.$photo) : '/images/default.png' }}" class="w-6 h-6 rounded-full">
               @endforeach
               <show-likes :num_of_likes="{{ $tweet->likes->count() }}" :users="{{ $tweet->users_liked_tweet() }}" ></show-likes>  
            </div>
        </div>
    </div>
    <div class="w-1/6 mt-20">
          @include('_friends')
    </div>
</div>
@endsection