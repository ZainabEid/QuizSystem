<?php

namespace App\Models;

use CodeIgniter\Model;



class ReportDetailsModel extends Model
{
   protected $table      = 'reports_details';
   protected $primaryKey = 'id';

   protected $useAutoIncrement = true;

   protected $returnType     = 'array';
   // protected $useSoftDeletes = true;

   protected $allowedFields = [ 'report_id', 'question_id', 'user_answer', 'is_right' ];

   // protected $useTimestamps = false;
   // protected $createdField  = 'created_at';
   // protected $updatedField  = 'updated_at';
   // protected $deletedField  = 'deleted_at';

   // protected $validationRules    = [];
   // protected $validationMessages = [];
   // protected $skipValidation     = false;




}