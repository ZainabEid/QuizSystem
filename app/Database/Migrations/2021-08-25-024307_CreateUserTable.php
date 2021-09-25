<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                     'constraint'     => 11,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'name'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'email'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'password'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'is_admin'       => [
                    'type'       => 'BOOLEAN',
                    'defaul' => '0',
            ],
        
           
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
