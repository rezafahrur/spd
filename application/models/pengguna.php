<?php
class Pengguna extends CI_Model {
	
	function modMembuatPengguna ($data)
	{
		
		$this->db->insert('pengguna', $data);
	}
	
	function modMelihatPengguna()
	{
		$melihatPengguna = $this->db->get('pengguna'); //nama tabel
		if ($melihatPengguna->num_rows () > 0){
				foreach ($melihatPengguna->result() as $data) {
					
					$hasil [] = $data;
				}
				return $hasil;
		}
	}
	
	function modMengubahPengguna($id)
	{
		$namaPengguna = $this->input->post('namaPengguna');
		$email    = $this->input->post('email');
		$hakAkses = $this->input->post('hakAkses');
		$nrp = $this->input->post('nrp');
		$data = array(
				'NamaPengguna' => $namaPengguna,
				'nrp'    => $nrp,
				'Email'  =>  $email,
				'HakAkses' => $hakAkses
				);
		$this->db->where('idPengguna', $id);
		$this->db->update('pengguna', $data);
	}
	
	function modGetPengguna($id)
	{
		return $this->db->get_where('pengguna', array('idPengguna' => $id)) ->row();
	}
	
	function modMenghapusPengguna()
	{
		$this->db->delete('pengguna', array('idPengguna' => $id));
	}
	
	function modManajemenAkun($id)
	{
		$username = $this->input->post('username');
		$namaPengguna = $this->input->post('namaPengguna');
		$email    = $this->input->post('email');
		$data = array(
				'NamaPengguna' => $namaPengguna,
				'Email'  =>  $email,
				'Username' => $username
				);
		$this->db->where('idPengguna', $id);
		$this->db->update('pengguna', $data);
		if($this->session->userdata('idPengguna') == $id)
		{
			$this->session->set_userdata('NamaPengguna', $namaPengguna);	
		}
	}
	
	function modUbahPassword($id)
	{
		$password = md5($this->input->post('password'));
		$data = array(
				'Password' => $password
			);
		$this->db->where('idPengguna', $id);
		$this->db->update('pengguna', $data);
	}
}
?>