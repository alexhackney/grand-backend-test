<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WeatherTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetWeather()
    {
        $response = $this->json('POST', '/api/weather', [
            'zipcode' => '41139'
        ]);

        $response->assertStatus(200);
    }

    public function testGetWeatherWithBadZipcode()
    {
        $response = $this->json('POST', '/api/weather', [
            'zipcode' => '666'
        ]);

        $response->assertStatus(418);
    }
}
