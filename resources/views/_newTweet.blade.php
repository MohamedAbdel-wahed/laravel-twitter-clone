<div class="mb-4 py-4 border border-blue-200 rounded-lg">
    <form action="{{ route('tweets.store') }}" method="POST">
        @csrf
        <textarea name="tweet" placeholder="Hey, What's up?" class="w-full px-6 py-1 text-sm text-gray-700 border-b border-gray-200 focus:outline-none focus:border-gray-300 rounded-md "></textarea>
        @error('tweet') 
            <p class="my-1 text-red-600 text-xs text-center">{{ $message }}</p>
        @enderror
        {{-- <div class="mt-2 mb-8 cursor-pointer transform translate-x-20 ml-72">
            <input type="file" name="image" class="absolute w-10 z-10 opacity-0">
            <i class="fas fa-upload fas fa-upload absolute text-2xl text-blue-600"></i>
        </div> --}}
        <div class="mt-3 flex justify-between items-center">
            <a href="{{ route('profile',Auth::user()->id) }}">
                <img src="{{ Auth::user()->photo() }}" class="w-10 h-10 my-1 mx-6 rounded-full select-none">
            </a>
            <button class="my-1 mx-6 px-4 py-2 bg-blue-600 text-sm font-semibold text-white hover:text-blue-200 focus:bg-blue-800 focus:outline-none rounded-lg">tweet it<b>!</b></button>
        </div>
    </form>
</div>
