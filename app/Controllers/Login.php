<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function indexAdmin()
    {
        return view('loginadmin');
    }
    public function verifLoginAdmin()       
    {
        $email = $this->request->getPost('email');
        $pass = $this->request->getPost('password');
        if ($email != 'admin@gmail.com') {
            if ($pass != 'admin') {
                return redirect()->to('login')->with('Error', 'Email dan Password Salah');
            }
        return redirect()->to('/login')->with('Error', 'Email dan Password Salah');
        }
        return redirect()->to('/home');
    }
}
