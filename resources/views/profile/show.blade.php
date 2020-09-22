@extends('layouts.app')


@section('content')
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         @include('_sidenavbar')
    </div>
     <div class="flex-1 mt-20 mx-6 px-4 rounded-lg">
        <div class="w-full h-72">
            <img src="{{ $user->profileImg ? asset('/uploads/profile/'.$user->profileImg) : '/images/default-profile.jpg'}}" class="w-full h-full rounded-lg select-none"> 
            <div class="absolute select-none">
                <img src="{{ asset($user->photo()) }}" class="transform -translate-y-20 translate-x-10 w-40 h-40 rounded-full"> 
            </div>
            <div class="relative ml-56 mt-4">
                <div class="w-1/2 inline-block select-none">
                    <h1 class="ml-1 text-lg font-bold text-gray-800">{{ $user->fName.' '.$user->lName }}</h1>
                    <p class="text-xs text-gray-600 ml-2">Joined {{ $user->created_at->diffForHumans() }}</p>
                    <p @click="showFollowersModal=!showFollowersModal" class="text-sm mt-2 text-gray-800 ml-2 text-semibold no-underline hover:underline cursor-pointer" title="view followers">
                        {{ count($user->followers()) > 0 ? count($user->followers()) : ''  }} <strong>Followers</strong>
                    </p>
                    <button v-if="showFollowersModal" @click="showFollowersModal=false" class="w-full h-full fixed inset-0 bg-gray-800 opacity-50 cursor-default z-10"></button>
                    <div v-if="showFollowersModal" class="w-96 h-96 fixed top-0 mt-24 bg-white border border-gray-600 rounded-lg z-10 overflow-hidden">
                        <h1 class="mb-3 py-3 text-xl font-bold text-center bg-blue-800 text-white rounded-sm">Followers</h1>
                        <div class="mb-2 pb-2 px-6 h-84 overflow-auto">
                            @forelse ($user->followers() as $follower)
                                <div class="flex items-center my-1 px-4 py-2 {{ $loop->last?'':'border-b' }} border-gray-200">
                                    <a href="{{ route('profile',$follower->id) }}" title="view profile">
                                        <img src="{{ $follower->photo ? asset('/uploads/personal/'.$follower->photo) : '/images/default.png' }}" class="w-8 h-8 rounded-full">
                                    </a>
                                    <div>
                                        <h1 class="ml-2 text-gray-800 text-sm font-semibold no-underline hover:underline">
                                            <a href="{{ route('profile',$follower->id) }}">{{ $follower->fName.' '.$follower->lName }}</a>
                                        </h1>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center mt-8 text-lg font-bold text-gray-600">No Followers</div>
                            @endforelse
                        </div>
                    </div>
                    @if($user->is(auth()->user()))
                        <p class="absolute w-2/3 break-words mt-6 p-2 text-sm border border-gray-100 rounded-lg">{{$user->description ?? 'You Can Add Bio Here...'}}</p>
                    @else
                        <p class="absolute w-2/3 break-words mt-6 p-2 text-sm border border-gray-100 rounded-lg">{{$user->description ?? 'No Information...'}}</p>
                    @endif
                </div>
                <div class="float-right mr-3 inline-block">
                    @if ($user->is(Auth::user()))
                        <a href="{{ route('profile.edit',$user->id) }}" class="mr-2 px-4 py-1 bg-white text-gray-800 focus:outline-none text-sm border border-gray-400 hover:bg-gray-200 font-bold rounded-full select-none">Edit Profile</a>
                    @endif
                    @unless($user->is(Auth::user()))
                        <form class="mr-2 select-none">
                            @csrf
                            <Follow :user="{{ $user }}" follow_Status="{{ $follow_status }}" :notifications="{{ Auth::user()->notifications }}"/>/>
                        </form>
                    @endunless
                </div>
            </div>
        </div>
        <div class="{{ $user->description ? 'mt-64' : 'mt-48' }} mb-20 transform -translate-x-8">
            @include('_timeline')
        </div>
    </div>
    <div class="w-1/6 mt-20">
          @include('_friends')
    </div>
</div>
@endsection
