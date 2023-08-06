<?php

use PHPUnit\Framework\TestCase;
use Src\Domain\Email;

final class EmailTest extends TestCase
{
	public function testEmailValido()
	{
		$email = new Email("john.doe@gmail.com");
		$this->assertIsObject($email);
	}
	public function testEmailInvalido()
	{
		$this->expectExceptionMessage('Invalid email');
		new Email("john.doe@gmail");
	}
}
