<?php

use Illuminate\Http\Request;

Route::apiResource('task', 'TaskController');
Route::post('weather', 'WeatherController@getByZip');
