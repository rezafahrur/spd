<?php
 // ini Backup untuk filter kontrak tidak perpanjang
	class EarlyWarning extends CI_Controller
	{
		public function cariKaryawanyangAkanHabisKontrak(){
			$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan/format/json');
			$json = json_decode($data, TRUE);
			date_default_timezone_set('Asia/Jakarta');
			$tanggal= mktime(date("m"),date("d"),date("Y"));
			$tanggalsekarang = date("Y-m-d", $tanggal);
			foreach($json as $urutan => $array) {
			 $selisih = ((abs(strtotime ($tanggalsekarang) - strtotime ($array['EndDate'])))/(60*60*24));
			 if($selisih<30) {
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'Nama' => $array['Nama'], 
						'EndDate' => $array['EndDate'], 
						'StartDate' => $array['StartDate']
						);
						$hasil[] =(object)$data;
						
				} 
							
			}	
		$data2['hasil'] = $hasil;
			$this->load->model('KontrakTidakPerpanjang');
			
			$data3['hasil2'] = $this->KontrakTidakPerpanjang->modFilterKontrakTidakPerpanjang();
			//echo '<pre>'.print_r($data2,TRUE). '</pre><br><br>';
			//echo '<pre>'.print_r($data3,TRUE). '</pre><br><br>';
			
			$arr= array();
			foreach ($data3['hasil2'] as $dat2) {
				$arr[]=$dat2->nrp;
			}
		//	echo '<pre>'.print_r($arr,TRUE). '</pre><br><br>';
			$data4= array();
			foreach ($data2['hasil'] as $dat) {
				$arr2= $dat->nrp;
				if(!in_array($arr2,$arr)){
					$data5 = array(
								'nrp' => $dat->nrp,
								'Nama' => $dat->Nama,
								'StartDate' => $dat->StartDate,				
								'EndDate' => $dat->EndDate	
							);
						$has[]= (object) $data5; 
				}
			}
			$data6['hasil'] = $has;
			//echo '<pre>'.print_r($data6,TRUE). '</pre><br><br>';
			
			/*
			foreach ($data2 as $hasill){
				foreach  ($data3 as $hasilll){
					
				echo '<pre>'.print_r($hasill[0]->nrp,TRUE). '</pre><br><br>';
				echo '<pre>'.print_r($hasilll[0]->nrp,TRUE). '</pre><br><br>';
			}
			} */
			 $this->load->view('home', $data6);
		}
	}
?>