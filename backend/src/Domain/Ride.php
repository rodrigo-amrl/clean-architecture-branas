<?php

namespace Src\Domain;

use DateTime;
use Src\Domain\Date;


class Ride
{
	const MIN_PRICE = 10;
	protected array $positions;

	public function __construct(
		public readonly string $ride_id,
		public readonly string $passenger_id,
		public readonly Coord $from,
		public readonly Coord $to,
		public readonly string $status,
		public readonly Date $request_date
	) {
		$this->positions = [];
	}

	public function addPosition(float $lat, float $long, Date $date)
	{
		$this->positions[] = new Position($lat, $long, $date);
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
		return round(max($price, self::MIN_PRICE), 2);
	}
	public static function create(string $passenger_id, Coord $from, Coord $to)
	{
		$ride_id = uniqid();
		$status = "requested";
		return new Ride($ride_id, $passenger_id, $from, $to, $status, new Date(date('Y-m-d H:i:s')));
	}
}
