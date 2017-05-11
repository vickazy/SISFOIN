<?php

class User extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->halaman = 'user';
  }
  
  public function index($page = null)
  {
    $data['halaman']        = $this->halaman;
    $data['main_view']      = "pages/user/tables";

    $data['level']          = $this->session->userdata('level');
    $data['nama_user']      = $this->session->userdata('nama_user');      
    $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
    $data['i']              = "0";
    $data['users']          = $this->user->join('level')->orderBy('level.id_level')->join('level_ruang')->orderBy('id_user')->getAll();
    
	if ($data['level'] !== "Admin") {
		  redirect('home');
	}
	  
    $this->load->view('layout/template', $data);
  }
    
  	public function create()
	{
        $data['halaman']        = $this->halaman;
        $data['main_view']      = "pages/user/form";
        $data['form_action']    = 'user/create';
        $data['title_page']     = "Tambah User";

        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        
        if ($data['level'] !== "Admin") {
		  redirect('home');
		}
		
		if (!$_POST) {
            $data['input'] = (object) $this->user->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->user->validate()) {
            $this->load->view('layout/template', $data);
            return;
        }

        // Hash password
        $input->password = md5($data['input']->password);

        if ($this->user->insert($data['input'])) {
            $this->session->set_flashdata('success', 'Data user berhasil disimpan.');
        } else {
            $this->session->set_flashdata('error', 'Data user gagal disimpan.');
        }

        redirect('user');
	}
    
    public function edit($id = null)
	{
        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        
        if ($data['level'] !== "Admin") {
		  redirect('home');
		}
		
		$user = $this->user->where('id_user', $id)->get();
        if (!$user) {
            $this->session->set_flashdata('warning', 'Data user tidak ada.');
            redirect('user');
        }

        if (!$_POST) {
            $data['input'] = (object) $user;
            $data['input']->password = '';
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->user->validate()) {
            $data['halaman']     = $this->halaman;
            $data['main_view']   = 'pages/user/form';
            $data['form_action'] = "user/edit/$id";
            $data['title_page']  = "Edit User";

            $this->load->view('layout/template', $data);
            return;
        }

        // Password
        if (!empty($data['input']->password)) {
            $data['input']->password = md5($data['input']->password);
        } else {
            unset($data['input']->password);
        }

        if ($this->user->where('id_user', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data user berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data user gagal diupdate.');
        }

        redirect('user');
	}
    
    public function delete($id = null)
	{
		if ($data['level'] !== "Admin") {
		  redirect('home');
		}
		
		$user = $this->user->where('id_user', $id)->get();
        if (!$user) {
            $this->session->set_flashdata('warning', 'Data user tidak ada.');
            redirect('user');
        }

        if ($this->user->where('id_user', $id)->delete()) {
			$this->session->set_flashdata('success', 'Data user berhasil dihapus.');
		} else {
            $this->session->set_flashdata('error', 'Data user gagal dihapus.');
        }

		redirect('user');
	}
	
	public function profile($id_user = null)
	{
		$data['id_user']        = $this->session->userdata('id_user');
        $data['level']          = $this->session->userdata('level');
        $data['nama_user']      = $this->session->userdata('nama_user');      
        $data['id_level_ruang'] = $this->session->userdata('id_level_ruang');
        
		
		$user = $this->user->where('id_user', $data['id_user'])->get();
        if (!$user) {
            $this->session->set_flashdata('warning', 'Data user tidak ada.');
            redirect('home');
        }

        if (!$_POST) {
            $data['input'] = (object) $user;
            $data['input']->password = '';
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->user->validate("profile")) {
            $data['halaman']     = $this->halaman;
            $data['main_view']   = 'pages/user/form_profile';
            $data['form_action'] = "user/profile";
            $data['title_page']  = "Profil User";

            $this->load->view('layout/template', $data);
            return;
        }

        // Password
        if (!empty($data['input']->password)) {
            $data['input']->password = md5($data['input']->password);
        } else {
            unset($data['input']->password);
        }

        if ($this->user->where('id_user', $data['id_user'])->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data user berhasil diupdate.');
        } else {
            $this->session->set_flashdata('error', 'Data user gagal diupdate.');
        }

        redirect('user/profile');
	}

    /*
    |-----------------------------------------------------------------
    | Callback
    |-----------------------------------------------------------------
    */
    public function is_password_required()
    {
        $edit = $this->uri->segment(2);

        if ($edit != 'edit') {
            $password = $this->input->post('password', true);
            if (empty($password)) {
                $this->form_validation->set_message('is_password_required', '%s harus diisi.');
                return false;
            }
        }
        return true;
    }
	
	public function is_password_required2()
    {
        $profile = $this->uri->segment(2);

        if ($profile != 'profile') {
            $password = $this->input->post('password', true);
            if (empty($password)) {
                $this->form_validation->set_message('is_password_required', '%s harus diisi.');
                return false;
            }
        }
        return true;
    }

    public function username_unik()
    {
        $username   = $this->input->post('username');
        $id_user    = $this->input->post('id_user');

        $this->user->where('username', $username);
        !$id_user || $this->user->where('id_user !=', $id_user);
        $user = $this->user->get();

        if (count($user)) {
            $this->form_validation->set_message('username_unik', '%s sudah digunakan.');
            return false;
        }
        return true;
    }
}