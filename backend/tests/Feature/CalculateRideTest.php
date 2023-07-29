<?php

use Src\Application\UseCases\CalculateRide\CalculateRideInput;
use Src\Application\UseCases\CalculateRide\CalculateRidePositionInput;
use Src\Application\UseCases\CalculateRide\CalculateRideUseCase;

test("Deve fazer o cálculo do preço de uma corrida durante o dia", function () {
	$input = new CalculateRideInput(
		new CalculateRidePositionInput(lat: -27.584905257808835, long: -48.545022195325124, date: "2021-03-01 10:00:00"),
		new CalculateRidePositionInput(lat: -27.496887588317275, long: -48.522234807851476, date: "2021-03-01 10:00:00"),
	);
	$usecase = new CalculateRideUseCase();
	$output = $usecase->execute($input);
	expect($output->price)->toBe(21.0);
})->only();
