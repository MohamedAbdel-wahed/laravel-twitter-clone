@extends('layouts.app')

@section('content')
    <div class="container mx-auto transform translate-y-24">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-xl">
                <div class="flex flex-col break-words bg-white border-2 rounded shadow-md">

                    <div class="font-bold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Register') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('register') }}">
                        @csrf

                       <div class="flex mb-4">
                        <div class="w-5/12 flex flex-wrap">
                            <label for="fName" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>

                            <input id="fName" type="text" placeholder="John" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md @error('name')  border-red-500 @enderror" name="fName" value="{{ old('fName') }}" required autocomplete="fName" autofocus>

                            @error('fName')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-5/12 ml-4 flex flex-wrap">
                            <label for="lName" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>

                            <input id="lName" type="text" placeholder="Smith" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md @error('lName')  border-red-500 @enderror" name="lName" value="{{ old('lName') }}" required autocomplete="lName" autofocus>

                            @error('lName')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                       </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('E-Mail Address') }}:
                            </label>

                            <input id="email" type="email" placeholder="foo@example.com" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Password') }}:
                            </label>

                            <input id="password" type="password" placeholder="********" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md @error('password') border-red-500 @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <p class="text-red-500 text-xs italic mt-2">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap mb-4">
                            <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
                                {{ __('Confirm Password') }}:
                            </label>

                            <input id="password-confirm" type="password" placeholder="********" class="px-4 py-2 w-full border focus:border-blue-400 focus:outline-none rounded-md" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit" class="inline-block align-middle text-center select-none py-2 px-4 rounded text-sm font-bold text-white bg-blue-600 hover:text-blue-200 focus:outline-none focus:bg-blue-800">
                                {{ __('Register') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                {{ __('Already have an account?') }}
                                <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('login') }}">
                                    {{ __('Login') }}
                                </a>
                            </p>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
