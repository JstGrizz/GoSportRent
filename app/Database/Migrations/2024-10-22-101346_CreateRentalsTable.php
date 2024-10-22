<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRentalsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'unit_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false
            ],
            'rental_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'return_date' => [
                'type' => 'DATE',
                'null' => false
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['rented', 'returned'],
                'default' => 'rented'
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('unit_id', 'units', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('rentals');
    }

    public function down()
    {
        $this->forge->dropTable('rentals');
    }
}
