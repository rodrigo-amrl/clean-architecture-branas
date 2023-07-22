<?php

use Src\Domain\Coord;
use Src\Domain\DistanceCalculator;

test("Deve calcular a distância entre duas coordenadas", function () {
	$from = new Coord(-27.584905257808835, -48.545022195325124);
	$to = new Coord(-27.496887588317275, -48.522234807851476);
	$distance = DistanceCalculator::calculate($from, $to);
	expect($distance)->toBe(10.0);
})->only();
