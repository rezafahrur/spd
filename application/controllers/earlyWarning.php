<?php
	class EarlyWarning extends CI_Controller
	{
	  function index(){
			redirect('EarlyWarning/cariKaryawanyangAkanHabisKontrak');
		}
		
	  function cariKaryawanyangAkanHabisKontrak(){
		 if($this->session->userdata('status1') != "login" && $this->session->userdata('status2') != "unlock"){
			redirect(base_url("autentikasi"));
		}
		else if($this->session->userdata('status1') == "login" && $this->session->userdata('status2') == "lock") {
		redirect(base_url("autentikasi/kunci_layar"));
		}
		else {
			set_time_limit(0);
			$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan_kontrak/format/json');
			$json = json_decode($data, TRUE);
			date_default_timezone_set('Asia/Jakarta');
			$tanggal= mktime(date("m"),date("d"),date("Y"));
			$tanggalsekarang = date("Y-m-d", $tanggal);
			foreach($json as $urutan => $array) {
			 $selisih = ((abs(strtotime ($tanggalsekarang) - strtotime ($array['EndDate'])))/(60*60*24));
			 if($selisih<=30) {
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'Nama' => $array['Nama'], 
						'EndDate' => $array['EndDate'], 
						'StartDate' => $array['StartDate']
						);
						$hasil[] =(object)$data;
						
				} 
							
			}	
		// data karyawan untuk 30 hari ke depan	
			if(!empty ($hasil)){
			$data2['hasil'] = $hasil;
			
		// me-load untuk memfilter data kontrak yang tidak diperpanjang
			$this->load->model('KontrakTidakPerpanjang');
			$data3['hasil'] = $this->KontrakTidakPerpanjang->modFilterKontrakTidakPerpanjang();
			
			//filter datanya 
			if(empty($data3['hasil'])){
			 $this->load->view('home', $data2);
			}
			else{
			$arr= array();
			foreach ($data3['hasil'] as $dat2) {
				$arr[]=$dat2->nrp; //perulangan mengambil nilai nrp dari filter data KontrakTidakPerpanjang
			}
			
			
			foreach ($data2['hasil'] as $dat) {
				$arr2= $dat->nrp; //memasukkan nilai nrp dari data karyawan 30 hari ke depan ke variabel
				if(!in_array($arr2,$arr)){ //jika tidak sama maka akan ditampilkan
					$data5 = array(
								'nrp' => $dat->nrp,
								'Nama' => $dat->Nama,
								'StartDate' => $dat->StartDate,				
								'EndDate' => $dat->EndDate	
							);
						$hasilfilter[]= (object) $data5; 
				}
			}
			//memasukkan variabel hasil dari filter agar mudah dibaca View
			if (!empty($hasilfilter)){
			$data6['hasil'] = $hasilfilter;
			 $this->load->view('home', $data6);
			 }
			 else $this->load->view('home');
			 }
			 }
			else $this->load->view('home');
			} //end else autentikasi 
			 	
		}
		
		
		
		function mengirimPeringatanKontrak(){
		set_time_limit(0);
		$this->load->library('email');
		$this->load->helper('path');
		$this->load->helper('directory'); 
		
		//membuat file excel 
		//load library excel dan set heading
			 $this->load->library("Excel/PHPExcel");
			 $heading=array('No','nrp','Nama','StartDate','EndDate');
		//mengambil json dari webservice	
			$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan_kontrak/format/json');
			$json = json_decode($data, TRUE);
			date_default_timezone_set('Asia/Jakarta');
			$tanggal= mktime(date("m"),date("d"),date("Y"));
			$tanggalsekarang = date("Y-m-d", $tanggal);
			foreach($json as $urutan => $array) {
			 $selisih = ((abs(strtotime ($tanggalsekarang) - strtotime ($array['EndDate'])))/(60*60*24));
			 if($selisih<=30) {
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'Nama' => $array['Nama'], 
						'EndDate' => $array['EndDate'], 
						'StartDate' => $array['StartDate']
						);
						$hasil[] =(object)$data;		
				} 			
			}	
			if(!empty ($hasil)){
			$data2['hasil'] = $hasil;
		// me-load untuk memfilter data kontrak yang tidak diperpanjang
			$this->load->model('KontrakTidakPerpanjang');
			$data3['hasil'] = $this->KontrakTidakPerpanjang->modFilterKontrakTidakPerpanjang();
			
			//filter datanya 
			if(empty($data3['hasil'])){
			 //membuat objek excel 
			 $objPHPExcel = new PHPExcel();
    		$objPHPExcel->getActiveSheet()->setTitle('Daftar Karyawan');
			//loop heading
			$rowNumberH = 1;
    		$colH = 'A';
    		foreach($heading as $h){
        			$objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
        			$colH++;    
    			}
			//loop isinya
                $row = 2;
        		$no = 1;
				foreach($hasil as $n){
            		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$no);
            		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n->nrp);
            		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n->Nama);
            		$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$n->StartDate);
            		$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$n->EndDate);
            		$row++;
            		$no++;
        			}
		 		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
            //unduh file
            	$objWriter->save("file/SuryaKontrak.xlsx");
			//end if
			//mengirimkan peringatan
		if($hasil != NULL ){
		$config = array();
		$config['charset'] = 'utf­8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		$config['smtp_port']= "465";
		$config['smtp_timeout']= "400";
		$config['smtp_user']= "tessistemperingatandini@gmail.com"; // alamat email 
		$config['smtp_pass']= "cumatesaja"; // password emailnya
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$this->email->set_newline("\r\n");
		//memanggil library email dan set konfigurasi untuk pengiriman email
		$this->email->initialize($config);
		//seting lampiran Excel
		$path = set_realpath('file/SuryaKontrak.xlsx');
		$file_names = directory_map($path);
		//meload daftar penerima peringatan
		$this->load->model('PenerimaPeringatan');
	  	$daftar['hasil'] = $this->PenerimaPeringatan->modMelihatPenerimaPeringatan();
		//konfigurasi pengiriman
		foreach ($daftar['hasil'] as $penerima)
		{
		if($penerima->PeringatanKontrak == 1)
		{
		$this->email->clear(TRUE);
		$this->email->from($config['smtp_user']);
		$this->email->to($penerima->EmailPenerimaPeringatan);
		$this->email->subject("Laporan Karyawan Kontrak yang Akan Habis Kontrak");
		$isi = "Dear ". $penerima->NamaPenerimaPeringatan . ",<br><br> Ini adalah daftar Karyawan yang akan habis kontraknya. <br><br>Salam,<br><br>Hok Liang";
		$this->email->message(
   				$isi
		);	
		$this->email->attach($path.$file_names);
		$this->email->send();
		} //end if penerima kontrak
		} //endforeach
		}
			}
			else
			{
			$arr= array();
			foreach ($data3['hasil'] as $dat2) {
				$arr[]=$dat2->nrp; //perulangan mengambil nilai nrp dari filter data KontrakTidakPerpanjang
			}
			
			
			foreach ($data2['hasil'] as $dat) {
				$arr2= $dat->nrp; //memasukkan nilai nrp dari data karyawan 30 hari ke depan ke variabel
				if(!in_array($arr2,$arr)){ //jika tidak sama maka akan ditampilkan
					$data5 = array(
								'nrp' => $dat->nrp,
								'Nama' => $dat->Nama,
								'StartDate' => $dat->StartDate,				
								'EndDate' => $dat->EndDate	
							);
						$hasilfilter[]= (object) $data5; 
				}
			} 
			if(!empty($hasilfilter)){
			  //membuat objek excel 
			 	$objPHPExcel = new PHPExcel();
    			$objPHPExcel->getActiveSheet()->setTitle('Daftar Karyawan');
			//loop heading
				$rowNumberH = 1;
    			$colH = 'A';
    			foreach($heading as $h){
        			$objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
        			$colH++;    
    				}
			//loop isinya
                $row = 2;
        		$no = 1;
				
				foreach($hasilfilter as $n){
            		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$no);
            		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n->nrp);
            		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n->Nama);
            		$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$n->StartDate);
            		$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$n->EndDate);
            		$row++;
            		$no++;
        			}
		 			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
            //unduh file
            	$objWriter->save("file/SuryaKontrak.xlsx");
			 }
			 else $hasilfilter=NULL;
			 //mengirimkan peringatan
		if($hasilfilter != NULL ){
		$config = array();
		$config['charset'] = 'utf­8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		$config['smtp_port']= "465";
		$config['smtp_timeout']= "400";
		$config['smtp_user']= "tessistemperingatandini@gmail.com"; // alamat email 
		$config['smtp_pass']= "cumatesaja"; // password emailnya
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$this->email->set_newline("\r\n");
		//memanggil library email dan set konfigurasi untuk pengiriman email
		$this->email->initialize($config);
		//seting lampiran Excel
		$path = set_realpath('file/SuryaKontrak.xlsx');
		$file_names = directory_map($path);
		//meload daftar penerima peringatan
		$this->load->model('PenerimaPeringatan');
	  	$daftar['hasil'] = $this->PenerimaPeringatan->modMelihatPenerimaPeringatan();
		//konfigurasi pengiriman
		foreach ($daftar['hasil'] as $penerima)
		{
		if($penerima->PeringatanKontrak == 1){
		$this->email->clear(TRUE);
		$this->email->from($config['smtp_user']);
		$this->email->to($penerima->EmailPenerimaPeringatan);
		$this->email->subject("Laporan Karyawan Kontrak yang Akan Habis Kontrak");
		$isi = "Dear ". $penerima->NamaPenerimaPeringatan . ",<br><br> Ini adalah daftar Karyawan yang akan habis kontraknya. <br><br>Salam,<br><br>Hok Liang";
		$this->email->message(
   				$isi
		);	
		$this->email->attach($path.$file_names);
		$this->email->send();
		} //endif peringatan kontrak
		} //endforeach
		} //end hasilfiter !=Null
			 } // end else !empty data3['hasil']
		}// end if !empty hasil
	  } //end function
	  
	  
	  
	  function mengirimPeringatanAbsensiJamKeluar(){
		$this->load->library('email');
		$this->load->helper('path');
		$this->load->helper('directory'); 
		
		//membuat file excel 
		//load library excel dan set heading
			 $this->load->library("Excel/PHPExcel");
			 $heading=array('No','nrp','Nama','Jam Keluar', 'Jam Masuk');
		//mengambil json dari webservice	
			$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_absensi/format/json');
			$json = json_decode($data, TRUE);
			// set waktu awal kemarin
			date_default_timezone_set('Asia/Jakarta');
			$tanggal= mktime(0, 0, 0,date("m"),date("d")-1,date("Y"));
			$waktukemarin = date("Y-m-d 00:00:00", $tanggal);
           //bandingkan
			foreach($json as $urutan => $array) {
			 if(strtotime ($array['jam_masuk']) > strtotime ($waktukemarin) && strtotime ($array['jam_keluar']) == strtotime ($waktukemarin)) { 
			 if ($array['keterangan'] == 'Masuk' || $array['keterangan'] == 'Terlambat') {
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'nama' => $array['nama'], 
						'jam_keluar' => $array['jam_keluar'],
						'jam_masuk' => $array['jam_masuk']
						);
						$hasil[] =(object)$data;		
				} 	//endif		
			  } //endif
			} //endforeach
			// echo '<pre>';	print_r($hasil); echo '</pre>';
			
			if(!empty ($hasil)){
			 //membuat objek excel 
			 $objPHPExcel = new PHPExcel();
    		$objPHPExcel->getActiveSheet()->setTitle('Absensi Tidak Ada Jam Keluar');
			//loop heading
			$rowNumberH = 1;
    		$colH = 'A';
    		foreach($heading as $h){
        			$objPHPExcel->getActiveSheet()->setCellValue($colH.$rowNumberH,$h);
        			$colH++;    
    			}
			//loop isinya
                $row = 2;
        		$no = 1;
				foreach($hasil as $n){
            		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$no);
            		$objPHPExcel->getActiveSheet()->setCellValue('B'.$row,$n->nrp);
            		$objPHPExcel->getActiveSheet()->setCellValue('C'.$row,$n->nama);
            		$objPHPExcel->getActiveSheet()->setCellValue('D'.$row,$n->jam_keluar);
            		$objPHPExcel->getActiveSheet()->setCellValue('E'.$row,$n->jam_masuk);
            		$row++;
            		$no++;
        			}
		 		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
            //unduh file
            	$objWriter->save("file/SuryaAbsensiTidakAdaJamKeluar.xlsx");
		} //endif hasil not empty
			//mengirimkan peringatan
		if($hasil != NULL ){
		$config = array();
		$config['charset'] = 'utf­8';
		$config['useragent'] = 'Codeigniter';
		$config['protocol']= "smtp";
		$config['mailtype']= "html";
		$config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		$config['smtp_port']= "465";
		$config['smtp_timeout']= "400";
		$config['smtp_user']= "tessistemperingatandini@gmail.com"; // alamat email 
		$config['smtp_pass']= "cumatesaja"; // password emailnya
		$config['crlf']="\r\n";
		$config['newline']="\r\n";
		$config['wordwrap'] = TRUE;
		$this->email->set_newline("\r\n");
		//memanggil library email dan set konfigurasi untuk pengiriman email
		$this->email->initialize($config);
		//seting lampiran Excel
		$path = set_realpath('file/SuryaAbsensiTidakAdaJamKeluar.xlsx');
		$file_names = directory_map($path);
		//meload daftar penerima peringatan
		$this->load->model('PenerimaPeringatan');
	  	$daftar['hasil'] = $this->PenerimaPeringatan->modMelihatPenerimaPeringatan();
		//konfigurasi pengiriman
		foreach ($daftar['hasil'] as $penerima)
		{
		if($penerima->PeringatanJamKeluar == 1) {
		$this->email->clear(TRUE);
		$this->email->from($config['smtp_user']);
		$this->email->to($penerima->EmailPenerimaPeringatan);
		$this->email->subject("Laporan Karyawan yang Tidak Ada Absensi Jam Keluar");
		$isi = "Dear ". $penerima->NamaPenerimaPeringatan . ",<br><br> Ini adalah laporan Karyawan yang belum ada jam keluarnya. <br><br>Salam,<br><br>Hok Liang";
		$this->email->message(
   				$isi
		);	
		$this->email->attach($path.$file_names);
		$this->email->send();
		} //endif peringatan jam keluar
		} //endforeach
		} //endif mengirim (hasil != NULL)
	  } //end function
	  
	  
	  
	  function faq($no){
	  	if ($no == "utama"){
	  	$this->load->view('penglihatanFAQ');
		}
		else if ($no == 1){
			$this->load->view('faq/faq1');
		}
		else if ($no == 2){
			$this->load->view('faq/faq2');
		}
		else if ($no == 3){
			$this->load->view('faq/faq3');
		}
		else if ($no == 4){
			$this->load->view('faq/faq4');
		}
		else if ($no == 5){
			$this->load->view('faq/faq5');
		}
		else if ($no == 6){
			$this->load->view('faq/faq6');
		}
	  }
	}
?>