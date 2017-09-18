<?php
class PenerimaPeringatan extends CI_Model {
	
	function modMembuatPenerimaPeringatan ()
	{
		$namaPenerimaPeringatan = $this->input->post('namaPenerimaPeringatan');
		$emailPenerimaPeringatan = $this->input->post('emailPenerimaPeringatan');
		$peringatanKontrak		= $this->input->post('peringatanKontrak');
		$peringatanJamKeluar   = $this->input->post('peringatanJamKeluar');
		$data = array(
				'NamaPenerimaPeringatan' => $namaPenerimaPeringatan,
				'EmailPenerimaPeringatan' => $emailPenerimaPeringatan,
				'PeringatanKontrak'		  => $peringatanKontrak,
					'PeringatanJamKeluar'	  => $peringatanJamKeluar
				);
		$this->db->insert('penerimaperingatan', $data);
	}
	
	function modMelihatPenerimaPeringatan()
	{
		$melihatPenerimaPeringatan = $this->db->get('penerimaperingatan');
		if ($melihatPenerimaPeringatan->num_rows () > 0){
				foreach ($melihatPenerimaPeringatan->result() as $data) {
					$hasil [] = $data;
				}
				return $hasil;
		}
	}
	
	function modMengubahPenerimaPeringatan($id)
	{
		$namaPenerimaPeringatan = $this->input->post('namaPenerimaPeringatan');
		$emailPenerimaPeringatan = $this->input->post('emailPenerimaPeringatan');
		$peringatanKontrak		= $this->input->post('peringatanKontrak');
		$peringatanJamKeluar   = $this->input->post('peringatanJamKeluar');
		$data = array (
					'NamaPenerimaPeringatan' => $namaPenerimaPeringatan,
					'EmailPenerimaPeringatan' => $emailPenerimaPeringatan,
					'PeringatanKontrak'		  => $peringatanKontrak,
					'PeringatanJamKeluar'	  => $peringatanJamKeluar
				);
		$this->db->where('idPenerimaPeringatan', $id);
		$this->db->update('penerimaperingatan', $data);
	}
	
	function modGetPenerimaPeringatan($id)
	{
		return $this->db->get_where('penerimaperingatan', array('idPenerimaPeringatan' => $id)) ->row();
	}
	
	function modMenghapusPenerimaPeringatan($id)
	{
		return $this->db->delete('penerimaperingatan', array('idPenerimaPeringatan' => $id));
	}
	function check_unique_email($emailPenerimaPeringatan) {
            $query= $this->db->select('EmailPenerimaPeringatan')
                    ->from('penerimaperingatan')
                    ->where('idPenerimaPeringatan',$emailPenerimaPeringatan);

            $query = $this->db->get();
            if ($query->num_rows() > 0) {
             return $query->row()->EmailPenerimaPeringatan;
         }
		}
}
?>