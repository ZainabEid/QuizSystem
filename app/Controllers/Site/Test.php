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

      $report_id = $this->reportModel->create($test_id, $this->request->getPost('questions'));


        return redirect()->to('site/tests/'.$test_id.'/review/'.$report_id);
    }


    // review the report
    public function review($test_id, $report_id)
    {
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