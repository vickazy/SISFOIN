<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Inventaris extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->halaman = 'inventaris';
    $is_login = $this->session->userdata('is_login');
    if (!$is_login) {
      redirect('login');
    }
  }

	public function index($page = null)
	{
        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Data Inventaris";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/data inventaris/tables';

        
        if ($data['id_level_ruang'] == 252){
            $data['inventariss']= $this->data_inventaris->getAll_all();
            $data['total']= count($data['inventariss']);
        } else {
            $data['inventariss']= $this->data_inventaris->getAll_level();
            $data['total']= count($data['inventariss']);
        }
        
        $this->load->view('layout/template', $data);
	}
    
    public function detail($id = null)
    {
        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        
        $data_inventaris = $this->data_inventaris
								->where('data_inventaris.id_inventaris', $id)
								->join('data_ruang', 'data_inventaris.id_ruang = data_ruang.id_ruang')
								->join('kondisi', 'data_inventaris.id_kondisi = kondisi.id_kondisi')
								->join('status', 'data_inventaris.tercatat = status.id_status')
								->get();
		
        if (!$data_inventaris) {
            $this->session->set_flashdata('warning', 'Data inventaris tidak ada.');
            redirect('data_inventaris');
        }

        if (!$_POST) {
            $data['input'] = (object) $data_inventaris;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->data_inventaris->validate()) {
            $data['halaman']     = $this->halaman;
            $data['main_view']   = 'pages/data inventaris/form_detail';
            $data['form_action'] = "data_inventaris/detail/$id";
            $data['title_page']  = "Detail Data Inventaris";

            $this->load->view('layout/template', $data);
            return;
        }

        redirect('data_inventaris');
	}
    
    public function create()
	{
        $data['halaman']        = $this->halaman;
        $data['main_view']      = "pages/data inventaris/form";
        $data['form_action']    = 'data_inventaris/create';
        $data['title_page']     = "Inventaris Masuk";

        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
		
		if ($data['id_level_ruang'] == 252){
            $data['ruangs']= $this->data_inventaris->getruang();
        } else {
            $data['ruangs']= $this->data_inventaris->getruang_level();
        }
		
				
		if ($data['level'] !== "Laboran" && $data['level'] !== "Operator") {
		  redirect('home');
		}
        
        if (!$_POST) {
            $data['input'] = (object) $this->data_inventaris->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
            $data['input']->waktu_masuk = date("Y-m-d H:i:s");
        }

        if (!$this->data_inventaris->validate()) {
            $this->load->view('layout/template', $data);
            return;
        }
        
        if ($this->data_inventaris->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data inventaris berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data inventaris gagal disimpan.');
        }

        redirect('laporan/masuk');
	}
  
    public function keluar()
	{
        $data['halaman']        = $this->halaman;
        $data['main_view']      = "pages/data inventaris/form_keluar";

        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        
        $data['inventariss']= $this->data_inventaris->getAll_level();
		
		if ($data['level'] !== "Laboran" && $data['level'] !== "Operator") {
		  redirect('home');
		}
        
        if (!$_POST) {
            $data['input'] = (object) $this->data_inventaris->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
            $data['input']->waktu_keluar = date("Y-m-d H:i:s");
        }

        if (!$this->data_inventaris->validate("keluar")) {
            $this->load->view('layout/template', $data);
            return;
        }
        
        if ($this->data_inventaris->where('id_inventaris', $data['input']->id_inventaris)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data inventaris berhasil dikeluarkan.');
        } else {
            $this->session->set_flashdata('error', 'Data inventaris gagal dikeluarkan.');
        }

        redirect('laporan/keluar');
	}
    
    public function edit($id = null)
	{
        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
		
		
		
		if ($data['level'] !== "Laboran" && $data['level'] !== "Operator" && $data['level'] !== "Admin") {
		  redirect('home');
		}
        
		if ($data['id_level_ruang'] == 252){
            $data['ruangs']= $this->data_inventaris->getruang();
        } else {
            $data['ruangs']= $this->data_inventaris->getruang_level();
        }
		
        $data_inventaris = $this->data_inventaris->where('id_inventaris', $id)->get();
        if (!$data_inventaris) {
            $this->session->set_flashdata('warning', 'Data inventaris tidak ada.');
            redirect('data_inventaris');
        }
		
        if (!$_POST) {
            $data['input'] = (object) $data_inventaris;
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->data_inventaris->validate()) {
            $data['halaman']     = $this->halaman;
            $data['main_view']   = 'pages/data inventaris/form';
            $data['form_action'] = "data_inventaris/edit/$id";
            $data['title_page']  = "Edit Data Inventaris";

            $this->load->view('layout/template', $data);
            return;
        }
        
        if ($this->data_inventaris->where('id_inventaris', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data inventaris berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data inventaris gagal diupdate.');
        }

        redirect('data_inventaris');
	}
    
    public function delete($id = null)
	{
		$data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
		
		if ($data['level'] !== "Laboran" && $data['level'] !== "Operator" && $data['level'] !== "Admin") {
		  redirect('home');
		}
		
		$data_inventaris = $this->data_inventaris->where('id_inventaris', $id)->get();
        if (!$data_inventaris) {
            $this->session->set_flashdata('warning', 'Data inventaris tidak ada.');
            redirect('user');
        }

        if ($this->data_inventaris->where('id_inventaris', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data inventaris berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', 'Data inventaris gagal dihapus.');
        }

		redirect('data_inventaris');
	}
    
    public function search($page = null)
    {        
        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Hasil Pencarian";
        
        if ($data['id_level_ruang'] == 252){			
            $data['keywords']   = $this->input->get('keywords', true);
            $data['inventariss']= $this->data_inventaris->getsearch();
            $data['total']		= count($data['inventariss']);
        } else {
            $data['keywords']   = $this->input->get('keywords', true);
            $data['inventariss']= $this->data_inventaris->getsearch_level();
            $data['total']		= count($data['inventariss']);
        }

        if (!$data['inventariss']) {
            $this->session->set_flashdata('warning', 'Data tidak ditemukan.');
            redirect('data_inventaris');
        }

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/data inventaris/tables';
        $this->load->view('layout/template', $data);
    }
	
	public function adv_search($page = null)
	{
		if(isset($_POST['cetak'])){
			$this->export_excel();
			return;
		}
		
		if (!$_POST) {
			$data['input'] = (object) ['jenis_barang' => '', 'id_ruang' => '', 'id_kondisi' => ''];
			$data['first_load'] = true;
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$data['first_load'] = false;
		}
		
        $data['level']          = $this->session->userdata('level');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Advanced Search";

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/laporan/tables';
		$data['form_action']= 'data_inventaris/adv_search';

        
        if ($data['id_level_ruang'] == 252){
            $this->data_inventaris
				 ->join('data_ruang', 'data_inventaris.id_ruang = data_ruang.id_ruang')
				 ->join('kondisi', 'data_inventaris.id_kondisi = kondisi.id_kondisi');
			
			if($data['input']->jenis_barang) $this->data_inventaris->where('data_inventaris.jenis_barang', $data['input']->jenis_barang);
			
			if($data['input']->id_ruang) $this->data_inventaris->where('data_inventaris.id_ruang', $data['input']->id_ruang);
			
			if($data['input']->id_kondisi) $this->data_inventaris->where('data_inventaris.id_kondisi', $data['input']->id_kondisi);
			
			$data['inventariss']= $this->data_inventaris->getAll();			
			$data['inventarisss']= $this->data_inventaris->getruang();
			$data['total']= count($data['inventariss']);
			
        } else {
           $this->data_inventaris
				 ->join('data_ruang', 'data_inventaris.id_ruang = data_ruang.id_ruang')
				 ->join('kondisi', 'data_inventaris.id_kondisi = kondisi.id_kondisi')
				 ->where('data_inventaris.id_level_ruang', $data['id_level_ruang']);
			
			if($data['input']->jenis_barang) $this->data_inventaris->where('data_inventaris.jenis_barang', $data['input']->jenis_barang);
						
			if($data['input']->id_ruang) $this->data_inventaris->where('data_inventaris.id_ruang', $data['input']->id_ruang);
			
			if($data['input']->id_kondisi) $this->data_inventaris->where('data_inventaris.id_kondisi', $data['input']->id_kondisi);
			
			$data['inventariss']= $this->data_inventaris->getAll();
			$data['inventarisss']= $this->data_inventaris->getruang_level();
            $data['total']= count($data['inventariss']);
        }
        
        $this->load->view('layout/template', $data);
	}
	
	public function export_excel(){
		if (!$_POST) {
			$data['input'] = (object) ['jenis_barang' => '', 'id_ruang' => '', 'id_kondisi' => ''];
			$data['first_load'] = true;
		} else {
			$data['input'] = (object) $this->input->post(null, true);
			$data['first_load'] = false;
		}
		
        $data['level']          = $this->session->userdata('level');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        $data['i']              = "0";
        $data['title_page']     = "Advanced Search";
		$data['title'] = "Laporan Excel" ;

        $data['halaman']    = $this->halaman;
        $data['main_view']  = 'pages/laporan/tables';
		$data['form_action']= 'data_inventaris/adv_search';

        
        if ($data['id_level_ruang'] == 252){
            $this->data_inventaris
				 ->join('data_ruang', 'data_inventaris.id_ruang = data_ruang.id_ruang')
				 ->join('kondisi', 'data_inventaris.id_kondisi = kondisi.id_kondisi');
			
			if($data['input']->jenis_barang) $this->data_inventaris->where('data_inventaris.jenis_barang', $data['input']->jenis_barang);
			
			if($data['input']->id_ruang) $this->data_inventaris->where('data_inventaris.id_ruang', $data['input']->id_ruang);
			
			if($data['input']->id_kondisi) $this->data_inventaris->where('data_inventaris.id_kondisi', $data['input']->id_kondisi);
			
			$data['inventariss']= $this->data_inventaris->getAll();			
			$data['inventarisss']= $this->data_inventaris->getruang();
			$data['total']= count($data['inventariss']);
			
        } else {
           $this->data_inventaris
				 ->join('data_ruang', 'data_inventaris.id_ruang = data_ruang.id_ruang')
				 ->join('kondisi', 'data_inventaris.id_kondisi = kondisi.id_kondisi')
				 ->where('data_inventaris.id_level_ruang', $data['id_level_ruang']);
			
			if($data['input']->jenis_barang) $this->data_inventaris->where('data_inventaris.jenis_barang', $data['input']->jenis_barang);
			
			if($data['input']->id_ruang) $this->data_inventaris->where('data_inventaris.id_ruang', $data['input']->id_ruang);
			
			if($data['input']->id_kondisi) $this->data_inventaris->where('data_inventaris.id_kondisi', $data['input']->id_kondisi);
			
			$data['inventariss']= $this->data_inventaris->getAll();
			$data['inventarisss']= $this->data_inventaris->getruang_level();
            $data['total']= count($data['inventariss']);
        }

		   $this->load->view('pages/laporan/excel',$data);
	  }
   
	//Callback
	
	public function validasi_keluar()
    {
        
        if ($this->input->post('id_inventaris') === "default") {
			$this->form_validation->set_message('validasi_keluar','Pilih Inventaris terlebih dahulu');
            return false;
        }
        return true;
    }
	
	public function id_ruang()
    {
        
        if ($this->input->post('id_ruang') === "default") {
			$this->form_validation->set_message('id_ruang','Lokasi Ruang harus diisi.');
            return false;
        }
        return true;
    }
	
	public function kd_aset()
    {
        $kd_barang	  	= $this->input->post('kd_barang');
		$no_aset	  	= $this->input->post('no_aset');
        $id_inventaris	= $this->input->post('id_inventaris');

        $this->data_inventaris->where('kd_barang', $kd_barang)->where('no_aset', $no_aset);
        !$id_inventaris || $this->data_inventaris->where('id_inventaris !=', $id_inventaris);
        $data_inventaris = $this->data_inventaris->get();

        if (count($data_inventaris)) {
            $this->form_validation->set_message('kd_aset', '%s sudah digunakan.');
            return false;
        }
        return true;
    }

}