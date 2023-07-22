<?php

namespace Src\Domain;

class Position
{
	public coord $coord;

	public function __construct(float $lat, float $long, readonly Date $date)
	{
		$this->coord = new Coord($lat, $long);
	}
}
