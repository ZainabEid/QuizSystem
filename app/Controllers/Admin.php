<?php

namespace App\Controllers;

use App\Libraries\Hash;
use App\Models\UserModel;


class Admin extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }

    public function index()
    {
        $userModel = new UserModel();
        $admins =  $userModel->where('is_admin',1)->findAll();  

        $data =[
            'title' => 'Show All Admins',
            'admins' => $admins, 
        ];  
        
        // foreach($admins as $admin){

        //     echo $admin['name'];
        // }
        return view('dashboard/users/admins/index',$data);
    }

    public function create()
    {
        $data =[
            'title' => 'Add New Admin'
        ];

        return view('dashboard/users/admins/create',$data);
    }


    public function store()
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
                'rules' => 'required|valid_email|is_unique[users.email]',
                'errors' => [
                    'required' => 'your name is required',
                    'valid_email' => 'your must enter a valid email',
                    'is_unique' => 'email is already taken',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 5 characters in length',
                    'max_length' => 'Password must not have more than 12 characters in length'
                ]
            ],
            'password_confirmation' => [
                'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                'errors' => [
                    'required' => ' confirm password is required',
                    'min_length' => 'confirm password must have at least 5 characters in length',
                    'max_length' => 'confirm password must not have more than 12 characters in length',
                    'matches' => 'password not match '
                ]
            ],
            

        ]);

        if(!$validation){
            $data =[
                'title' => 'Add New Admin',
                'validation' => $this->validator
            ];
            return view('dashboard/users/admins/create',$data);
        }
        
        // insertion
        $userModel = new UserModel();
        $query = $userModel->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => Hash::make( $this->request->getPost('password')),
            'is_admin'=> true,
        ]);

        if(!$query){
            return redirect()->back()->with('fail','something went wrong');
        }
        
        return redirect()->to('dashboard/users/admins')->with('success','created successfully');

    }


    
    public function edit($admin_id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($admin_id);
        
        $data = [
            'title' => 'Edit Admin',
            'user' => $user,

        ];
        return view('dashboard/users/admins/edit',$data);
    }

   

    public function update($user_id)
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
                'rules' => 'required|valid_email|is_unique[users.email,id,1]',
                'errors' => [
                    'required' => 'your name is required',
                    'valid_email' => 'your must enter a valid email',
                    'is_unique' => 'email is already taken',
                ]
            ],
           

        ]);
         // insertion
         $userModel = new UserModel();
         $user = $userModel->find($user_id);

        if(!$validation){
            $data = [
                'title' => 'Edit Admin',
                'user' => $user,
                'validation' => $this->validator
    
            ];
            return view('dashboard/users/admins/edit',$data);
        }
        

        // updating data
        $data = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => Hash::make( $this->request->getPost('password')),
            'is_admin'=> true,
        ];

        $query = $userModel->update($user_id,$data);

        if(!$query){
            return redirect()->back()->with('fail','something went wrong');
        }
        
        return redirect()->to('dashboard/users/admins')->with('success','updated successfully');

    }

    public function destroy($user_id)
    {
        $userModel = new UserModel();
        $query = $userModel->delete($user_id);

        if(!$query){
            return redirect()->back()->with('fail','something went wrong');
        }
        
        return redirect()->to('dashboard/users/admins')->with('success','deleted successfully');
        
    }
  
}