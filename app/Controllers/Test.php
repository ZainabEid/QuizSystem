<?php

namespace App\Controllers;

use App\Models\TestModel;
use App\Models\QuestionModel;


class Test extends BaseController
{
    protected $testModel ;
    protected $questionModel ;
    public function __construct()
    {
        helper(['url','form']);
        $this->testModel = new TestModel();
        $this->questionModel = new QuestionModel();
    }

    public function index()
    {
        $testModel = new TestModel();
        $tests =  $testModel->findAll();  

        $data =[
            'title' => 'Show All Tests',
            'tests' => $tests, 
        ];  
        
       
        return view('dashboard/tests/index',$data);
    }


    public function create()
    {
        $data =[    
            'title' => 'Add New Test'
        ];

        return view('dashboard/tests/create',$data);
    }
    public function validation()
    {
         // validation
        // $validation = $this->validate([
        //     'name' => [
        //         'rules' => 'required',
        //         'errors' => [
        //             'required' => 'Test Name is required'
        //         ]
        //     ],
        //     'questions[0][body]' =>[
        //         'rules' =>'required',
        //         'errors' =>[
        //             'required' => 'the first question is required',
        //         ] 
        //     ],
        //     'questions[0][answers][]' =>[
        //         'rules' =>'required|exact_length:4',
        //         'errors' => [
        //             'required' => ' Four answers is required',
        //             'exact_length' => 'you should enter 4 answers'
        //         ]
        //     ],
        //     'questions[0][correct_answer]' =>[
        //         'rules' =>'required|in_list:1,2,3,4',
        //         'errors' => [
        //             'required' => ' The correct answer is required',
        //             'in_list' => 'you should choose one from the four answers'
        //         ]
        //     ],
        //     // need to generize the validation to all questions
        //     'questions[][body]' =>[
        //         'rules' =>'required',
        //         'errors' => [
        //             'required' => 'the question body  is required',
        //         ]
        //     ],

          
            
        // ]);

        // if(!$validation){
        //     $data =[
        //         'title' => 'Add New Test',
        //         'validation' => $this->validator
        //     ];
        //     // dd($data);
        //     return view('dashboard/tests/create',$data);
        // }

    }


    public function store()
    {
        // dd($this->request->getPost());
        //    $this->validataion;
        
        
        $data =[
            'name' =>  $this->request->getPost('name'),
            'questions' =>$this->request->getPost('questions')
        ];

        // insertion

        // insert test
        $test_id = $this->testModel->insert([
            'name' =>$data['name'],
        ]);

        if(! $test_id){
            return redirect()->back()->with('fail','something went wrong');
        }

        // insert questions
        foreach( $data['questions'] as $index => $question ){

            // single question insertion
            
            $query = $this->questionModel->insert([
                  'test_id' => $test_id,
                  'body' => $question['body'],
                  'answer1' => $question['answer1'],
                  'answer2' =>  $question['answer2'],
                  'answer3' =>  $question['answer3'],
                  'answer4' =>  $question['answer4'],
                  'correct_answer' =>  $question['correct_answer'],
            ]);
            if(! $query){
                return redirect()->back()->with('fail','something went wrong');
            }
         }

       

        return redirect()->to('dashboard/tests')->with('success','created successfully');

        

    }


    
    public function edit($test_id)
    {
        $test = $this->testModel->find($test_id);
        $test['questions'] = $this->questionModel->where('test_id',$test_id)->findAll();
        // dd($test['questions']);
        $data = [
            'title' => 'Edit Test',
            'test' => $test,
        ];

        return view('dashboard/tests/edit', $data);
    }

   

    public function update($test_id)
    {
        // dd($this->request->getPost());
        $data =[
            'name' =>  $this->request->getPost('name'),
            'questions' =>$this->request->getPost('questions')
        ];

        // updating test data

        // update test
        $test_id = $this->testModel->update($test_id,[
            'name' =>$data['name'],
        ]);

        if(! $test_id){
            return redirect()->back()->with('fail','something went wrong');
        }

        // insert questions
        foreach( $data['questions'] as $index => $question ){

            // single question updating
            $query = $this->questionModel->update($question['id'],[
                  'body' => $question['body'],
                  'answer1' => $question['answer1'],
                  'answer2' =>  $question['answer2'],
                  'answer3' =>  $question['answer3'],
                  'answer4' =>  $question['answer4'],
                  'correct_answer' =>  $question['correct_answer'],
            ]);
            if(! $query){
                return redirect()->back()->with('fail','something went wrong');
            }
         }

       

        return redirect()->to('dashboard/tests')->with('success','updated successfully');

    }

    public function destroy($test_id)
    {
        $questionModel = new QuestionModel();
        $q = $questionModel->where('test_id',$test_id)->delete();

        $testModel = new TestModel();
        $query = $testModel->delete($test_id);

        if(!$query){
            return redirect()->back()->with('fail','something went wrong');
        }
        
        return redirect()->to('dashboard/tests')->with('success','deleted successfully');
        
    }

    public function question($index)
    {
        $data = [
            'index' => $index ,
        ];
        return view('dashboard/tests/_question',$data);
    }
  
}