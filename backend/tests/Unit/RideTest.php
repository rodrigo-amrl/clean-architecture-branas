<?php

use Src\Domain\Date;
use Src\Domain\Ride;

test("Deve fazer o cálculo do preço de uma corrida durante o dia", function () {
	$ride = new Ride();
	$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-01 10:00:00"));
	$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-01 10:00:00"));
	expect($ride->calculate())->toBe(21.0);
});

test("Deve fazer o cálculo do preço de uma corrida durante a noite", function () {
	$ride = new Ride();
	$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-01 23:00:00"));
	$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-01 23:00:00"));
	expect($ride->calculate())->toBe(39.0);
});

test("Deve fazer o cálculo do preço de uma corrida no domingo de dia", function () {
	$ride = new Ride();
	$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-07 10:00:00"));
	$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-07 10:00:00"));
	expect($ride->calculate())->toBe(21.0);
});

test("Deve fazer o cálculo do preço de uma corrida no domingo de noite", function () {
	$ride = new Ride();
	$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-07 23:00:00"));
	$ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("2021-03-07 23:00:00"));
	expect($ride->calculate())->toBe(39.0);
});

test("Deve lançar um erro se a data for inválida", function () {
	$ride = new Ride();
	expect(fn () => $ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("javascript")))->toThrow("Invalid date");
	expect(fn () => $ride->addPosition(-27.496887588317275, -48.522234807851476, new Date("javascript")))->toThrow("Invalid date");
	$ride->calculate();
});

test("Deve fazer o cálculo do preço de uma corrida durante o dia com preço mínimo", function () {
	$ride = new Ride();
	$ride->addPosition(-27.584905257808835, -48.545022195325124, new Date("2021-03-07 23:00:00"));
	$ride->addPosition(-27.579020277800876, -48.50838017206791, new Date("2021-03-07 23:00:00"));
	expect($ride->calculate())->toBe(15.6);
});
