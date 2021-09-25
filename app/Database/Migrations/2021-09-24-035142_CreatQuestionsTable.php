<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatQuestionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'=>[
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'test_id'          => [
                    'type'           => 'INT',
                    'unsigned'       => true,
            ],
            'body'       => [
                    'type'       => 'VARCHAR',
                    'constraint' => '100',
            ],
            'answer1' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ],
            'answer2' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ],
            'answer3' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ],
            'answer4' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ],
            'correct_answer' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ],
    ]);
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('test_id','tests','id','CASCADE','CASCADE');
    $this->forge->createTable('questions');
    
}

public function down()
{
    $this->forge->dropTable('questions');
}
}
