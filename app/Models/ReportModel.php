<?php

namespace App\Models;

use CodeIgniter\Model;



class ReportModel extends Model
{
   protected $table      = 'reports';
   protected $primaryKey = 'id';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

   protected $allowedFields = ['user_id', 'test_id','grade' ];

   protected $useTimestamps = false;
   protected $createdField  = 'created_at';
   protected $updatedField  = 'updated_at';
   protected $deletedField  = 'deleted_at';

   protected $validationRules    = [];
   protected $validationMessages = [];
   protected $skipValidation     = false;
   
   protected $reportDetailsModel;
   protected $questionModel;


   public function __construct()
   {
      parent::__construct();
      $this->reportDetailsModel = new ReportDetailsModel();
      $this->questionModel = new QuestionModel();
   }// end construct


   // creating report
   public function create($test_id,$questions)
   {
      // init the test report
      $report_id = $this->insert([
         'user_id' => auth_user()['id'],
         'test_id' => $test_id,
         'grade' => 0,
      ]);
      
      
      
      //check the correction of answers & store report details
     foreach($questions as $question_id => $answer){

         $question =  $this->questionModel->find($question_id);
         
         $this->reportDetailsModel->insert([
             'report_id' => $report_id,
             'question_id' => $question_id,
             'user_answer' => $answer,
             'is_right' => $question['correct_answer'] == $answer,
         ]);
     }

    
     // update the grade in the report
     $this->update($report_id,[
         'grade'=> $this->calculate_grade($test_id, $report_id),
     ]);

     
     return $report_id;
   }
   // end creating report

   public function calculate_grade($test_id, $report_id)
   {
      // calculate grade
      $right_count = $this->reportDetailsModel->where('report_id',$report_id)->where('is_right',1)->countAllResults();
      $question_count = $this->questionModel->where('test_id',$test_id)->countAllResults();

      return $grade = (int)($right_count / $question_count * 100);

   }


}