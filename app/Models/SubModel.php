<?php

namespace App\Models;

use CodeIgniter\Model;

class SubModel extends Model
{
    protected $table            = 'renewed_subs';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $allowedFields    = ['username', 'phone', 'plan', 'amount', 'updated_at'];


}
