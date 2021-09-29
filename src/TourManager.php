<?php
namespace tsp;

Class TourManager
{
    static public $destinationPoints = array();

    static public function addPoint(Point $point) {
        self::$destinationPoints[] = $point;
    }

    static public function getPoint($index) {
        return self::$destinationPoints[$index];
    }

    static public function numberOfPoints() {
        return count(self::$destinationPoints);
    }

    // As PHP doesn't have a native 0.0 to 1.0 random float, this method is added 
    static public function Random()
    {
        return mt_rand(0, mt_getrandmax() - 1) / mt_getrandmax();
    }
}
