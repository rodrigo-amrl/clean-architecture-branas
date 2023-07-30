<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateRideMigration extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('riders', ['id' => false, 'primary_key' => ['rider_id']]);
        $table->addColumn('rider_id', 'uuid', ['null' => false])
            ->addColumn('passenger_id', 'uuid')
            ->addColumn('driver_id', 'uuid')
            ->addColumn('from_lat', 'float')
            ->addColumn('from_long', 'float')
            ->addColumn('to_lat', 'float')
            ->addColumn('to_long', 'float')
            ->addColumn('status', 'string', ['limit' => 20])
            ->addColumn('request_date', 'timestamp')
            ->addColumn('accept_date', 'timestamp')
            ->addColumn('start_date', 'timestamp')
            ->addColumn('end_date', 'timestamp')
            ->addColumn('price', 'float')
            ->addColumn('created_a', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('updated_at', 'timestamp', ['default' => 'CURRENT_TIMESTAMP'])
            ->create();
    }
}
