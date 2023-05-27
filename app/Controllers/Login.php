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
        $ses= [
            'admin'=>$email
        ];
        session()->set($ses);
        return redirect()->to('/home');
    }
    public function user()
    {
        $db= db_connect();
        $query = $db->query("select * from peserta order by id_peserta")->getResultArray();
        $anu = $db->query("select * from skema order by kd_skema")->getResultArray();
        $data = [
            'data'=>$query,
            'anu'=>$anu
        ];
        return view('home.php',$data);
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }

    public function userCari()
    {
        $cari = $this->request->getPost('cari');
        $db= db_connect();
        $query = $db->query("select * from peserta where upper(peserta.nm_peserta) like '%".strtoupper($cari)."%' order by id_peserta")->getResultArray();
        $anu = $db->query("select * from skema order by kd_skema")->getResultArray();
        if (count($query)==0) {
            return redirect()->to('home')->with('Error', 'Tidak Ditemukan');
        }
        $data = [
            'data'=>$query,
            'anu'=>$anu
        ];
        return view('home.php',$data);
    }
}

