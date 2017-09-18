<?php
 class PengelolaanPengguna extends CI_Controller {
 	
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
		redirect ('PengelolaanPengguna/melihatPengguna');
	}
	
	function menambahPengguna() 
	{	
		
		if ($this->input->post('submit')) 
		{   
			$this->load->helper('string');
			$namaPengguna = $this->input->post('namaPengguna');
			$nrp = $this->input->post('nrp');
			$username = $nrp;
			$password = random_string('alnum',6);
			$password2 = md5($password);
			$email    = $this->input->post('email');
			$hakAkses = $this->input->post('hakAkses');
			$data = array(
					'NamaPengguna' => $namaPengguna,
					'Username' => $username,
					'Password' => $password2,
					'nrp'     => $nrp,
					'Email'  =>  $email,
					'HakAkses' => $hakAkses
					);
			$this->load->model('Pengguna');
			$this->Pengguna->modMembuatPengguna($data);
			$this->mengirimUsernamePassword($username,$password,$email,$namaPengguna);		
			//redirect ('PengelolaanPengguna/index');
		}
		$this->load->view('pembuatanPengguna');
	}
	
	function melihatPengguna() 
	{
	  $this->load->model('Pengguna');
	  $data['hasil'] = $this->Pengguna->modMelihatPengguna();
	  $this->load->view('penglihatanPengguna', $data);	
	}
	
	function mengubahPengguna($id)
	{
		if($_POST == NULL) {
			$this->load->model('Pengguna');
			$data ['hasil'] = $this->Pengguna->modGetPengguna($id);
			$this->load->view('pengubahanPengguna', $data);
		}
		else {
			$this->load->model('Pengguna');
			$this->Pengguna->modMengubahPengguna($id);
			redirect('PengelolaanPengguna/index');
		}
	}
	
	function menghapusPengguna($id) 
	{
	   $this->db->delete('pengguna', array('idPengguna' => $id));
	   redirect('PengelolaanPengguna/index');	
	}
	
	function mengirimUsernamePassword($username,$password,$email,$namaPengguna){
		$this->load->library('email');
		$config = array();
		$config['charset'] = 'utf­8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		$config['smtp_port']= "465";
		//$config['smtp_timeout']= "400";
		$config['smtp_user']= "tessistemperingatandini@gmail.com"; // alamat email
		$config['smtp_pass']= "cumatesaja"; // password emailnya
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$this->email->set_newline("\r\n");
		//memanggil library email dan set konfigurasi untuk pengiriman email
		$this->email->initialize($config);
		//konfigurasi pengiriman
		$this->email->from($config['smtp_user']);
		$this->email->to($email);
		$this->email->subject("Selamat Datang di Sistem Peringatan Dini Masa Kontrak Karyawan PT. Surya Optima Nusa Raya");
		$isi = "Hai ". $namaPengguna. ", <br> <br> Anda kami kirim karena email anda terdafar sebagai pengguna Sistem Peringatan Dini Masa Kontrak Karyawan PT. Surya Optima Nusa Raya. Berikut adalah Username dan Password anda <br><br> <b> Segera Ubah Username dan Password Anda sesuai Kebutuhan Anda... </b> <br> <table> <tr> <td> Username </td> <td> : </td> <td>".$username. "</td> </tr> <tr> <td> Password</td> <td> : </td> <td>". $password. "</td> </tr> </table> <br> <br> Salam, <br> Hok Liang";

		$this->email->message(
   				$isi
		);
		if($this->email->send())
		{
			echo "<script>alert('Berhasil melakukan penambahan, Username dan Password $namaPengguna akan dikirim ke email $namaPengguna');history.go(-2);</script>";
		}else
			{
			echo "<script>alert('Berhasil melakukan penambahan, namun gagal mengirim email');history.go(-2);</script>";
			}	
	}
	function manajemenAkun($id)
	{
		if($_POST == NULL) {
			$this->load->model('Pengguna');
			$data ['hasil'] = $this->Pengguna->modGetPengguna($id);
			$this->load->view('pengubahanUser', $data);
		}
		else {
			$this->load->model('Pengguna');
			$this->Pengguna->modManajemenAkun($id);
			redirect('PengelolaanPenerimaPeringatan/index');
		}
	}
	
	function ubahPassword($id) 
	{
		if($_POST == NULL) {
			$this->load->model('Pengguna');
			$data ['hasil'] = $this->Pengguna->modGetPengguna($id);
			$this->load->view('pengubahanPassword', $data);
		}
		else {
			$this->load->model('Pengguna');
			$this->Pengguna->modUbahPassword($id);
			$message = "Pasword Berhasil Disimpan";
echo "<h2><b><p align='center'>$message</p></b></h2>";
		}
		
	}
	
 }
?>