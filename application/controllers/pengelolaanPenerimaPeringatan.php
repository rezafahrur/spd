<?php
 class pengelolaanPenerimaPeringatan extends CI_Controller {
 	
	function __Construct () 
	{
		parent::__Construct();
		if($this->session->userdata('status1') != "login" && $this->session->userdata('status2') != "unlock"){
			redirect(base_url("autentikasi"));
		}
		else if($this->session->userdata('status1') == "login" && $this->session->userdata('status2') == "lock") {
		redirect(base_url("autentikasi/kunci_layar"));
		}
		$this->load->library('form_validation');
	}
	
	function index () {
		redirect ('pengelolaanPenerimaPeringatan/melihatPenerimaPeringatan');
	}
	
	function membuatPenerimaPeringatan() 
	{
		if($this->session->userdata('HakAkses') == "Manager HRD"){
			if ($this->input->post('submit')) {
				$this->load->model('penerimaPeringatan');
				$value_db = $this->penerimaPeringatan->check_unique_email($this->input->post('emailPenerimaPeringatan'));
				if($this->input->post('emailPenerimaPeringatan') != $value_db) {
   					$is_unique =  '|is_unique[penerimaperingatan.EmailPenerimaPeringatan]';
					} 
				else {
   						$is_unique =  '';
					}
				$this->form_validation->set_rules('namaPenerimaPeringatan', 'NamaPenerimaPeringatan', 'required');
        		$this->form_validation->set_rules('emailPenerimaPeringatan', 'EmailPenerimaPeringatan', 'trim|required|valid_email'.$is_unique);
				
			if ($this->form_validation->run() == TRUE){
				
				$this->load->model('penerimaPeringatan');
				$this->penerimaPeringatan->modMembuatPenerimaPeringatan();
				redirect ('pengelolaanPenerimaPeringatan/index');
				}
			else {
				echo "<script>alert('Alamat Email Telah Ada');history.go(-1);</script>";
			}
				}
				$this->load->view('pembuatanPenerimaPeringatan');
		}
		else {
			echo "<script>alert('Anda Tidak Berhak Menambah Penerima Peringatan');</script>";
			redirect(base_url("autentikasi"));
		}
	}
	
	function melihatPenerimaPeringatan() 
	{
	  $this->load->model('PenerimaPeringatan');
	  $data['hasil'] = $this->PenerimaPeringatan->modMelihatPenerimaPeringatan();
	  $this->load->view('penglihatanPenerimaPeringatan', $data);	
	}
	
	function mengubahPenerimaPeringatan($id)
	{
		if($_POST == NULL) {
			$this->load->model('penerimaPeringatan');
			$data ['hasil'] = $this->penerimaPeringatan->modGetPenerimaPeringatan($id);
			$this->load->view('pengubahanPenerimaPeringatan', $data);
		}
		else {
			$this->load->model('penerimaPeringatan');
			$this->penerimaPeringatan->modMengubahPenerimaPeringatan($id);
			redirect('pengelolaanPenerimaPeringatan/melihatPenerimaPeringatan');
		}
	}
	
	function menghapusPenerimaPeringatan($id) 
	{
	   $this->db->delete('penerimaperingatan', array('idPenerimaPeringatan' => $id));
	   redirect('pengelolaanPenerimaPeringatan/index');	
	}
 }
?>