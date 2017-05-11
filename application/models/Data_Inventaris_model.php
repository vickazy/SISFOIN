<?php defined('BASEPATH') or exit('No direct script access allowed');

class Data_Inventaris_model extends MY_Model
{
    protected $perPage = 5;

    public function getValidationRules($rules_set=null)
    {
		if ($rules_set===null){
        $validationRules = [
			[
                'field' => 'kd_lokasi',
                'label' => 'Kode Lokasi',
                'rules' => 'trim|required|max_length[255]|alpha_numeric'
            ],
            [
                'field' => 'kd_barang',
                'label' => 'Kode Barang',
                'rules' => 'trim|required|exact_length[10]|numeric'
            ],
            [
                'field' => 'no_aset',
                'label' => 'Nomor Aset',
                'rules' => 'trim|required|max_length[255]|numeric|callback_kd_aset'
            ],
            [
                'field' => 'jenis_barang',
                'label' => 'Jenis Barang',
                'rules' => 'trim|required|max_length[255]'
            ],
            [
                'field' => 'id_ruang',
                'label' => 'Lokasi Ruang',
                'rules' => 'trim|required|callback_id_ruang'
            ],
            [
                'field' => 'thn_angg',
                'label' => 'Tahun Anggaran',
                'rules' => 'trim|required|exact_length[4]|numeric'
            ],
            [
                'field' => 'periode',
                'label' => 'Periode',
                'rules' => 'trim|numeric|max_length[255]'
            ],
            [
                'field' => 'no_sppa',
                'label' => 'Nomor SPPA',
                'rules' => 'trim|max_length[255]'
            ],
            [
                'field' => 'tgl_perlh',
                'label' => 'Tanggal Perolehan',
                'rules' => 'trim|max_length[255]'
            ],
            [
                'field' => 'tgl_buku',
                'label' => 'Tanggal Pembukuan',
                'rules' => 'trim|max_length[255]'
            ],
            [
                'field' => 'tercatat',
                'label' => 'Tercatat',
                'rules' => 'trim'
            ],
            [
                'field' => 'id_kondisi',
                'label' => 'Kondisi',
                'rules' => 'trim|required'
            ],
        ];}
		
		else if ($rules_set="keluar"){
			$validationRules = [
            [
                'field' => 'id_inventaris',
                'label' => 'Inventaris',
                'rules' => 'required|callback_validasi_keluar'
            ],
			[
                'field' => 'ket_keluar',
                'label' => 'Keterangan Keluar',
                'rules' => 'trim|required'
            ],
        ];
		}

        return $validationRules;
    }
	
	

    public function getDefaultValues()
    {   
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        
        return [
            'kd_lokasi'      => '',
            'kd_barang'         => '',            
            'no_aset'           => '',
            'jenis_barang'      => '',
            'id_ruang'          => '',
            'thn_angg'          => '',
            'periode'           => '',
            'no_sppa'           => '',
            'tgl_perlh'         => '',
            'tgl_buku'          => '',
            'tercatat'          => '',
            'id_kondisi'        => '',
			'id_inventaris'		=> '',
			'ket_keluar'		=> '',
			'jns_trn'			=> '',
			'dsr_hrg'			=> '',
			'kd_data'			=> '',
			'kuantitas'			=> '1',
			'rph_sat'			=> '',
			'rph_aset'			=> '',
			'keterangan'		=> '',
			'merk_type'			=> '',
			'asal_perlh'		=> '',
			'no_bukti'			=> '',
            
            'id_level_ruang'    => "$id_level_ruang",
            
            
        ];
    }
	
	public function getAll_all($page = null)
    {   
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $sql =" SELECT * FROM data_inventaris, kondisi, data_ruang WHERE waktu_keluar is null AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang ORDER by kd_barang ASC, no_aset ASC";

        return $this->db->query($sql)->result();
    }

    public function getAll_level($page = null)
    {   
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $sql =" SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.id_level_ruang = $id_level_ruang AND waktu_keluar is null AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang ORDER by kd_barang ASC, no_aset ASC";

        return $this->db->query($sql)->result();
    }
    
    public function getsearch($page = null)
    {
        $keywords = $this->input->get('keywords', true);
        $sql =" SELECT * FROM data_inventaris, kondisi, data_ruang WHERE (data_inventaris.jenis_barang Like '%$keywords%' OR data_inventaris.kd_barang Like '%$keywords%') AND waktu_keluar is null AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang";

        return $this->db->query($sql)->result();
    }
	
	public function getsearch_level($page = null)
    {   
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $keywords = $this->input->get('keywords', true);
        $sql =" SELECT * FROM data_inventaris, kondisi, data_ruang WHERE data_inventaris.id_level_ruang = $id_level_ruang AND (data_inventaris.jenis_barang Like '%$keywords%' OR data_inventaris.kd_barang Like '%$keywords%') AND waktu_keluar is null AND data_inventaris.id_kondisi = kondisi.id_kondisi AND data_inventaris.id_ruang = data_ruang.id_ruang";

        return $this->db->query($sql)->result();
    }

	public function getruang()
    {   
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $sql =" SELECT * FROM data_ruang ";

        return $this->db->query($sql)->result();
    }
	
	public function getruang_level()
    {   
        $id_level_ruang = $this->session->userdata('id_level_ruang');
        $sql =" SELECT * FROM data_ruang WHERE data_ruang.id_level_ruang = $id_level_ruang ";

        return $this->db->query($sql)->result();
    }
}
