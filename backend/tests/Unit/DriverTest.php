<?php

use PHPUnit\Framework\TestCase;
use Src\Domain\Driver;

final class DriverTest extends TestCase
{
	public function testCriarMotorista()
	{
		$driver = Driver::create("John Doe", "john.doe@gmail.com", "83432616074", "AAA9999");
		$this->assertIsString($driver->driver_id);
		$this->assertEquals($driver->name, "John Doe");
		$this->assertEquals($driver->name, "John Doe");
		$this->assertEquals($driver->email->value, "john.doe@gmail.com");
		$this->assertEquals($driver->document->value, "83432616074");
		$this->assertEquals($driver->car_plate->value, "AAA9999");
	}
	public function testCpfInvalido()
	{
		$this->expectExceptionMessage('Invalid cpf');
		Driver::create("John Doe", "john.doe@gmail.com", "83432616076", "AAA9999");
	}
	public function testEmalInvalido()
	{
		$this->expectExceptionMessage('Invalid email');
		Driver::create("John Doe", "john.doe@gmail", "83432616076", "AAA9999");
	}
	public function testPlacaInvalida()
	{
		$this->expectExceptionMessage('Invalid car plate');
		Driver::create("John Doe", "john.doe@gmail.com", "83432616074", "AAA999");
	}
}
