<?php
class LiburNasional extends CI_Model {
	
	function modMembuatLiburNasional($data)
	{
		
		$this->db->insert('liburnasional', $data);
	}
	
	function modMelihatLiburNasional()
	{
		$melihatLiburNasional = $this->db->get('liburnasional'); //nama tabel
		if ($melihatLiburNasional->num_rows () > 0){
				foreach ($melihatLiburNasional->result() as $data) {
					
					$hasil [] = $data;
				}
				return $hasil;
		}
	}
	
	function modTanggalLibur()
	{
	   $koneksi = mysqli_connect('localhost', 'root', '', 'sistemperingatandini');
	  $query = "SELECT * FROM liburnasional";
       $result = mysqli_query($koneksi, $query);
       while ($row = mysqli_fetch_array($result)) {
        $liburnasional[] = $this->tglindo($row['tanggal_libur']);
    }
	return $liburnasional;
	}
	
	function tglindo($tgl){
    // merubah dari yyyy-mm-dd menjadi dd-mm-yyyy
    $p = explode('-', $tgl);
    return $p[2].'-'.$p[1].'-'.$p[0];
}
	function modMengubahLiburNasional($id)
	{
		$tanggalLibur    = $this->input->post('tanggal_libur');
		$keterangan = $this->input->post('keterangan');
		$data = array(
				'tanggal_libur' => $tanggalLibur,
				'keterangan' => $keterangan
				);
		$this->db->where('id_libur', $id);
		$this->db->update('liburnasional', $data);
	}
	
	function modGetLiburNasional($id)
	{
		return $this->db->get_where('liburnasional', array('id_libur' => $id)) ->row();
	}
	
	function modMenghapusLiburNasional($id)
	{
		return $this->db->delete('liburnasional', array('id_libur' => $id));
	}
}
?>