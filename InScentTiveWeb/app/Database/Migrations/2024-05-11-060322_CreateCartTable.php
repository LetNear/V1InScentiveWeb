<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartTable extends Migration
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
                'constraint' => 11,
                'unsigned' => true,
            ],
            'scent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'default' => 1
            ]
        ]);

        $this->forge->addPrimaryKey('id');
        // Add foreign key constraints
        $this->forge->addForeignKey('user_id', 'user', 'userID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('scent_id', 'scent', 'scent_id', 'CASCADE', 'CASCADE');

        // Create the table
        $this->forge->createTable('cart');
    }

    //--------------------------------------------------------------------

    public function down()
    {
        // Drop the table
        $this->forge->dropTable('cart');
    }
}
