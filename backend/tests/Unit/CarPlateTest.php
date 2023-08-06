<?php

use PHPUnit\Framework\TestCase;
use Src\Domain\CarPlate;

final class CarPlateTest extends TestCase
{
    public function testPlacaValida()
    {
        $carPlate = new CarPlate("AAA9999");
        $this->assertIsObject($carPlate);
    }
    public function testPlacaInvalida()
    {
        $this->expectExceptionMessage('Invalid car plate');
        new CarPlate("AAA999");
    }
}
