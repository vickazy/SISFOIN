<?php

class Login extends MY_Controller
{  
  public function index()
  {
    if (!$_POST) {
      $input = (object) $this->login->getDefaultValues();
    } else {
      $input = (object) $this->input->post(null, true);
    }
    
    if (!$this->login->validate()) {
      $this->load->view('pages/login_page', compact('input'));
      return;
    }
    
    if (!$this->login->run($input)) {
      $this->session->set_flashdata('error_message', 'Username atau password salah.');
      redirect('login');
    } else {
      redirect('home');
    }
  }
  
  public function logout()
  {
    $this->login->logout();
    redirect('login');
  }
}