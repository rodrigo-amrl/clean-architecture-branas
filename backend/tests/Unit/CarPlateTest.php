<?php

use Src\Domain\CarPlate;

test('Deve testar uma placa válida', function () {
    $carPlate = new CarPlate("AAA9999");
    expect($carPlate)->toBeObject();
});

test("Não deve permitir placa inválida", function () {
    expect(fn () => new CarPlate("AAA999"))->toThrow("Invalid car plate");
});
