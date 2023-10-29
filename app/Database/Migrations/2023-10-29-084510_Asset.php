<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Asset extends Migration
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
            'purchase_date' => [
                'type' => 'date',
                'null' => true,
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'description' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'type_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => true,
            ],
            'timestamp' => [
                'type' => 'datetime',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('asset');
    }

    public function down()
    {
        $this->forge->dropTable('asset');
    }
}
