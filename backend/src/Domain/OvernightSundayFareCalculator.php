<?php

namespace Src\Domain;

class OvernightSundayFareCalculator implements FareCalculator
{
	const FARE = 5;

	public function calculate(Segment $segment): float
	{
		return $segment->distance * self::FARE;
	}
}
