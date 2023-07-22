<?php

namespace Src\Domain;

class Ride
{
	const MIN_PRICE = 10;


	public function __construct(protected array $positions)
	{
	}

	public function addPosition(float $lat, float $long, Date $date)
	{
		$this->positions[] = (new Position($lat, $long, $date));
	}

	public function calculate()
	{
		$price = 0;
		foreach ($this->positions as $index => $position) {
			if (!isset($this->positions[$index + 1])) break;
			$nextPosition = $this->positions[$index + 1];
			$distance = DistanceCalculator::calculate($position->coord, $nextPosition->coord);
			$segment = new Segment($distance, $nextPosition->date);
			$fareCalculator = FareCalculatorFactory::create($segment);
			$price += $fareCalculator->calculate($segment);
		}
		return max($price, self::MIN_PRICE);
	}
}
