<?php 

/*
 * (c) Matthew Xu xumj@miamioh.edu
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace xumj\WeatherPackage;

class WeatherDay
{
    private \DateTime $date;
    private string $unit;
    private int $temperature;
    private int $feelsLike;
    private int $pressure;
    private int $humidity;

    public function __construct($date, $unit, $temperature, $feelsLike, $pressure, $humidity) {
        $this->date = $date;
        $this->unit = $unit;
        $this->temperature = $temperature;
        $this->feelsLike = $feelsLike;
        $this->pressure = $pressure;
        $this->humidity = $humidity;
    }

    public function getDate() {
        return $this->date;
    }

    public function getUnit() {
        return $this->unit;
    }

    public function getTemperature() {
        return $this->temperature;
    }

    public function getFeelsLike() {
        return $this->feelsLike;
    }

    public function getPressure() {
        return $this->pressure;
    }

    public function getHumidity() {
        return $this->humidity;
    }
}

?>