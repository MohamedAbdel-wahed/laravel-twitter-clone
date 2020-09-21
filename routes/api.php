<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// to fix mixed content error
if (App::environment('production')) {
    URL::forceScheme('https');
}


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

