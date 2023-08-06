<?php

namespace Src\Domain\Fare\ChainOfResponsability;

use Src\Domain\Segment;

abstract class FareCalculatorHandler
{
	const FARE = 0;
	public function __construct(public readonly  ?FareCalculatorHandler $next)
	{
	}
	abstract function  handle(Segment $segment): float;
	public function calculate(Segment $segment)
	{
		return $segment->distance * self::FARE;
	}
}
