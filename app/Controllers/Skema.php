<?php

namespace App\Controllers;

class Skema extends BaseController
{
    public function index()
    {
        $db= db_connect();
        $query = $db->query("select * from skema order by kd_skema")->getResultArray();
        $data = [
            'data'=>$query
        ];
        return view('skema',$data);
    }

}
