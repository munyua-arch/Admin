<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RegisterModel;

class Register extends BaseController
{
    public $registerModel;

    public function __construct()
    {
        helper(['form', 'test_helper']);
        $this->registerModel = new RegisterModel();
    }

    public function index()
    {   
        
        $data = [];
        $data['validation'] = null;

        $rules = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|exact_length[12]',
            'password' => 'required|min_length[5]|max_length[15]',
            'confirm_password' => 'required|matches[password]'
        ];

        if ($this->request->getMethod() == 'post') 
        {
            if ($this->validate($rules)) 
            {
                //create a unique id for admin
                $uniid = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz'.time()));
 
               $formData = [
                'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
                'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
                'phone' => $this->request->getVar('phone', FILTER_SANITIZE_STRING),
                'password' => password_hash( $this->request->getVar('password'), PASSWORD_BCRYPT),
                'uniid' => $uniid
               ];

               //save the info to db 
               $saved = $this->registerModel->insert($formData);

               if ($saved) 
               {
                    session()->setTempdata('reg_success', 'Admin account created successfully!');
                    return redirect()->to(base_url().'/login');
               }
               else
               {
                session()->setTempdata('reg_error', 'Failed to create an account. please try again!');
                return redirect()->to(current_url());
               }
               
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('register_view', $data);
    }
}
