<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Models\TestModel;
use App\Models\QuestionModel;
use App\Models\ReportModel;
use App\Models\ReportDetailsModel;


class Test extends BaseController
{
    protected $testModel ;
    protected $questionModel ;
    protected $reportModel;
    protected $reportDetailsModel;


    public function __construct()
    {
        helper(['url','form']);
        $this->testModel = new TestModel();
        $this->questionModel = new QuestionModel();
        $this->reportModel = new ReportModel();
        $this->reportDetailsModel = new ReportDetailsModel();
    }

    public function take($test_id)
    {
       $test = $this->testModel->find($test_id);
       
       $test['questions'] = $this->questionModel->where('test_id',$test_id)->findAll();
       
       $data = [
           'title' => 'Test Page',
           'test' => $test,
       ];


       return view('site/tests/take',$data);
    }

    public function check($test_id)
    {
        // // validation
        // $validation = $this->validate([
        //     'questins[]' => 'required',
        // ]);
        
        // if(!$validation){
        //     $test = $this->testModel->find($test_id);
        //     $test['questions'] = $this->questionModel->where('test_id',$test_id)->findAll();
        //     $data = [
        //         'title' => 'Test Page',
        //         'test' => $test,
        //         'validation' => $this->validator,
        //     ];
     
        //     return view('site/tests/take',$data);
        // }

        $user_id =  auth_user()['id'];
        $questions = $this->request->getPost('questions');
        // init the test report
        $report_id = $this->reportModel->insert([
            'user_id' => $user_id,
            'test_id' => $test_id,
            'grade' => 0,
        ]);

        //check the correction of answers & store report details
        foreach($questions as $question_id => $answer){

            $question =  $this->questionModel->find($question_id);

            $is_right = ($question['correct_answer'] == $answer) ? 1 : 0;
            
            $this->reportDetailsModel->insert([
                'report_id' => $report_id,
                'question_id' => $question_id,
                'user_answer' => $answer,
                'is_right' => $is_right
            ]);
        }

        // calculate grade
        $right_count = $this->reportDetailsModel->where('report_id',$report_id)->where('is_right',1)->countAllResults();
        $question_count = $this->questionModel->where('test_id',$test_id)->countAllResults();

        $grade = $right_count / $question_count * 100;

        // update the grade in the report
        $this->reportModel->update($report_id,[
            'grade'=>$grade,
        ]);

        
        // review the report
        $test = $this->testModel->find($test_id);
        $test['questions'] = $this->questionModel->where('test_id',$test_id)->findAll();

        $report = $this->reportModel->find($report_id);
        $report['details'] = $this->reportDetailsModel->where('report_id',$report_id)->findAll();

        $data =[
            'title' => 'Report Page',
            'test' => $test,
            'report' => $report,
        ];

        return view('site/tests/review',$data);

    }


   

  
}