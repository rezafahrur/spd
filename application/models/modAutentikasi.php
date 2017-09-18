<?php
   class ModAutentikasi extends CI_Model{	
   function modLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'Username' => $username,
			'Password' => md5($password)
			);
		$this->cekStatusAutentikasi("pengguna",$where);
	}
   
	function cekStatusAutentikasi($table,$where){		
		$cek = $this->db->get_where($table,$where);
		 if($cek->num_rows() == 1){
 			foreach ($cek->result() as $sess) {
				$sess_data['status1'] = 'login';
				$sess_data['status2'] = 'unlock';
				$sess_data['idPengguna'] = $sess->idPengguna;
				$sess_data['Username'] = $sess->Username;
				$sess_data['NamaPengguna'] = $sess->NamaPengguna;
				$sess_data['HakAkses'] = $sess->HakAkses;
				$this->session->set_userdata($sess_data);
			}
				redirect('EarlyWarning');
		}else{
			echo "<script>alert('Gagal Login: Harap Cek Username dan Password Anda!');history.go(-1);</script>";
		}
	}	
	
	function cekUnlock($table,$where){		
		$cek = $this->db->get_where($table,$where);
		 if($cek->num_rows() == 1){
 			foreach ($cek->result() as $sess) {
				$sess_data['status1'] = 'login';
				$sess_data['status2'] = 'unlock';
				$sess_data['idPengguna'] = $sess->idPengguna;
				$sess_data['Username'] = $sess->Username;
				$sess_data['NamaPengguna'] = $sess->NamaPengguna;
				$sess_data['HakAkses'] = $sess->HakAkses;
				$this->session->set_userdata($sess_data);
			}
				echo "<script> window.history.go(-2);</script>";
		}else{
			echo "<script>alert('Gagal Membuka Kunci: Harap Cek Password Anda!');history.go(-1);</script>";
		}
	}
}
?>