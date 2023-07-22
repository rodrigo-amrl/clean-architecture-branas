<?php

namespace Src\Domain;

class NormalFareCalculator implements FareCalculator
{
	const FARE = 2.1;

	public function calculate(Segment $segment): float
	{
		return $segment->distance * self::FARE;
	}
}
