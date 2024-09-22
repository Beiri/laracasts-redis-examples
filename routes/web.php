<?php

use App\Article;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;


Route::get('articles/trending', function () {
    $trending = Redis::zrevrange('trending_articles', 0, 2);

    $trending = Article::hydrate(
        array_map('json_decode', $trending)
    );

    dd($trending);
});

Route::get('articles/{article}', function (Article $article) {
    Redis::zincrby('trending_articles', 1, $article);

    return $article;
});
