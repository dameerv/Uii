<?php

$boxes = [1, 2, 1, 5, 1, 3, 5, 2, 5, 5];
$maxWeight = 6;
$result = calculateCourierTrips($maxWeight, $boxes);
var_dump($result);

$boxes = [2, 4, 3, 6, 1];
$maxWeight = 5;
$result = calculateCourierTrips($maxWeight, $boxes);
var_dump($result);
function calculateCourierTrips(int $maxWeight, array $boxesWeights): int
{
    $count = 0;
    foreach ($boxesWeights as $index => $boxWeight) {
        if ($boxWeight > $maxWeight) {
            unset($boxesWeights[$index]);
            continue;
        }

        if (!isset($boxesWeights[$index])) {
            continue;
        }

        $foundIndex = array_search($maxWeight - $boxWeight, $boxesWeights);

        if (false !== $foundIndex && $foundIndex !== $index) {
            unset($boxesWeights[$index]);
            unset($boxesWeights[$foundIndex]);
            $count++;
        }
    }

    return $count;
}
