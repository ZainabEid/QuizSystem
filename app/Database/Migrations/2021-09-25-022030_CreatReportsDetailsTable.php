<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatReportsDetailsTable extends Migration
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
            'report_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'question_id'          => [
                'type'           => 'INT',
                'unsigned'       => true,
            ],
            'user_answer'       => [
                'type'       => 'Int',
                
            ],
            'is_right'       => [
                'type'       => 'Boolean',
                'default'    => 0,
                
            ],
           
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('report_id','reports','id','CASCADE','CASCADE');
        $this->forge->addForeignKey('question_id','questions','id','CASCADE','CASCADE');
        $this->forge->createTable('reports_details');
    }

    public function down()
    {
        $this->forge->dropTable('reports_details');
    }
}
