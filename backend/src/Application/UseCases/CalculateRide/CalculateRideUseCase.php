<?php

namespace Src\Application\UseCases\CalculateRide;

use Src\Application\UseCases\CalculateRide\CalculateRideInput;
use Src\Application\UseCases\CalculateRide\CalculateRideOutput;
use Src\Domain\Coord;
use Src\Domain\Date;
use Src\Domain\Ride;

class CalculateRideUseCase
{
	public static function execute(CalculateRideInput $input): CalculateRideOutput
	{
		$ride = Ride::create("", new Coord(0, 0), new Coord(0, 0));
		foreach ($input->positions as $position) {

			$ride->addPosition($position->lat, $position->long, new Date($position->date));
		}
		$price = $ride->calculate();
		return new CalculateRideOutput($price);
	}
}
