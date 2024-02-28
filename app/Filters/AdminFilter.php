<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class AdminFilter implements FilterInterface
{
   
    public function before(RequestInterface $request, $arguments = null)
    {
        //prevent login if not admin
        if (!session()->has('logged_user')) 
        {
            return redirect()->to(base_url().'/login-form');
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
