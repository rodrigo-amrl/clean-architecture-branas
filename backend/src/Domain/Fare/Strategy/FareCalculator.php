<?php

namespace Src\Domain\Fare\Strategy;

use Src\Domain\Segment;

abstract class FareCalculator
{

	abstract function calculate(Segment $segment): float;
}
