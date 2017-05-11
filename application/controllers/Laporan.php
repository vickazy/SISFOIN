<?php

class Laporan extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->halaman = 'laporan';
    $is_login = $this->session->userdata('is_login');
    if (!$is_login) {
      redirect('login');
    }
  }
	
	public function masuk($page = null)
	{
		if (!$_POST) {
			$data['input'] = (object) ['awal_masuk' => date("Y-m-01"), 'akhir_masuk' => date("Y-m-t")];
			$data['first_load'] = true;
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$data['first_load'] = false;
		}
		
        $data['level']          = $this->session->userdata('level');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Laporan Inventaris Masuk";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/laporan/tables';
		$data['form_action']= 'laporan/masuk';

        
        if ($data['id_level_ruang'] == 252){
            $data['inventariss']= $this->laporan->masuk($data['input']->awal_masuk, $data['input']->akhir_masuk);
            $data['total']= count($data['inventariss']);
        } else {
            $data['inventariss']= $this->laporan->masuk_level($data['input']->awal_masuk, $data['input']->akhir_masuk);
            $data['total']= count($data['inventariss']);
        }
        
        $this->load->view('layout/template', $data);
	}
	
	public function keluar($page = null)
	{
		if (!$_POST) {
			$data['input'] = (object) ['awal_keluar' => date("Y-m-01"), 'akhir_keluar' => date("Y-m-t")];
			$data['first_load'] = true;
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$data['first_load'] = false;
		}
		
        $data['level']          = $this->session->userdata('level');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Laporan Inventaris Keluar";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/laporan/tables';
		$data['form_action']= 'laporan/keluar';

        
        if ($data['id_level_ruang'] == 252){
            $data['inventariss']= $this->laporan->keluar($data['input']->awal_keluar, $data['input']->akhir_keluar);
            $data['total']= count($data['inventariss']);
        } else {
            $data['inventariss']= $this->laporan->keluar_level($data['input']->awal_keluar, $data['input']->akhir_keluar);
            $data['total']= count($data['inventariss']);
        }
        
        $this->load->view('layout/template', $data);
	}
	

	public function kondisi($page = null)
	{
		if (!$_POST) {
			$data['input'] = (object) ['id_kondisi' => '2'];
			$data['first_load'] = true;
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$data['first_load'] = false;
		}
		
        $data['level']          = $this->session->userdata('level');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Laporan Inventaris Per Kondisi";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/laporan/tables';
		$data['form_action']= 'laporan/kondisi';

        
        if ($data['id_level_ruang'] == 252){
            $data['inventariss']= $this->laporan->kondisi($data['input']->id_kondisi);
            $data['total']= count($data['inventariss']);
        } else {
            $data['inventariss']= $this->laporan->kondisi_level($data['input']->id_kondisi);
            $data['total']= count($data['inventariss']);
        }
        
        $this->load->view('layout/template', $data);
	}
	
	public function ruang($page = null)
	{
		if (!$_POST) {
			$data['input'] = (object) ['id_ruang' => ''];
			$data['first_load'] = true;
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$data['first_load'] = false;
		}
		
        $data['level']          = $this->session->userdata('level');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Laporan Inventaris Per Ruang";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/laporan/tables';
		$data['form_action']= 'laporan/ruang';

        
        if ($data['id_level_ruang'] == 252){
            $data['inventariss']= $this->laporan->ruang($data['input']->id_ruang);
			$data['inventarisss']= $this->laporan->getruang_all();
            $data['total']= count($data['inventariss']);
        } else {
            $data['inventariss']= $this->laporan->ruang_level($data['input']->id_ruang);
			$data['inventarisss']= $this->laporan->getruang_level();
            $data['total']= count($data['inventariss']);
        }
        
        $this->load->view('layout/template', $data);
	}
	
	public function jenis_barang($page = null)
	{
		if (!$_POST) {
			$data['input'] = (object) ['jenis_barang' => ''];
			$data['first_load'] = true;
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$data['first_load'] = false;
		}
		
        $data['level']          = $this->session->userdata('level');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Laporan Inventaris Per Jenis Barang";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/laporan/tables';
		$data['form_action']= 'laporan/jenis_barang';

        
        if ($data['id_level_ruang'] == 252){
            $data['inventariss']= $this->laporan->jenis_barang($data['input']->jenis_barang);
            $data['total']= count($data['inventariss']);
        } else {
            $data['inventariss']= $this->laporan->jenis_barang_level($data['input']->jenis_barang);
            $data['total']= count($data['inventariss']);
        }
        
        $this->load->view('layout/template', $data);
	}
	
}