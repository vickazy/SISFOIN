<?php

class Under_Construction extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->halaman = 'under_construction';
    $is_login = $this->session->userdata('is_login');
    if (!$is_login) {
      redirect('login');
    }
  }
  
  public function index($page = null)
  {
    $data['halaman']        = $this->halaman;
    $data['main_view']      = "pages/under_construction";
      
    $data['level']          = $this->session->userdata('level');
    $data['nama_user']      = $this->session->userdata('nama_user');      
    $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
      
    $this->load->view('layout/template', $data);
  }
} 