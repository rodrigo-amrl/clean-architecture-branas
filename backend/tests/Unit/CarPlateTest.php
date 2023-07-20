<?php

use Src\Domain\CarPlate;

test('Deve testar uma placa válida', function () {
    $carPlate = new CarPlate("AAA9999");
    expect($carPlate)->toBeObject();
});
