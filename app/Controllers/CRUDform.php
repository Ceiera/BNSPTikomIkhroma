<?php

namespace App\Controllers;

class CRUDform extends BaseController
{
    public function tambah()
    {
        $kd_skema = $this->request->getPost('kd_skema');
        $nm_peserta = $this->request->getPost('nm_peserta');
        $jekel = $this->request->getPost('jekel');
        $alamat = $this->request->getPost('alamat');
        $no_hp = $this->request->getPost('no_hp');
        $db = db_connect();
        $data=[
            'kd_skema'=>$kd_skema,
            'nm_peserta'=>$nm_peserta,
            'jekel'=>$jekel,
            'alamat'=>$alamat,
            'no_hp'=>$no_hp
        ];
        $query = $db->table('peserta')->insert($data);
        echo json_encode($jekel);
    }
    
    public function editGet()
    {
        $id = $this->request->getPost('ids');
        $db = db_connect();
        $query = $db->query("select * from peserta where id_peserta=".$id)->getResultArray();

        echo json_encode($query[0]);
    }

    public function editSet()
    {
        $id_peserta= $this->request->getPost('id');
        $kd_skema = $this->request->getPost('kd_skema');
        $nm_peserta = $this->request->getPost('nm_peserta');
        $jekel = $this->request->getPost('jekel');
        $alamat = $this->request->getPost('alamat');
        $no_hp = $this->request->getPost('no_hp');
        $db = db_connect();
        $data=[
            'kd_skema'=>$kd_skema,
            'nm_peserta'=>$nm_peserta,
            'jekel'=>$jekel,
            'alamat'=>$alamat,
            'no_hp'=>$no_hp
        ];
        $query = $db->table('peserta')->update($data,['id_peserta'=>$id_peserta]);
        echo json_encode('$id_peserta');
    }

    public function hapus()
    {
        $id = $this->request->getPost('ids');
        $db = db_connect();
        $query = $db->query("delete from peserta where id_peserta=".$id);
    }

}
