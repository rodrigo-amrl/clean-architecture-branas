<?php

namespace Src\Domain;

use Exception;

class CarPlate
{
	public function __construct(public string $value)
	{
		if (!$this->validate()) throw new Exception("Invalid car plate");
	}
	private function validate()
	{
		return  preg_match('/^[a-z]{3}[0-9]{4}$/', strtolower($this->value));
	}
}
