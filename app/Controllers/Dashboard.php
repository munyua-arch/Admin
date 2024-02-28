<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\AdminModel;
use App\Models\SubModel;

class Dashboard extends BaseController
{
 
            public $adminModel, $client, $subModel;
             
    
            public function __construct()
            {
                helper(['form', 'test_helper']);
                $this->adminModel = new AdminModel();
                $this->subModel = new SubModel();
                $this->client = \Config\Services::curlrequest();
            }

    
            public function index()
            {
                $limit = 10;

                $data['subscriptions'] = $this->subModel->orderBy('id', 'DESC')->findAll($limit);

                return view('admindash_view', $data);
            }
    
            public function allUsers()
            {
                $data['users'] = $this->adminModel->findAll();
    
                return view('all_users_view', $data);
            }
    
            public function deleteUser($id = null)
            {
    
    
                return view('delete_user');
            }
    
            public function groupSMS()
            {
                $data = [];
                $data['validation'] = null;
                $apiKey = 'aNdFVPorufyvKJGZcL1WlXe3wiRkhH45YBp76TxzAqQC9SjEU8bmtsMODg2In0'; // Replace with your actual API key
                $endpoint = 'https://api.tililtech.com/sms/v3/sendsms';
    
                $rules =[
                    'message' => 'required'
                ];
    
                if ($this->request->getMethod() == 'post') 
                {
                    if ($this->validate($rules)) 
                    {
                        //get message from form
                        $message = $this->request->getVar('message', FILTER_SANITIZE_STRING);
    
                        // Prepare the JSON data
                        
                        $smsData = [
                            'api_key' => $apiKey,
                            'service' => 0, // Assuming you have a specific service ID
                            'mobile' => '254740289746', // Replace with the recipient's mobile number
                            'response_type' => 'json',
                            'shortcode' => 'Tilil', // Replace with your shortcode
                            'message' => $message
                        ];
    
                        // Send the HTTP request
                        $response = $this->client->request(
                            'POST',
                            $endpoint,
                            [
                                'headers' => [
                                    'Content-Type' => 'application/json',
                                ],
                                'json' => $smsData,
                                'http_errors' => false,
                            ]
                        );
    
                        // Check response status code
                        if ($response->getStatusCode() == 200) {
                            $responseData = json_decode($response->getBody(), true);
                            print_r($responseData);
                        } else {
                            // Handle request failure
                        }
                    }
                    else
                    {
                        $data['validation'] = $this->validator;
                    }
                }
    
                return view('message_view', $data);
            }
    
            public function singleSMS()
            {
                $data = [];
                $data['validation'] = null;
                $apiKey = 'aNdFVPorufyvKJGZcL1WlXe3wiRkhH45YBp76TxzAqQC9SjEU8bmtsMODg2In0'; // Replace with your actual API key
                $endpoint = 'https://api.tililtech.com/sms/v3/sendsms';
    
                $rules =[
                    'message' => 'required'
                ];
    
                if ($this->request->getMethod() == 'post') 
                {
                    if ($this->validate($rules)) 
                    {
                        # code...
                    }
                    else
                    {
                        $data['validation'] = $this->validator;
                    }
                }
                return view('single_message_view', $data);
            }
    
            public function recentSubscriptions()
            {
                $limit = 10;


                $data['subscriptions'] = $this->subModel->orderBy('id', 'DESC')->findAll($limit);

               return view('recent_subs_view', $data);
            }

           public function broadcasting()
           {
                return view('ip_view');
           }

           public function ptp()
           {
                return view('ptp_view');
           }

           public function editClient($id = null)
           {
                $data = [];
                $data['validation'] = null;
                $data['client'] = $this->adminModel->find($id);
 
               $rules = [
                'username' => 'required',
                'email' => 'required|valid_email',
                'location' => 'required',
                'ip' => 'required',
                'phone' => 'required|exact_length[12]',
                'plan' => 'required'
               ];

                if ($this->request->getMethod() == 'post') 
                {
                    

                    if ($this->validate($rules)) 
                    {
                        //get form data
                        $formData = [
                            'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
                            'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
                            'location' => $this->request->getVar('location', FILTER_SANITIZE_STRING),
                            'ip' => $this->request->getVar('ip', FILTER_SANITIZE_STRING),
                            'phone' => $this->request->getVar('phone', FILTER_SANITIZE_STRING)
                        ];

                        if ($this->adminModel->update($id,$formData))
                        {
                           session()->setTempdata('client_edit_success', 'Client info updated successfully!');
                           return redirect()->to(current_url());
                        }
                        else
                        {
                            session()->setTempdata('client_edit_error', 'Failed to update client Info!');
                           return redirect()->to(current_url());
                        }
                    }
                    else
                    {
                        $data['validation'] = $this->validator;
                    }
                }

                return view('edit_client_view', $data);
           }

    public function changePassword()
    {
        $data = [];
        $data['userdata'] = $this->adminModel->getLoggedUserData(session()->get('logged_user'));
        $data['validation'] = null;

        
        
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min_length[5]|max_length[15]',
            'confirm_password' => 'required|matches[new_password]'
        ];

        if ($this->request->getMethod() == 'post') 
        {
            if ($this->validate($rules)) 
            {
                $old_poassword = $this->request->getVar('old_password');
                $new_password = password_hash($this->request->getVar('new_password'), PASSWORD_BCRYPT);


                //verify old password
                if (password_verify($old_poassword, $data['userdata']['password'])) 
                {
                    //update new password to database
                    if ($this->adminModel->updatePassword($new_password, $data['userdata']['uniid'])) 
                    {
                        session()->setTempdata('password_success', 'Password changed successfully!');
                        return redirect()->to(current_url());
                    }
                    else
                    {
                        session()->setTempdata('password_error', 'Failed to change password, please try again!');
                        return redirect()->to(current_url());
                    }
                }
                else
                {
                    session()->setTempdata('password_error', 'Old Password does not match!');
                    return redirect()->to(current_url());
                }    
            }
        }

        return view('change_password_view', $data);
    }

    public function editAdmin()
    {
        $data = [];
        $data['validation'] = null;
        $data['userdata'] = $this->adminModel->getLoggedUserData(session()->get('logged_user'));

        

        $rules = [
            'username' => 'required',
            'email' => 'required|valid_email',
            'phone' => 'required|exact_length[12]'
        ];

        if ($this->request->getMethod() == 'post') 
        {
            if ($this->validate($rules)) 
            {
                // get form data and save to db
                $formData = [
                    'username' => $this->request->getVar('username', FILTER_SANITIZE_STRING),
                    'email' => $this->request->getVar('email', FILTER_SANITIZE_STRING),
                    'phone' => $this->request->getVar('phone', FILTER_SANITIZE_STRING)
                ];

                if ($this->adminModel->updateUserInfo($formData, $data['userdata']['uniid'])) {
                    session()->setTempdata('edit_success', 'Profile Updated Successfully');
                    return redirect()->to(current_url());
                }
                else
                {
                    session()->setTempdata('edit_error', 'Failed to update profile, please try again!');
                    return redirect()->to(current_url());
                }
            }
            else
            {
                $data['validation'] = $this->validator;
            }
        }

        return view('edit_admin_view', $data);
    }

    public function support()
    {
        return view('support_view');
    }

    public function profile()
    {   
        $data = null;
        $data['userdata'] = $this->adminModel->getLoggedUserData(session()->get('logged_user'));

        return view('profile_view', $data);
    }
    
    public function logout()
    {
        //destroy the logged in user session
        session()->remove('logged_user');
        session()->destroy();

        return redirect()->to(base_url().'/login-form');
    }
}
    

