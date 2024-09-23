<?php

use App\Article;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Cache::remember('articles.all', 60 * 60, function () {
        return Article::all();
    });
});
