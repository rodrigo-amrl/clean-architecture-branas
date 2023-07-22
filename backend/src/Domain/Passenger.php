<?php

namespace Src\Domain;

class Passenger
{

	public Email $email;
	public Cpf $document;

	public function __construct(
		public  readonly string $passengerId,
		public readonly string $name,
		string $email,
		string $document
	) {
		$this->email = new Email($email);
		$this->document = new Cpf($document);
	}

	public static function create(string $name, string $email, string $document)
	{
		$passengerId = uniqid();
		return new Passenger($passengerId, $name, $email, $document);
	}
}
