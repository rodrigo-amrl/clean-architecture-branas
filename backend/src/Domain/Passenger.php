<?php

namespace Src\Domain;

class Passenger
{

	public function __construct(
		public  readonly string $passengerId,
		protected readonly string $name,
		protected Email $email,
		protected Cpf $document
	) {
	}

	public static function create(string $name, Email $email, Cpf $document)
	{
		$passengerId = uniqid();
		return new Passenger($passengerId, $name, $email, $document);
	}
}
