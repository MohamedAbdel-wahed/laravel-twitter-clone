@if($user->is(Auth::user()))
    @include('_newTweet')
@endif

@include('_allTweets')