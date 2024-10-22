<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePoliciesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'max_rental_days' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 5, // default limit set to 5 days
            ],
            'overdue_fee_per_day' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2', // for monetary values
                'default'    => 50.00, // default fee set to $50 per day
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('policies');
    }

    public function down()
    {
        $this->forge->dropTable('policies');
    }
}
