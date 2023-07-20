<?php

namespace Src\Domain;

use Exception;

class CarPlate
{
	public function __construct(string $plate)
	{
		if (!$this->validate($plate)) throw new Exception("Invalid car plate");
	}
	private function validate(string $plate)
	{
		return  preg_match('/^[a-z]{3}[0-9]{4}$/', strtolower($plate));
	}
}
