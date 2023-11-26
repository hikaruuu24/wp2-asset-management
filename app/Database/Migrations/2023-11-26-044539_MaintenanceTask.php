<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class MaintenanceTask extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'maintenance_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'task' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'timestamp' => [
                'type'       => 'datetime',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('maintenance_task');
    }

    public function down()
    {
        $this->forge->dropTable('maintenance_task');
        
    }
}
