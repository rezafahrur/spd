<?php
 class PengelolaanLiburNasional extends CI_Controller {
 	
	function __Construct () 
	{
		parent::__Construct();
		if($this->session->userdata('status1') != "login" && $this->session->userdata('status2') != "unlock"){
			redirect(base_url("autentikasi"));
		}
		else if($this->session->userdata('status1') == "login" && $this->session->userdata('status2') == "lock") {
		redirect(base_url("autentikasi/kunci_layar"));
		}
		
	}
	
	function index () {
		redirect ('PengelolaanLiburNasional/melihatLiburNasional');
	}
	
	function menambahLiburNasional() 
	{	
		
		if ($this->input->post('submit')) 
		{   
			$tanggalLibur = $this->input->post('tanggal_libur');
			$keterangan = $this->input->post('keterangan');
			$data = array(
					'tanggal_libur' => $tanggalLibur,
					'keterangan' => $keterangan
					);
			$this->load->model('LiburNasional');
			$this->LiburNasional->modMembuatLiburNasional($data);
			redirect ('PengelolaanLiburNasional/index');
		}
		$this->load->view('pembuatanLiburNasional');
	}
	
	function melihatLiburNasional() 
	{
	  $this->load->model('LiburNasional');
	  $data['hasil'] = $this->LiburNasional->modMelihatLiburNasional();
	  $this->load->view('penglihatanLiburNasional', $data);	
	}
	
	function mengubahLiburNasional($id)
	{
		if($_POST == NULL) {
			$this->load->model('LiburNasional');
			$data ['hasil'] = $this->LiburNasional->modGetLiburNasional($id);
			$this->load->view('pengubahanLiburNasional', $data);
		}
		else {
			$this->load->model('LiburNasional');
			$this->LiburNasional->modMengubahLiburNasional($id);
			redirect('PengelolaanLiburNasional/index');
		}
	}
	
	function menghapusLiburNasional($id) 
	{
	  $this->load->model('LiburNasional');
	  $this->LiburNasional->modMenghapusLiburNasional($id);
	  redirect('PengelolaanLiburNasional/index');	
	}
 }
?>