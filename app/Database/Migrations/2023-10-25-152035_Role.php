<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Role extends Migration
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
                'constraint' => '45',
            ],
            'timestamp' => [
                'type'       => 'datetime',
                'null' => true,
            ],
            // Tambahkan kolom lain sesuai kebutuhan Anda.
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('role');
    }

    public function down()
    {
        $this->forge->dropTable('role');
    }
}
