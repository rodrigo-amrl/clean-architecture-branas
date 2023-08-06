<?php

namespace Src\Domain\Fare\Strategy;

use Src\Domain\Segment;

class SundayFareCalculator implements FareCalculator
{
	const FARE =    2.9;

	public function calculate(Segment $segment): float
	{
		return $segment->distance * self::FARE;
	}
}
