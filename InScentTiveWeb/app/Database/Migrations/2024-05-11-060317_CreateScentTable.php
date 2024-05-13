<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateScentTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'scent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'qty' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2', // 10 digits in total, 2 after the decimal point
                'unsigned' => true,
            ],
       
        ]);
        $this->forge->addKey('scent_id', true);
        $this->forge->createTable('scent', true, ['ENGINE' => 'InnoDB']);
    }

    public function down()
    {
        $this->forge->dropTable('scent');
    }
}
