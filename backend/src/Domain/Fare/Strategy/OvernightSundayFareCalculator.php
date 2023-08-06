<?php

namespace Src\Domain\Fare\Strategy;

use Src\Domain\Segment;

class OvernightSundayFareCalculator implements FareCalculator
{
	const FARE =   5;


	public function calculate(Segment $segment): float
	{
		return $segment->distance * self::FARE;
	}
}
