<?php
	class EarlyWarning extends CI_Controller
	{
		public function cariKaryawanyangAkanHabisKontrak(){
			$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan/format/json');
			$json = json_decode($data, TRUE);
			echo '<pre>'.print_r($json,TRUE). '</pre>';
			
			$endDate= $json[3]['Nama'];
			echo '<br><br> Putus <br><br>'.$endDate;
			
			echo '<br><br>';
			
			
			
			//$total= count($json);
			
			date_default_timezone_set('Asia/Jakarta');
			$tanggal= mktime(date("m"),date("d"),date("Y"));
			$tanggalsekarang = date("Y-m-d", $tanggal);
			echo $tanggalsekarang . '<br><br>';
			/*
			//echo '<br><br>';
			//echo $json [0]['EndDate']; // <---- Cara Baca Json yang urut
			for ($no=0; $no<$total; $no++) {
				 $selisih = ((abs(strtotime ($tanggalsekarang) - strtotime ($json[$no]['EndDate'])))/(60*60*24));
				if($selisih<30) { //mengecek dengan selisih tanggal sekarang yang kurang dari 30
					
				
				echo 'nama adalah ' . $json[$no]['Nama']. ' &nbsp EndDate Adalah '.$json[$no]['EndDate']. ' kurang ' . $selisih  . ' hari dari ' . $tanggalsekarang . ' saat ini<br>' ; 
				 
				}
				
			} */
			
			
			foreach($json as $urutan => $array) {
			
			 $selisih = ((abs(strtotime ($tanggalsekarang) - strtotime ($array['EndDate'])))/(60*60*24));
			 if($selisih<30) {
				$data = array ('Nama' => $array['Nama'], 'tanggalAkhir' => $array['EndDate'], 'tanggalAwal' => $array['StartDate']);
			  $this->load->view('home', $data);
			 
			//	echo $array['Nama'] . '<br>'; 
				}
				/*
				if(!is_array($array)) {
					echo $urutan . '=>'. $array.'<br>';
				}
				else {
					foreach ($array as $namafield => $isi) {
						//echo $namafield. '=>'. $isi. '<br>';
					}
				} */
			} 
		}	
	}
?>