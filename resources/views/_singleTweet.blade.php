<div class="my-3 py-4 {{ $loop->last ? '' : 'border-b' }} border-gray-200">
    <div class="flex">
        <a href="{{ route('profile',$tweet->user->id) }}">
            <img src="{{ $tweet->user->photo() }}" class="w-10 h-10 rounded-full select-none" title="view profile">
        </a>
        <div class="select-none">
            <h1 class="ml-2  font-semibold text-gray-800">
                <a href="{{ route('profile',$tweet->user->id) }}" class="no-underline hover:underline hover:text-blue-900">{{ $tweet->user->fName.' '.$tweet->user->lName }}</a>
            </h1>
            <span class="ml-2 inline-block transform -translate-y-1 text-gray-500 text-xs">{{ $tweet->created_at->diffForHumans() }}</span>
        </div>
    </div>
    <div class="mt-4 px-12">
        <p class="text-sm text-gray-700">{{ $tweet->body }}</p>
        @if($tweet->image)
            <img src="/images/tweet.jpeg" class="w-9/12 mt-2 rounded-md">
        @endif
    </div>
    <div class="mt-4 px-12">
        <form action="{{ route('tweets.like',$tweet->id) }}" method="POST">
            @csrf 
            <Like tweet_id="{{ $tweet->id }}" like_status="{{ $tweet->isLikedBy(Auth::user()) }}"/>
        </form>
    </div>
    <div class="flex justify-end items-center mr-6">
       @foreach ($tweet->latest_likes() as $photo)
            <img src="{{ $photo ? '/storage/'.$photo : '/images/default.png' }}" class="w-6 h-6 rounded-full">
       @endforeach
       <show-likes :num_of_likes="{{ $tweet->likes->count() }}" :users="{{ $tweet->users_liked_tweet() }}" ></show-likes>  
    </div>
</div>