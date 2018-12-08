<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Requests\WeatherPostRequest;

class WeatherController extends Controller
{
    public function getByZip(WeatherPostRequest $request)
    {

        $validated = $request->validated();

        $client = new Client();

        $response = $client->request('POST', 'http://api.openweathermap.org/data/2.5/weather', [
            'query' => [
                'zip'   => $validated['zipcode'],
                'APPID' => env('OPEN_WEATHER_APP_ID')
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
