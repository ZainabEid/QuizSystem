<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Hash;


class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function save()
    {
        // validation
        // $validation = $this->validate([
        //     'name' => 'required',
        //     'email' => 'required|valid_email|is_unique[users.email]',
        //     'password'=>'required|min_length[5]|max_length[12]',
        //     'password_confirmation'=>'required|min_length[5]|max_length[12]|matches[password]'

        // ]);

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
            return view('auth/register',['validation' => $this->validator]);
        }else{
            // echo 'Form validated successfully';

            $userModel = new UserModel();
            $query = $userModel->insert([
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'password' => Hash::make( $this->request->getPost('password')),
            ]);
            if(!$query){
                return redirect()->back()->with('fail','something went wrong');
                // return redirect()->to('register')->with('fail','something went wrong');
            }else{
                // return redirect()->to('auth/register')->with('success','registered successfully');

                $last_id  = $userModel->insertID();
                $user = $userModel->find( $last_id);
                
                session()->set('loggedUser',$user);
                return redirect()->to('/dashboard');  
            }
        }
    }

    public function check()
    {

        // validation
        $validation = $this->validate([
            'email'=> [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' =>[
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This email is not registered in our service'
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

        ]);

        // validation errors
        if(!$validation){
            return view('auth/login',['validation' => $this->validator]);
        }


        // collecting user data
        $email =  $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // check authentication
        $userModel = new UserModel();
        $user_info = $userModel->where('email', $email)->first();
        $check_password = Hash::check($password, $user_info['password']);

       
        // Incorrect password
        if(! $check_password){
            session()->setFlashdata('fail','Incorrect password');
            return redirect()->to('/auth')->withInput();
        }
        
        //store user in session
        session()->set('loggedUser', $user_info);

        // check admin or user for redirction
        if($user_info['is_admin'] == 1){

            return redirect()->to('/dashboard');
        }
            
        return redirect()->to('/home');

        
    }
     
    public function logout()
    {
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail','you are logged out !');
        }
    }
}