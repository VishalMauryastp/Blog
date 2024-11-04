<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blogs');
    }


    public function down()
    {
        //
    }
}
