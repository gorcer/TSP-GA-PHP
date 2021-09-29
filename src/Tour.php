<?php
namespace tsp;

class Tour
{
    private $tour = array();
    private $fitness = 0;
    private $distance = 0;

    public function __construct()
    {
        $this->tour = array_fill(0, TourManager::numberOfCities(), null);
    }

    public function generateIndividual()
    {
        for ($pointIndex = 0, $len = TourManager::numberOfCities(); $pointIndex < $len; $pointIndex++) {
            $this->setPoint($pointIndex, TourManager::getPoint($pointIndex));
        }

        shuffle($this->tour);
    }

    public function getPoint($tourPosition)
    {
        return $this->tour[$tourPosition];
    }

    public function setPoint($tourPosition, Point $point)
    {
        $this->tour[$tourPosition] = $point;

        $this->fitness = 0;
        $this->distance = 0;
    }

    public function getFitness()
    {
        if ($this->fitness == 0)
            $this->fitness = 1 / (double) $this->getDistance();

        return $this->fitness;
    }

    public function getDistance()
    {
        if ($this->distance == 0) {
            $tourDistance = 0;

            for ($pointIndex = 0, $len = $this->tourSize(); $pointIndex < $len; $pointIndex++) {
                $fromPoint = $this->getPoint($pointIndex);
                $destinationPoint = null;
                
                // Check we're not on our tour's last point, if we are set our
                // tour's final destination point to our starting point
                if ($pointIndex + 1 < $this->tourSize()) {
                    $destinationPoint = $this->getPoint($pointIndex + 1);
                } else {
                    $destinationPoint = $this->getPoint(0);
                }

                $tourDistance += $fromPoint->distanceTo($destinationPoint);
            }

            $this->distance = $tourDistance;
        }

        return $this->distance;
    }

    public function tourSize()
    {
        return count($this->tour);
    }

    public function containsPoint(Point $point)
    {
        return in_array($point, $this->tour);
    }

    public function __toString()
    {
        return implode('|', $this->tour);
    }

}
