<?php

namespace App\Controllers\Site;

use App\Controllers\BaseController;
use App\Libraries\Hash;
use App\Models\UserModel;


class User extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['url','form']);
    }

  
    public function edit()
    {
        $user = $this->userModel->find(auth_user()['id']);
        
        $data = [
            'title' => 'Edit User',
            'user' => $user,
        ];

        return view('site/user/edit',$data);
    }

   

    public function update()
    {

        // validation
        $validation = $this->validate([
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'your name is required'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[users.email,id,'.auth_user()['id'].']',
                'errors' => [
                    'required' => 'your name is required',
                    'valid_email' => 'your must enter a valid email',
                    'is_unique' => 'email is already taken',
                ]
            ],
           

        ]);

        // return validation errors
        if(!$validation){

            $data = [
                'title' => 'Edit User',
                'validation' => $this->validator
                
            ];

            return view('site/user/edit',$data);
        }
        
        $user = auth_user();

        // handling password
        $password = $this->request->getPost('password') ?  Hash::make( $this->request->getPost('password')) : $user['password'];
      
      
        // updating data
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' =>  $password,
            'is_admin'=> false,
        ];

        
        $query = $this->userModel->update(auth_user()['id'],$data);

        if(!$query){
            return redirect()->back()->with('fail','something went wrong');
        }
        
        return redirect()->to('site/user/profile')->with('success','updated successfully');

    }

   

    public function profile()
    {
        $data = [
            'title' => 'My Profile',
        ];

        return view('site/user/profile', $data);
    }
   
  
}