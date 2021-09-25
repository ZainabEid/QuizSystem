<?php

namespace App\Models;

use CodeIgniter\Model;



class TestModel extends Model
{

   protected $table ="tests";
   protected $primaryKey="id";

   protected $useAutoIncrement = true;

    protected $returnType     = 'array';
   //  protected $useSoftDeletes = true;

   protected $allowedFields = ['name'];



   public function AddTest($data)
   {
      $this->db = db_connect();
      $this->db->trans_start();

      $test_id = $this->insert([
         'name' =>$data['name'],
         
      ]);

      //   $test_id =$this->id;

      //   dd($query);
      // question array loop
      foreach( $data['questions'] as $index => $question ){

         // single question insertion
         $questionModel = new QuestionModel();
         $query = $questionModel->insert([
               'test_id' => $test_id,
               'body' => $question['body'],
               'answer1' => $question['answer1'],
               'answer2' =>  $question['answer2'],
               'answer3' =>  $question['answer3'],
               'answer4' =>  $question['answer4'],
               'correct_answer' =>  $question['correct_answer'],
         ]);
      }

        
      // $this->db->trans_complete();

      if( $this->db->trans_status() === FALSE )
      {
         //rollback
         $this->db->trans_rollback();
         return ( 0 );
      }
      else
      {
         // commit to db
         $this->db->trans_commit();
         return $test_id;
      }
   }

   public function TestWithQuestions($test_id)
   {
      $db = \Config\Database::connect('default');
      $builder = $db->table('tests');
      $builder->select('*');
      $builder->join('questions', 'questions.test_id = tests.id');
      $builder->where('test_id',$test_id);
      $tests = $builder->get();

      return $tests->getFirstRow();
      
   }

   public function questions($test_id)
   {
      $db = \Config\Database::connect('default');
      $builder = $db->table('questions');
      $builder->select('*');
      $builder->join('tests', 'tests.id = questions.test_id');
      $builder->where('test_id',$test_id);
      $questions = $builder->get();
      return $questions;
      
   }



}