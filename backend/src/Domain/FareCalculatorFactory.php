<?php

namespace Src\Domain;

use Exception;

class FareCalculatorFactory
{

	public static function  create(Segment $segment)
	{
		if ($segment->isOvernight() && !$segment->isSunday()) {
			return new OvernightFareCalculator();
		}
		if ($segment->isOvernight() && $segment->isSunday()) {
			return new OvernightSundayFareCalculator();
		}
		if (!$segment->isOvernight() && $segment->isSunday()) {
			return new SundayFareCalculator();
		}
		if (!$segment->isOvernight() && !$segment->isSunday()) {
			return new NormalFareCalculator();
		}
		throw new Exception("Invalid segment");
	}
}
