<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBlogTable extends Migration
{
    public function up()
    {
        // Create the blogs table
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,  // Ensures the slug is unique
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'image' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'        => true,  // Optional field
            ],
            'image_alt' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'        => true,  // Optional field
            ],
            'meta_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'        => true,  // Optional field
            ],
            'meta_keyword' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'        => true,  // Optional field
            ],
            'meta_description' => [
                'type'       => 'VARCHAR',
                'constraint' => '500',
                'null'        => true,  // Optional field
            ],
            'isEnable' => [
                'type'       => 'TINYINT',
                'constraint' => '1',
                'default'    => 1, // Default to enabled (1)
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true, // Nullable
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true, // Nullable
            ],
        ]);
        
        // Set primary key
        $this->forge->addKey('id', true);

        // Create the table
        $this->forge->createTable('blogs');
    }

    public function down()
    {
        // Drop the blogs table if it exists
        $this->forge->dropTable('blogs');
    }
}
