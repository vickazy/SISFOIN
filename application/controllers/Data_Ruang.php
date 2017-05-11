<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Ruang extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->halaman = 'Data';
    $is_login = $this->session->userdata('is_login');
    if (!$is_login) {
      redirect('login');
    }
  }
	
	public function index($page = null)
	{
        $data['level']          = $this->session->userdata('level');
		$data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Data Ruang";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/data ruang/tables';

        
        if ($data['level'] === "Admin"){
            $data['ruangs']= $this->data_ruang->getAll_all();
            $data['total']= count($data['ruangs']);
        } else {
			redirect('home');
		}
        
        $this->load->view('layout/template', $data);
	}
    
    public function create()
	{
        $data['halaman']        = $this->halaman;
        $data['main_view']      = "pages/data ruang/form";
        $data['form_action']    = 'data_ruang/create';
        $data['title_page']     = "Tambah Ruang";

        $data['level']          = $this->session->userdata('level');
		$data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        
        if (!$_POST) {
            $data['input'] = (object) $this->data_ruang->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->data_ruang->validate()) {
            $this->load->view('layout/template', $data);
            return;
        }
        
        if ($this->data_ruang->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data ruang berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data ruang gagal disimpan.');
        }

        redirect('data_ruang');
	}
  
    public function edit($id = null)
	{
        $data['level']	= $this->session->userdata('level');
		$data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        
        $data_ruang = $this->data_ruang->where('id_ruang', $id)->get();
        if (!$data_ruang) {
            $this->session->set_flashdata('warning', 'Data ruang tidak ada.');
            redirect('data_ruang');
        }

        if (!$_POST) {
            $data['input'] = (object) $data_ruang;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->data_ruang->validate()) {
            $data['halaman']     = $this->halaman;
            $data['main_view']   = 'pages/data ruang/form';
            $data['form_action'] = "data_ruang/edit/$id";
            $data['title_page']  = "Edit Data Ruang";

            $this->load->view('layout/template', $data);
            return;
        }
        
        if ($this->data_ruang->where('id_ruang', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data ruang berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data ruang gagal diupdate.');
        }

        redirect('data_ruang');
	}
    
    public function delete($id = null)
	{
		$data_ruang = $this->data_ruang->where('id_ruang', $id)->get();
        if (!$data_ruang) {
            $this->session->set_flashdata('warning', 'Data ruang tidak ada.');
            redirect('data_ruang');
        }

        if ($this->data_ruang->where('id_ruang', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data ruang berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', 'Data ruang gagal dihapus.');
        }

		redirect('data_ruang');
	}
	
	/*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function nama_ruang_unik()
    {
        $nama_ruang   = $this->input->post('nama_ruang');
        $id_ruang    = $this->input->post('id_ruang');

        $this->data_ruang->where('nama_ruang', $nama_ruang);
        !$id_ruang || $this->data_ruang->where('id_ruang !=', $id_ruang);
        $data_ruang = $this->data_ruang->get();

        if (count($data_ruang)) {
            $this->form_validation->set_message('nama_ruang_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
	
}