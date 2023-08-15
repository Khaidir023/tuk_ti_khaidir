<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	
	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login()
	{
		$this->load->model('m_login');
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$username =  $this->input->post('username');
			$password =  $this->input->post('password');

			$cek = $this->m_login->cek($username,$password);

			if ($cek->num_rows() > 0) 
			{
				$user = $cek->row_array();
				$this->session->set_userdata('nama',$user['nama']);
				redirect('dashboard');
			} else {
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}