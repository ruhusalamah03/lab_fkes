<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;


class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(!session('id_user')){
            return redirect()->to(site_url('login'));
        }

        if(!empty($arguments)){
            $requiredRole = $arguments[0];
            $role = session('role');
            if($role != $requiredRole){
                return redirect()->to(site_url('login'))->with('error', 'Anda tidak memiliki akses ke halaman ini');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}