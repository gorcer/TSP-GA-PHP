<?php
namespace tsp;

class Point {

    public $latitude;
    public $longitude;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    public function distanceTo(Point $p2) {

        $p1=$this;
        if ($p1->latitude == $p2->latitude && $p1->longitude == $p2->longitude) return 0;

        $theta = $p1->longitude - $p2->longitude;
        $dist = sin(deg2rad($p1->latitude)) * sin(deg2rad($p2->latitude)) +  cos(deg2rad($p1->latitude)) * cos(deg2rad($p2->latitude)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        return $dist * 60 * 1.853159;
    }

    public function __toString()
    {
        return $this->getLatitude() . ', '  . $this->getLongitude();
    }
}