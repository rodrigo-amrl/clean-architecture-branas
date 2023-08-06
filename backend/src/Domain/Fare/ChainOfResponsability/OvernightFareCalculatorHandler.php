<?php

namespace Src\Domain\Fare\ChainOfResponsability;

use Exception;
use Src\Domain\Segment;

class OvernightFareCalculatorHandler extends FareCalculatorHandler
{

	const FARE = 3.9;

	public function handle(Segment $segment): float
	{
		if ($segment->isOvernight() && !$segment->isSunday()) {
			return $this->calculate($segment);
		}
		if (!$this->next) throw new Exception("End of chain");
		return $this->next->handle($segment);
	}
}
