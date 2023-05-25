<?php

namespace App\Controllers;

class Rumah extends BaseController
{
    public function index()
    {
        $db= db_connect();
        $query = $db->query("select * from peserta order by id_peserta")->getResultArray();
        $data = [
            'data'=>$query
        ];
        return view('home.php',$data);
    }

    public function cari()
    {
        $cari = $this->request->getPost('cari');
        $db= db_connect();
        $query = $db->query("select * from peserta where upper(peserta.nm_peserta) like '%".strtoupper($cari)."%' order by id_peserta")->getResultArray();
        if (count($query)==0) {
            return redirect()->to('home')->with('Error', 'Tidak Ditemukan');
        }
        $data = [
            'data'=>$query
        ];
        return view('home.php',$data);
    }
    
}
