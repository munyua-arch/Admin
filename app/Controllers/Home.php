<?php

namespace App\Controllers;
use App\Models\LoginModel;

class Home extends BaseController
{
    public $loginModel;
    public $session;

    public function __construct()
    {
        helper('form');
        helper('test_helper');
        $this->loginModel = new LoginModel();
        $this->session = session();
    }

public function index()
{
    return view('test_form_view');
}

    public function loginForm()
    {
        $data = [];
        $data['validation'] = null;

        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required|min_length[5]|max_length[15]'
        ];

        if ($this->request->getMethod() == 'post') 
        {
            if ($this->validate($rules)) 
            {
               /*check if email is valid in db
                *check if password matches one in db
                *check is user status is active
                *create login session with user's uniid
                */

                $formData = [
                    'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
                    'password' => $this->request->getVar('password', FILTER_SANITIZE_STRING)
                    ];
    
                    
                    $userdata = $this->loginModel->verifyEmail($formData['email']);
                    
                  

                  if ($userdata) 
                  {
                        if(password_verify($formData['password'], $userdata['password']))
                        {
                            if ($userdata['status'] == 'active') 
                            {
                                //create a login session
                                $this->session->set('logged_user', $userdata['uniid']);
                                return redirect()->to(base_url().'/dashboard');
                            }
                            else
                            {
                                session()->setTempdata('login_error', 'Your account is inactive!');
                                return redirect()->to(current_url());
                            }
                        }
                        else{
                           session()->setTempdata('login_error', 'Wrong Email or Password!');
                           return redirect()->to(current_url());
                        }
                  }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }



        return view('login_view', $data);
    }

  


    public function forgotPassword()
    {
        $data = [];
        $data['validation'] = null;

        $rules = [
            'email' => 'required|valid_email'
        ];

        if ($this->request->getMethod() == 'post') 
        {
            if ($this->validate($rules)) 
            {
                //take email from form and verify its existence
                $email = $this->request->getVar('email', FILTER_SANITIZE_STRING);
                $userdata = $this->loginModel->verifyEmail($email);

                if (!empty($userdata)) 
                {
                    if ($this->loginModel->updatedAt($userdata['uniid'])) 
                    {
                        
                        $to = $email;
                        $subject = "Reset Password Link";
                        $token = $userdata['uniid'];
                        $message = "Hi ".$userdata['username']."<br><br>"
                            ."Your reset password request has been received. Please click the link below "
                            ."to reset your password.<br><br>"
                            ."<a href='".base_url()."/reset-password/(:any)".$token."'>Reset Password</a>";

                        $email = \Config\Services::email();
                        $email->setTo($to);
                        $email->setFrom('info@pichsafe.com', 'Raha Internet');
                        $email->setSubject($subject);
                        $email->setMessage($message);


                        //check if email is sent
                        if ($email->send()) 
                        {
                            $this->session->setTempdata('forgot_success', 'A Password reset link has been sent to your email', 3);
                           
                            return redirect()->to(current_url());
                        }
                        else
                        {
                            $this->session->setTempdata('forgot_error', 'Failed to send email. Please try again.', 3);
                           
                            return redirect()->to(current_url());
                        }
                        
                    }
                    else
                    {
                        $this->session->setTempdata('forgot_error', 'Failed to update', 3);
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    $this->session->setTempdata('forgot_error', 'Email does not exist', 3);
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }



        return view('forgot_password_view', $data);
    }


    public function resetPassword($token=null)
    {
        $data = [];
        $data['validation'] = null;

        if ($this->request->getMethod() == 'post') 
        {
            if (!empty($token)) {
                //verfiy the token 
                $userdata = $this->loginModel->verifyToken($token);

                if (!empty($userdata)) 
                {
                    if ($this->checkExpiryDate($userdata['updated_at'])) 
                    {
                        //collect form data and change the user password
                        if ($this->request->getMethod() == 'post') 
                        {
                            $rules = [
                                'password' => 'required|min_length[5]|max_length[15]',
                                'confirm_password' => 'required|matches[password]'
                            ];
                            
                            if ($this->validate($rules)) 
                            {
                                $password = password_hash($this->request->getVar('password'), PASSWORD_BCRYPT);

                                if ($this->loginModel->updatePassword($userdata['uniid'],$password))
                                {
                                    session()->setTempdata('reset_success', 'Password reset successfully');
                                    // return redirect()->to(base_url().'login/');
                                }
                                else
                                {
                                    session()->setTempdata('reset_error', 'Failed to reset Password, please try again!');
                                    return redirect()->to(current_url());
                                }
                            }   
                            else
                            {
                                $data['validation'] = $this->validator;
                            } 
                        }
                        
    
                    }
                    else
                    {
                        $data['error'] = "Reset password link has expired.";
                    }
                }
                else
                {
                    $data['error'] = "Unable to find your account.";
                }
                
            }
            else
            {
                $data['error'] = "Sorry, Invalid Access.";
            }
        }


        return view('reset_view', $data);
    }


    public function checkExpiryDate($time)
    {
        $update_time = strtotime($time);
        $current_time = time();
        $time_diff = ($current_time - $update_time)/60;

        if ($time_diff < 900) 
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
