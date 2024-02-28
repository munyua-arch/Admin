<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    public function verifyEmail($email)
    {
        $builder = $this->db->table('admin');
        $builder->select(['username', 'email', 'phone', 'uniid', 'status', 'password']);
        $builder->where('email', $email);
        $res = $builder->get();

        if (count($res->getResultArray()) == 1) 
        {
            return $res->getRowArray();
        }
        else
        {
            return false;
        }
    }

    public function updatedAt($id)
    {
          $builder = $this->db->table('admin');
          $builder->where('uniid', $id);
          $builder->update(['updated_at' => date('Y-m-d h:i:s')]);

          if($this->db->affectedRows() == 1)
          {
              return true;
          }
          else
          {
              return false;
          }
    }

    public function verifyToken($token)
    {
        $builder = $this->db->table('admin');
        $builder->select(['username', 'uniid', 'updated_at']);
        $builder->where('uniid', $token);
        
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

    public function updatePassword($id, $password)
    {
        $builder = $this->db->table('admin');
        $builder->where('uniid', $id);
        
        // Execute the update query
        $builder->update(['password' => $password]);
    
        // Check the affected rows
        if ($this->db->affectedRows() > 0) {
            return true;
        } else {
            return false;
        }
    }

 
}
