<?php

namespace Src\Domain;

class DistanceCalculator
{

	public static function calculate(Coord $from, Coord $to)
	{

		$earthRadius = 6371;
		$degreesToRadians = pi() / 180;
		$deltaLat = ($to->lat - $from->lat) * $degreesToRadians;
		$deltaLon = ($to->long - $from->long) * $degreesToRadians;
		$a = sin($deltaLat / 2) * sin($deltaLat / 2) +
			cos($from->lat * $degreesToRadians) *
			cos($to->lat * $degreesToRadians) *
			sin($deltaLon / 2) *
			sin($deltaLon / 2);
		$c = 2 * atan2(sqrt($a), sqrt(1 - $a));
		$distance = $earthRadius * $c;
		return floatval(round($distance));
	}
}
