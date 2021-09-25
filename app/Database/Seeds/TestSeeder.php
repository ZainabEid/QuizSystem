<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $testModel = model('TestModel');

        $test_id = $testModel->insert([
                'name'      => 'English Test',
        ]);

        $questionModel = model('QuestionModel');

        $questionModel->insertBatch([
            0=> [
                'test_id' => $test_id,
                'body' => 'how many letters in english ?',
                'answer1' => '32',
                'answer2' =>  '28',
                'answer3' =>  '26',
                'answer4' =>  '20',
                'correct_answer' =>  '3',
            ],
            2=> [
                'test_id' => $test_id,
                'body' => 'what is the 8th letter in English ?',
                'answer1' => 'C',
                'answer2' =>  'F',
                'answer3' =>  'N',
                'answer4' =>  'H',
                'correct_answer' =>  '4',
            ],
            3=> [
                'test_id' => $test_id,
                'body' => 'What is [She] word refers to ?',
                'answer1' => 'a cat',
                'answer2' =>  'a girl',
                'answer3' =>  'a table',
                'answer4' =>  'a boy',
                'correct_answer' =>  '2',
            ],
        ]);
    }
}
