<?php 

/*
 * (c) Matthew Xu xumj@miamioh.edu
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace xumj\WeatherPackage;

class Location
{
    private string $city;
    private string $state;
    private string $country;

    public function __construct($city, $state, $country) {
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getCountry() {
        return $this->country;
    }
}

?>