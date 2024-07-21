<?php

namespace App\Controllers;

class Auth extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }
    public function login()
    {
        if(session('id_user')){
            return redirect()->to(site_url('labfkes'));
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
                $params = ['id_user' => $user->id_user];
                session()->set($params);
                return redirect()->to(site_url('labfkes'));
            } else {
                return redirect()->back()->with('error', 'Kata sandi tidak sesuai');
            }
        } else{
            return redirect()->back()->with('error', 'Email tidak ditemukan');
        }
    }

    public function logout()
    {
        session()->remove('id_user');
        return redirect()->to(site_url('login'));
    }
}