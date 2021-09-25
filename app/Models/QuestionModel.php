<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Hash;


class QuestionModel extends Model
{
   protected $table ="questions";
   protected $primaryKey="id";
   protected $useAutoIncrement = true;

    protected $returnType     = 'array';
   //  protected $useSoftDeletes = true;

   protected $allowedFields = ['test_id','body','answer1','answer2','answer3','answer4','correct_answer'];

   public function test()
   {
      $this->db->select('*');
      $this->db->from('questions');
      $this->db->join('tests', 'tests.id = questions.test_id');
      $test = $this->db->get();
      
      return $test;
      
   }

}