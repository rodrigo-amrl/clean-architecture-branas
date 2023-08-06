<?php

namespace Src\Domain\Fare\Strategy;

use Src\Domain\Segment;

class OvernightFareCalculator implements FareCalculator
{
	const FARE =  3.9;

	public function calculate(Segment $segment): float
	{
		return $segment->distance * self::FARE;
	}
}
