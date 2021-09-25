<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatReportsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    // 'constraint'     => 5,
                    'unsigned'       => true,
                    'auto_increment' => true,
            ],
            'test_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'grade'       => [
                'type'       => 'Int',
                
            ],
            'created_at' => array('type' => 'timestamp'),
           
           
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id','users','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('test_id','tests','id','CASCADE','CASCADE');
        $this->forge->createTable('reports');
    }

    public function down()
    {
        $this->forge->dropTable('reports');
    }
}
