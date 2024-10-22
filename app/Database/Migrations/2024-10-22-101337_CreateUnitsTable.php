<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUnitsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'unit_code' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'unique' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'stock' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'cost_rent_per_day' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00,
            ],
            'cost_rent_per_month' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => 0.00,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('units');
    }


    public function down()
    {
        $this->forge->dropTable('units');
    }
}
