<?php

namespace Src\Domain;

use Exception;

class  Email
{

	public function __construct(public string $value)
	{
		if (!$this->validate()) throw new Exception("Invalid email");
	}
	private function validate()
	{
		return filter_var($this->value, FILTER_VALIDATE_EMAIL);
	}
}
