<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    // $user1Stats = [
    //     'favorites' => 90,
    //     'watchLaters' => 50,
    //     'completions' => 25,
    // ];

    // Redis::hmset('user.1.stats', $user1Stats);

    // return Redis::hgetall('user.1.stats');

    Cache::put('foo', ['name' => 'Laracasts', 'age' => 3], 10);

    return Cache::get('foo');
});

Route::get('favorite-video', function () {
    Redis::hincrby('user.1.stats', 'favorites', 1);

    return redirect('/');
});
