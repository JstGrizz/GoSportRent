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
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'unit_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'rental_date' => [
                'type' => 'DATE',
            ],
            'return_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'days_rented' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'cost' => [
                'type' => 'DECIMAL',
                'constraint' => '15,0',
                'null' => true,
            ],
            'amount' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
            'status_rent' => [
                'type' => 'ENUM',
                'constraint' => ['waiting_approval', 'rented', 'waiting_return', 'returned', 'rejected'],
                'default' => 'waiting_approval',
            ],
            'status_paid' => [
                'type' => 'ENUM',
                'constraint' => ['unpaid', 'paid', 'paid_with_fee'],
                'default' => 'unpaid',
            ],
            'approved_rent_by' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'approved_return_by' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'rejected_by' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('unit_id', 'units', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('approved_rent_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('approved_return_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('rejected_by', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('rentals');
    }

    public function down()
    {
        $this->forge->dropTable('rentals');
    }
}
