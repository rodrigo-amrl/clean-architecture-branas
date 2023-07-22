<?php

namespace Src\Domain;

use Exception;

class  Email
{

	public function __construct(protected string $email)
	{
		if (!$this->validate()) throw new Exception("Invalid email");
	}

	private function validate()
	{
		return filter_var($this->email, FILTER_VALIDATE_EMAIL);
	}
}
