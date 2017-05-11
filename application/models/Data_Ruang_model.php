<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Ruang_model extends MY_Model
{
    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'nama_ruang',
                'label' => 'Nama Ruang',
                'rules' => 'trim|required|min_length[4]|max_length[20]|callback_nama_ruang_unik'
            ],
            [
                'field' => 'id_level_ruang',
                'label' => 'Pemilik Ruang',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'link_ruang',
                'label' => 'Link Ruang',
                'rules' => 'trim'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
			'id_ruang'  	 => '',
            'nama_ruang'  	 => '',
            'id_level_ruang' => '1',
            'link_ruang'  	 => 'http://',
        ];
    }
	
	public function getAll_all($page = null)
    {   
        $sql =" SELECT * FROM data_ruang, level_ruang WHERE data_ruang.id_level_ruang = level_ruang.id_level_ruang";

        return $this->db->query($sql)->result();
    }
}
