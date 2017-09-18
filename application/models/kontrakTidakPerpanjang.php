<?php
   
   class KontrakTidakPerpanjang extends CI_Model {
   	
		
		function modFilterKontrakTidakPerpanjang(){
			$filterKontrakTidakPerpanjang = $this->db->get('kontraktidakperpanjang');
		if ($filterKontrakTidakPerpanjang->num_rows () > 0){
				foreach ($filterKontrakTidakPerpanjang->result() as $data) {
					$hasil [] = $data;
				}
				return $hasil;
		}
			
		}
		
		function modTidakPerpanjangKontrak($data){
			foreach ($data as $input){
				$masukan = array(
							'nrp' => $input->nrp,
							'Nama' => $input->Nama,
							'Enddate' => $input->EndDate
							);
			}
			$this->db->insert('kontraktidakperpanjang', $masukan);
		}
		
		function modHapusKontrakTidakPerpanjang ($hapus){
			foreach ($hapus as $del){
				$del = array (
						'nrp' => $del->nrp
						);
			}
			$this->db->delete('kontraktidakperpanjang', $del);
			
		}
   }
   
   
?>