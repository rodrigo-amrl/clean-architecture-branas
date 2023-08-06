<?php

use PHPUnit\Framework\TestCase;
use Src\Domain\Cpf;

final class CpfTest extends TestCase
{
	public function testCpfValido()
	{
		$cpf = new Cpf("83432616074");
		$this->assertIsObject($cpf);
	}
	public function testCpfInvalido()
	{
		$this->expectExceptionMessage('Invalid cpf');
		new Cpf("99999999999");
	}
}
