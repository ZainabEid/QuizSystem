<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Libraries\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $model = model('UserModel');

        

        // super teacher account
        $model->insert([
                'name'      => 'Super Teacher',
                'email'      => 'super_teacher@Quizsystem.com',
                'password' => Hash::make('password'),
                'is_admin' => 1,
        ]);

        // student account
        $model->insert([
                'name'      => 'Sarah Mossa',
                'email'      => 'sarah_mossa@gmail.com',
                'password' => Hash::make('password'),
                'is_admin' => 0,
        ]);
    }

      
}
