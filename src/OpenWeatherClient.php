<?php 

/*
 * (c) Matthew Xu xumj@miamioh.edu
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace xumj\WeatherPackage;
require 'vendor/autoload.php';
require 'Location.php';
require 'WeatherDay.php';
use GuzzleHttp\Client;

class OpenWeatherClient
{
    private string $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getCurrentWeather(Location $location)
    {
        $uri = "https://api.openweathermap.org/data/2.5/weather";

        //create a new client
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => $uri,
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);

        try {
            $city = $location->getCity();
            $state = $location->getState();
            $country = $location->getCountry();
            $units = "imperial";
            $response = $client->request('GET', "weather", ['query' => 
                ['q' => "$city,$state,$country",
                'appid' => $this->apiKey,
                'units' => "$units"]
            ]);
        } catch (\Exception $e) {
            throw new \Exception("error");
        }
        $body = (string) $response->getBody();
        $data = json_decode($body, true);

        $date = new \DateTime('now');
        $unit = $units;
        $temp = $data['main']['temp'];
        $feelsLike = $data['main']['feels_like'];
        $pressure = $data['main']['pressure'];
        $humidity = $data['main']['humidity'];

        return new WeatherDay($date, $unit, $temp, $feelsLike, $pressure, $humidity);
    }
}
?>