@extends('layouts.app')


@section('content')
<div class="flex justify-between">
    <div class="w-1/5 mt-20 flex flex-col">
         @include('_sidenavbar')
    </div>

    <div class="flex-1 mt-32 mx-6 px-4 rounded-lg">
        <h1 class="mb-4 text-2xl font-bold text-gray-800">Explore & Follow New People</h1>
        <div class="py-2 px-4 border border-gray-400 rounded-lg">
            @foreach($users as $user)
                @unless(Auth::user()->isFollowing($user) || Auth::user()->is($user))
                    <div class="my-3 py-3 px-20 flex justify-between {{ $loop->last ? '' : 'border-b' }} border-gray-300">
                        <div class="flex">
                            <a href="{{ route('profile',$user->id) }}" title="view profile">
                                <img src="{{ asset($user->photo()) }}" class="w-8 h-8 rounded-full">
                            </a>
                            <div>
                                <h1 class="ml-2 text-gray-800 font-semibold no-underline hover:underline">
                                    <a href="{{ route('profile',$user->id) }}">{{ $user->fName.' '.$user->lName }}</a>
                                </h1>
                                <p class="ml-2 text-xs text-gray-600">{{ Auth::user()->followers()->pluck('id')->contains($user->id) ? 'following you' : ''}}</p>
                            </div>
                        </div>
                        <Follow :user="{{ $user }}" follow_Status="{{ Auth::user()->isFollowing($user) }}" :notifications="{{ Auth::user()->notifications }}"/>
                    </div>
                @endunless
            @endforeach
        </div>
    </div>

    <div class="w-1/6 mt-20">
        @include('_friends')
    </div>
</div>
@endsection