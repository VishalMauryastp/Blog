<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'              => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title'           => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug'            => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true, // Ensure slug is unique
            ],
            'content'         => [
                'type' => 'TEXT',
            ],
            'image'           => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true, // Allow null values
            ],
            'image_alt'       => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true, // Allow null values
            ],
            'isEnable'        => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1, // Default to enabled
            ],
            'meta_title'      => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true, // Allow null values
            ],
            'meta_keyword'    => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true, // Allow null values
            ],
            'meta_description' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true, // Allow null values
            ],
            'created_at'      => [
                'type' => 'DATETIME',
                'null' => true, // Allow null values
            ],
            'updated_at'      => [
                'type' => 'DATETIME',
                'null' => true, // Allow null values
            ],
        ]);

        // Set the primary key
        $this->forge->addKey('id', true); 

        // Create the posts table
        $this->forge->createTable('posts'); 
    }

    public function down()
    {
        // Drop the posts table if it exists
        $this->forge->dropTable('posts'); 
    }
}
