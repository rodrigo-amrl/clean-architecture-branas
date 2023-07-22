<?php

namespace Src\Domain;

use Exception;

class Segment
{

	public function __construct(public readonly float $distance, protected readonly Date $date)
	{
		if (!$this->isValidDistance()) throw new Exception("Invalid distance");
	}

	public function isOvernight()
	{
		return $this->date->getHour() >= 22 || $this->date->getHour() <= 6;
	}

	public function  isSunday()
	{
		return $this->date->getDay() === 0;
	}

	public function isValidDistance()
	{
		return $this->distance && $this->distance > 0;
	}
}
