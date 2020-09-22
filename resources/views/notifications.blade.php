@extends('layouts.app')


@section('content')
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         @include('_sidenavbar')
    </div>

    <div class="flex-1 mt-32 mx-6 px-4 rounded-lg">
        <h1 class="px-6 py-2 text-2xl font-bold text-gray-800">Notifications</h1>
        <ul class="mt-3 mb-6 px-6 w-full h-96 overflow-auto">
            @forelse($notifications as $key=>$notification)
            <a href="{{ isset($notifications[$key]->data['tweet']) ? route('tweets.show',$notifications[$key]->data['tweet']['id']) : route('profile',$notifications[$key]->data['user']['id'])}}">
                <li class="flex items-center my-1 py-3 px-4 font-semibold text-sm text-gray-900 bg-orange-200 hover:bg-orange-300 rounded-lg">
                    @if(isset($notifications[$key]->data['tweet']))
                        <i class="fas fa-heart text-red-700 text-lg"></i>
                    @else 
                         <img src="{{ $notifications[$key]->data['user']['photo'] ? asset('/uploads/personal/'.$notifications[$key]->data['user']['photo']) : '/images/default.png'  }}" class="w-6 h-6 rounded-full">
                    @endif
                   <span class="ml-2">
                        {{  $notifications[$key]->data['username']  }} 
                        {{ $notification->type == 'App\Notifications\LikeNotification' ? 'liked your tweet' : 'started following you'}}
                   </span> 
                    @if(isset($notifications[$key]->data['tweet']))
                      <span class="px-2 py-1 ml-2 text-sm text-black font-normal  bg-blue-100 rounded-sm">{{ $notifications[$key]->data['tweet']['body'] }}</span>
                    @endif
                </li>
            </a>
            @empty 
                <li class="text-center font-bold text-gray-600 my-10 text-lg">No Notifications</li>
            @endforelse
        </ul>
    </div>


    <div class="w-1/6 mt-20">
        @include('_friends')
    </div>
</div>
@endsection