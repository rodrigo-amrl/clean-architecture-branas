<?php

use Src\Domain\Passenger;

test("Deve criar um passageiro", function () {
	$passenger = Passenger::create("John Doe", "john.doe@gmail.com", "83432616074");
	expect($passenger->passengerId)->toBeString();
	expect($passenger->name)->toBeString("John Doe");
	expect($passenger->email->value)->toBeString("john.doe@gmail.com");
	expect($passenger->document->value)->toBeString("83432616074");
});

test("Não pode criar passageiro com cpf inválido", function () {
	expect(fn () => Passenger::create("John Doe", "john.doe@gmail.com", "83432616076"))->toThrow("Invalid cpf");
});

test("Não pode criar passageiro com email inválido", function () {
	expect(fn () => Passenger::create("John Doe", "john.doe@gmail", "83432616074"))->toThrow("Invalid email");
});
