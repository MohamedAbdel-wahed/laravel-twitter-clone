
<div class="my-6 p-6 border border-blue-200 rounded-lg">
    @forelse($tweets as $tweet)
         @include('_singleTweet')
    @empty 
    <div class="text-center font-bold text-lg text-gray-600">No tweets has been found!</div>
    @endforelse
</div>