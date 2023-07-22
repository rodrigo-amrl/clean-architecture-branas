<?php

namespace Src\Domain;

interface FareCalculator
{

	public function calculate(Segment $Segment): float;
}
