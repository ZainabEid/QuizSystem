<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\Hash;


class UserModel extends Model
{
   protected $table ="users";
   protected $primaryKey="id";
   protected $useAutoIncrement = true;

    protected $returnType     = 'array';
   //  protected $useSoftDeletes = true;

   protected $allowedFields = ['name','email','password','is_admin'];



}