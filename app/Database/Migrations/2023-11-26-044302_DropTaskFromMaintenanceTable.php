<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DropTaskFromMaintenanceTable extends Migration
{
    public function up()
    {
        $this->forge->dropColumn('maintenance', 'task'); // to drop one single column
    }

    public function down()
    {
        //
    }
}
