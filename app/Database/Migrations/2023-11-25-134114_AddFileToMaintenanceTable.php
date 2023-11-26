<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFileToMaintenanceTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('maintenance', [
            'document' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        //
    }
}
