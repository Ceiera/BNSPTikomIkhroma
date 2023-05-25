<?php

namespace App\Controllers;

class CRUDskema extends BaseController
{
    public function tambah()
    {
        $kd_skema = $this->request->getPost('kd_skema');
        $nm_skema = $this->request->getPost('nm_skema');
        $jenis = $this->request->getPost('jenis');
        $jml_unit = $this->request->getPost('jml_unit');
        $db = db_connect();
        $data=[
            'kd_skema'=>$kd_skema,
            'nm_skema'=>$nm_skema,
            'jenis'=>$jenis,
            'jml_unit'=>$jml_unit
        ];
        $query = $db->table('skema')->insert($data);
        echo json_encode($kd_skema);
    }
    
    public function editGet()
    {
        $id = $this->request->getPost('ids');
        $db = db_connect();
        $query = $db->query("select * from skema where kd_skema='".$id."'")->getResultArray();
        echo json_encode($query[0]);
    }

    public function editSet()
    {
        $kd_skema = $this->request->getPost('kd_skema');
        $nm_skema = $this->request->getPost('nm_skema');
        $jenis = $this->request->getPost('jenis');
        $jml_unit = $this->request->getPost('jml_unit');
        $db = db_connect();
        $data=[
            'nm_skema'=>$nm_skema,
            'jenis'=>$jenis,
            'jml_unit'=>$jml_unit
        ];
        $query = $db->table('skema')->update($data,['kd_skema'=>$kd_skema]);
        echo json_encode('$id_peserta');
    }

    public function hapus()
    {
        $id = $this->request->getPost('ids');
        $db = db_connect();
        $query = $db->query("delete from skema where kd_skema='".$id."'");
    }
}
