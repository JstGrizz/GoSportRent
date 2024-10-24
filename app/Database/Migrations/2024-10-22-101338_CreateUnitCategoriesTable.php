<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUnitCategoriesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'unit_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 10,
                'unsigned' => true,
            ]
        ]);

        $this->forge->addKey('unit_id', false);
        $this->forge->addKey('category_id', false);

        $this->forge->addForeignKey('unit_id', 'units', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('unit_categories');
    }

    public function down()
    {
        $this->forge->dropTable('unit_categories');
    }
}
