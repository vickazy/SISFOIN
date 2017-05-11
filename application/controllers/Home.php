<?php

class Home extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->halaman = 'home';
    $is_login = $this->session->userdata('is_login');
    if (!$is_login) {
      redirect('login');
    }
  }
  
  public function index($page = null)
  {
    $data['halaman']        = $this->halaman;
    $data['main_view']      = "pages/home_page";
      
    $data['level']          = $this->session->userdata('level');
    $data['nama_user']      = $this->session->userdata('nama_user');      
    $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
    $data['i']              = "0";
    $data['j']              = "0";
    
    if ($data['id_level_ruang'] == LEVEL_ADMIN){
            $data['jeniss']= $this->home->selectjenis();
			$data['jumlah_total']= $this->home->getAllCount()->jumlah_total;
			
			$data['kondisis']= $this->home->selectkondisi();
					
			$data['rusak']= $this->home->selectrusak()->total_rusak;
			$data['masuk']= $this->home->selectmasuk()->total_masuk;
			$data['keluar']= $this->home->selectkeluar()->total_keluar;
		
        } else {
            $data['jeniss']= $this->home->selectjenis_level();
            $data['jumlah_total']= $this->home->getAllCount_level()->jumlah_total;
		
			$data['kondisis']= $this->home->selectkondisi_level();
					
			$data['rusak']= $this->home->selectrusak_level()->total_rusak;
			$data['masuk']= $this->home->selectmasuk_level()->total_masuk;
			$data['keluar']= $this->home->selectkeluar_level()->total_keluar;
        }
      
    $this->load->view('layout/template', $data);
  }
} 