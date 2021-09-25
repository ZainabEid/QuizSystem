<?php

namespace App\Controllers;

use App\Models\TestModel;

class Home extends BaseController
{
    public function index()
    {
        $testModel = new TestModel();
        $tests = $testModel->findAll();
        $data =[
            'title' => 'Home',
            'tests' => $tests,
           
        ];  
        return view('site/index', $data);
    }
}
