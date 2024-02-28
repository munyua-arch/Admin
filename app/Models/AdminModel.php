<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table            = 'registered_users';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['username', 'email', 'phone', 'location', 'plan', 'uniid', 'ip_address'];
    protected $returnType       = 'array';
  
    

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    
    public function getLoggedUserData($id)
    {
        $builder = $this->db->table('admin');
        $builder->where('uniid', $id);
        $result = $builder->get();

        if (count($result->getResultArray()) == 1)
        {
                return $result->getRowArray();
        }
        else
        {
            return false;
        }

    }

  public function updatePassword($new_password, $id)
  {
      $builder = $this->db->table('admin');
      $builder->where('uniid', $id);
      
      // Execute the update query
      $builder->update(['password' => $new_password]);
  
      // Check the affected rows
      if ($this->db->affectedRows() > 0) {
          return true;
      } else {
          return false;
      }
  }

  public function updateUserInfo($data, $id)
  {
      $builder = $this->db->table('admin');
      $builder->where('uniid', $id);
      
      // Execute the update query
      $builder->update($data);
  
      // Check the affected rows
      if ($this->db->affectedRows() > 0) {
          return true;
      } else {
          return false;
      }
  }
}
