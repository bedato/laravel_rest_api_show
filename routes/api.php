<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;


Route::group(['namespace' => 'Api'], function () {
    Route::apiResources([
        'languages' => 'LanguagesController',
    ]);
});
