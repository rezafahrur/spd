<?php
   class Autentikasi extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
	}
 
	function index(){
		if ($this->session->userdata('HakAkses')=='Manager HRD') {
				redirect(base_url('pengelolaanPenerimaPeringatan'));
			}
		elseif ($this->session->userdata('HakAkses')=='Staff HRD') {
			redirect(base_url("admin"));
		}
		else{
		$this->load->view('login');
		}
	}
 
	function login(){
			$this->load->model('ModAutentikasi');
			$this->ModAutentikasi->modLogin();
	}
 	
	function kunci_layar() {
	    if($this->session->userdata('status1') == "login"){
		$this->session->unset_userdata('status2');
		$sess_data['status2'] = 'lock';
		$this->session->set_userdata($sess_data);
		$this->load->view('lock_screen');
		}
		else if ($this->session->userdata('status2') == "lock"){
		$this->load->view('lock_screen');
		}
		else if ($this->session->userdata('status1') != "login"){
			$this->index();
		}
	}
	
	function unlock(){
		$username = $this->session->userdata('Username');
		$password = $this->input->post('password');
		$where = array(
			'Username' => $username,
			'Password' => md5($password)
			);
		$this->load->model('ModAutentikasi');
		$this->ModAutentikasi->cekUnlock("pengguna",$where);
	}
	
	function logout(){
		$this->session->unset_userdata('Username');
		$this->session->unset_userdata('HakAkses');
		$this->session->unset_userdata('NamaPengguna');
		$this->session->unset_userdata('status1');
		$this->session->unset_userdata('status2');
		$this->session->sess_destroy();
		redirect(base_url('autentikasi'));
	}
}
   
?>