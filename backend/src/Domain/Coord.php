<?php

namespace Src\Domain;

class Coord
{
	public function __construct(public readonly float $lat, public readonly float $long)
	{
	}
}
