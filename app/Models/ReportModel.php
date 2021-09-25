<?php

namespace App\Models;

use CodeIgniter\Model;



class ReportModel extends Model
{
   protected $table      = 'reports';
   protected $primaryKey = 'id';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

   protected $allowedFields = ['user_id', 'test_id','grade' ];

   protected $useTimestamps = false;
   protected $createdField  = 'created_at';
   protected $updatedField  = 'updated_at';
   protected $deletedField  = 'deleted_at';

   protected $validationRules    = [];
   protected $validationMessages = [];
   protected $skipValidation     = false;




}