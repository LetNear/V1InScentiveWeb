<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCartTable extends Migration
{
 // In CreateCartTable migration
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
            'default' => 1, // Set a default value if needed
        ],
    
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('user_id','user','userID'); // Updated table name to 'user' and referenced column to 'userID'
    $this->forge->addForeignKey('scent_id','scent','id'); // Updated table name to 'scent' and referenced column to 'id'
    $this->forge->createTable('cart', true, ['ENGINE' => 'InnoDB']); // Added 'ENGINE' option to specify InnoDB engine
}

public function down()
{
    $this->forge->dropTable('cart');
}

}
