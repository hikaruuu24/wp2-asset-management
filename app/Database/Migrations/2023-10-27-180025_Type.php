<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Type extends Migration
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
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'timestamp' => [
                'type'       => 'datetime',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('type');
    }

    public function down()
    {
        $this->forge->dropTable('type');
    }
}
