<?php

use PHPUnit\Framework\TestCase;
use Src\Domain\Date;
use Src\Domain\Ride;
use Src\Domain\Coord;

final class RideTest extends TestCase
{

	public function testCalculoPrecoDeDia()
	{
		$ride = Ride::create("", new Coord(0, 0), new Coord(0, 0));
		$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-01 10:00:00"));
		$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-01 10:00:00"));
		$this->assertEquals($ride->calculate(), 21.0);
	}
	public function testCalculoPrecoANoite()
	{
		$ride = Ride::create("", new Coord(0, 0), new Coord(0, 0));
		$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-01 23:00:00"));
		$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-01 23:00:00"));
		$this->assertEquals($ride->calculate(), 39.0);
	}
	public function testCalculoPrecoDomingoDeDia()
	{
		$ride = Ride::create("", new Coord(0, 0), new Coord(0, 0));
		$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-07 10:00:00"));
		$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-07 10:00:00"));
		$this->assertEquals($ride->calculate(), 21.0);
	}
	public function testCalculoPrecoDomingoDeNoite()
	{
		$ride = Ride::create("", new Coord(0, 0), new Coord(0, 0));
		$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-07 23:00:00"));
		$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-07 23:00:00"));
		$this->assertEquals($ride->calculate(), 39.0);
	}
	public function testDataInvalida()
	{
		$ride = Ride::create("", new Coord(0, 0), new Coord(0, 0));
		$this->expectExceptionMessage('Invalid date');
		$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("javascript"));
		$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("javascript"));
	}
	public function testCalculoPrecoMinimo()
	{
		$ride = Ride::create("", new Coord(0, 0), new Coord(0, 0));
		$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-07 23:00:00"));
		$ride->addPosition(-27.579020277800876, -48.50838017206791, new Date("2021-03-07 23:00:00"));
		$this->assertEquals($ride->calculate(), 15.6);
	}
}
