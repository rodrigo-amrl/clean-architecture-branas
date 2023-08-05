<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Src\Application\UseCases\CreateDriver\CreateDriverInput;
use Src\Application\UseCases\CreateDriver\CreateDriverUseCase;
use Src\Application\UseCases\GetDriver\GetDriverInput;
use Src\Application\UseCases\GetDriver\GetDriverUseCase;
use Src\Infra\Database\PdoAdapter;
use Src\Infra\Repository\DriverRepositoryDatabase;

final class CreateDriverTest extends TestCase
{
	public function testCadastroMotorista(): void
	{
		$input = new CreateDriverInput(
			name: "John Doe",
			email: "jon.doe@tmail.com",
			document: "83432616074",
			car_plate: "AAA9999"
		);

		$connection = new PdoAdapter();
		$usecase = new CreateDriverUseCase(new DriverRepositoryDatabase($connection));
		$output = $usecase->execute($input);

		$this->assertNotNull($output->driver_id);
	}
	public function testGetMotorista()
	{
		$input = new CreateDriverInput(
			name: "John Doe",
			email: "jon.doe@tmail.com",
			document: "83432616074",
			car_plate: "AAA9999"
		);

		$connection = new PdoAdapter();
		$usecase = new CreateDriverUseCase(new DriverRepositoryDatabase($connection));
		$output = $usecase->execute($input);

		$this->assertNotNull($output->driver_id);

		$usecase = new GetDriverUseCase(new DriverRepositoryDatabase($connection));
		$driver = $usecase->execute(new GetDriverInput($output->driver_id));

		$this->assertEquals($driver->name, 'John Doe');
	}
}
