Traveling Salesman Problem - Genetic Algorithm
----------------------------------------------

Direct PHP Conversion of the Java code found at http://www.theprojectspot.com/tutorial-post/applying-a-genetic-algorithm-to-the-travelling-salesman-problem/5

```php
composer install gorcer/tsp-ga-php
```

```php

TourManager::addPoint(new Point('city1', 43.176229, 131.920374));
TourManager::addPoint(new Point('city2', 43.077401, 131.951273));
TourManager::addPoint(new Point('city3', 43.148584, 131.906298));


$pop = new Population(50, true);
print("Initial distance: " . $pop->getFittest()->getDistance());

// Evolve population for 100 generations
$pop = GA::evolvePopulation($pop);
for ($i = 0; $i < 100; $i++) {
    $pop = GA::evolvePopulation($pop);
}

// Print final results
print("<br>Finished.");
print("<br>Final distance: " . $pop->getFittest()->getDistance());
print("<br>Solution:");
print($pop->getFittest());
```