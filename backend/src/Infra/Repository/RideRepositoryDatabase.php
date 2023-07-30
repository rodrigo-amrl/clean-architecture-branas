<?php

namespace Src\Infra\Repository;

use Src\Application\Repository\RideRepository;
use Src\Domain\Coord;
use Src\Domain\Ride;
use Src\Infra\database\DatabaseConnectionInterface;

class RideRepositoryDatabase implements RideRepository
{


	public function __construct(protected DatabaseConnectionInterface $connection)
	{
	}

	public function save(Ride $ride): void
	{
		return  $this->connection->query(
			"insert into cccat12.ride (ride_id, passenger_id, from_lat, from_long, to_lat, 
		to_long, status, request_date) values ($1, $2, $3, $4, $5, $6, $7, $8)",
			[
				$ride->ride_id, $ride->passenger_id, $ride->from->lat, $ride->from->long,
				$ride->to->lat, $ride->to->long, $ride->status->value, $ride->request_date
			]
		);
	}

	public function  get(string $ride_id): Ride
	{
		$ride_data = $this->connection->query("select * from cccat12.ride where ride_id = $1", [$ride_id]);
		$ride = new Ride(
			$ride_data->ride_id,
			$ride_data->passenger_id,
			new Coord(
				floatval($ride_data->from_lat),
				floatval($ride_data->from_long)
			),
			new Coord(
				floatval($ride_data->to_lat),
				floatval($ride_data->to_long)
			),
			$ride_data->status,
			$ride_data->request_date
		);
		$ride->driver_id = $ride_data->driver_id;
		$ride->accept_date = $ride_data->accept_date;
		$ride->start_date = $ride_data->start_date;
		$ride->end_date = $ride_data->end_date;
		return $ride;
	}

	public function update(Ride $ride): void
	{
		$this->connection->query("update cccat12.ride set driver_id = $1, status = $2, accept_date = $3, start_date = $4, end_date = $5 where ride_id = $6", [$ride->driverId, $ride->status . value, $ride->acceptDate, $ride->startDate, $ride->endDate, $ride->rideId]);
	}
}
