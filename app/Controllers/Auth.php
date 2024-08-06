<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function masuk()
    {
        return view('auth/masuk');
    }
    
    public function login()
    {
        $role = session('role');
        if ($role == 'admin') { 
            return redirect()->to(site_url('/admin'));
        } else if ($role == 'user') {
            return redirect()->to(site_url('user'));
        }
        return view('auth/login');
    }
    
    
    public function loginProcess()
    {
        $post = $this->request->getPost();
        $query = $this->db->table('login')->getWhere(['email' => $post['email']]);
        $user = $query->getRow();
        if($user){
            if(password_verify($post['password'], $user->password_user)){
                $params = [
                    'id_user' => $user->id_user,
                    'role' => $user->role,
                    'user_name' => $user->name_user
                ];
                session()->set($params);

                if($user->role == 'admin'){
                    return redirect()->to(site_url('admin'));
                } else if($user->role == 'user'){
                    return redirect()->to(site_url('user'));
                } else {
                    return redirect()->back()->with('error', 'Role tidak ditemukan');
                } 
            } else {
                return redirect()->back()->with('error', 'Password salah');
            } 
        } else {
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(site_url('login'));
    }
}