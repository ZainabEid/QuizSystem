<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TestModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->testModel = new TestModel();
    }
    
    public function index()
    {
        $users_count = $this->userModel->where('is_admin',0)->countAllResults();
        $tests_count = $this->testModel->countAll();

        $data = [
            'title' => 'dashboard',
            'tests_count' =>   $tests_count,
            'users_count' =>  $users_count,
        ];
        return view('dashboard/index',$data);
    }

    public function profile()
    {
        $data = [
            'title' => 'Profile',
        ];
        return view('dashboard/users/admins/profile',$data);
    }
}