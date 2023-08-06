<?php

use PHPUnit\Framework\TestCase;
use Src\Domain\Coord;
use Src\Domain\DistanceCalculator;

final class DistanceCalculatorTest extends TestCase
{

	public function testCalculoDistancia()
	{
		$from = new Coord(-27.584905257808835, -48.545022195325124);
		$to = new Coord(-27.496887588317275, -48.522234807851476);
		$distance = DistanceCalculator::calculate($from, $to);
		$this->assertEquals($distance, 10.0);
	}
}
