<?php

use PHPUnit\Framework\TestCase;
use Src\Domain\Passenger;

final class PassengerTest extends TestCase
{
	public function testCriarMotorista()
	{
		$passenger = Passenger::create("John Doe", "john.doe@gmail.com", "83432616074");
		$this->assertIsString($passenger->passenger_id);
		$this->assertEquals($passenger->name, "John Doe");
		$this->assertEquals($passenger->name, "John Doe");
		$this->assertEquals($passenger->email->value, "john.doe@gmail.com");
		$this->assertEquals($passenger->document->value, "83432616074");
	}
	public function testCpfInvalido()
	{
		$this->expectExceptionMessage('Invalid cpf');
		Passenger::create("John Doe", "john.doe@gmail.com", "83432616076");
	}
	public function testEmalInvalido()
	{
		$this->expectExceptionMessage('Invalid email');
		Passenger::create("John Doe", "john.doe@gmail", "83432616076");
	}
}
