<?php
 class PengelolaanCuti extends CI_Controller {
 	
	function __Construct () 
	{
		parent::__Construct();
		
	}
	
	function index () {
		//redirect ('PengelolaanLiburNasional/melihatLiburNasional');
	}
	
	function menghitungWaktuCuti() {
    
	//load jenis
	$jenis = $this->input->post('jenis');
	
	if ($jenis == "Tahunan"){
    $tgl_awal = $tgl_akhir = $minggu =  $koreksi = $libur = $ketemu = 0;
	
	//load tanggal libur nasional
	$this->load->model('LiburNasional');
    $liburnasional = $this->LiburNasional->modTanggalLibur();
    
	//load input
    $nrp =  $this->input->post('nrp');
	$tglawal = $this->input->post('tanggalAwal');
	$tglakhir= $this->input->post('tanggalAkhir');
	$keperluan = $this->input->post('keperluan');
	
	// mencari tanggal masuk kembali
	$tglakhir = date('d-m-Y', strtotime($tglakhir));
	$tglmasuk = date('d-m-Y', strtotime("+1 day", strtotime($tglakhir)));
	
	//    memecah tanggal untuk mendapatkan hari, bulan dan tahun
    $pecah_tglawal = explode("-", $tglawal);
    $pecah_tglakhir = explode("-", $tglakhir);
	
//    mengubah Gregorian date menjadi Julian Day Count
    $tgl_awal = gregoriantojd($pecah_tglawal[1], $pecah_tglawal[0], $pecah_tglawal[2]);
    $tgl_akhir = gregoriantojd($pecah_tglakhir[1], $pecah_tglakhir[0], $pecah_tglakhir[2]);
	
	if($tgl_awal > $tgl_akhir){
		echo "<script>alert('Harap Memasukkan Tanggal Cuti Dengan Benar!');history.go(-1);</script>";
	}
	else{
	//mencocokkan nrp yg diinputkn dengan nrp webservice
	$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan/format/json');
	$json = json_decode($data, TRUE);
	foreach($json as $urutan => $array) {
			 if($array['nrp'] == $nrp){
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'Nama' => $array['Nama'], 
						'HakCutiTahunan' => $array['HakCutiTahunan'] ,
						'Alamat' =>$array['Alamat'],
						'no_telepon' => $array['no_telepon'],
						'Jabatan' => $array['Jabatan'],
						'Bagian' => $array['Bagian']
						);
						$ketemu = 1;		
				} 			
			}	
	if($ketemu == 1){
 
//    mengubah ke unix timestamp
    $jmldetik = 24*3600;
    $a = strtotime($tglawal);
    $b = strtotime($tglakhir);
	$c = strtotime($tglmasuk);
    
//    menghitung jumlah libur nasional yang bukan hari minggu
    for($i=$a; $i<$b; $i+=$jmldetik){
        foreach ($liburnasional as $key => $tgllibur) {
            if($tgllibur==date("d-m-Y",$i) && date("w", $i) != "0"){
                $libur++;
            }
        }
    }
    
//    menghitung jumlah hari minggu
    for($i=$a; $i<$b; $i+=$jmldetik){
        if(date("w",$i)=="0"){
            $minggu++;
        }
    }    
//    dijalankan jika $tglakhir adalah hari minggu
    if(date("w",$b)=="0"){
        $koreksi = 1;
    }
// dijalankan jika tglmasuk adalah hari minggu
	if (date("w",$c)=="0"){
	$tglakhir = date('d-m-Y', strtotime($tglakhir));
	 $tglmasuk = date('d-m-Y', strtotime("+2 days", strtotime($tglakhir)));
    }
//    mengitung selisih dengan pengurangan kemudian ditambahkan 1 agar tanggal awal cuti juga dihitung
    $jumlahcuti =  $tgl_akhir - $tgl_awal - $libur - $minggu  - $koreksi + 1;
	if($data['HakCutiTahunan']>0){
	$sisa = $data['HakCutiTahunan'] - $jumlahcuti;
	} 
	else $sisa=0; 
	 $data2= array(
	 		'jenis' => $jenis,
			'nrp' => $nrp,
			'nama' => $data['Nama'],
			'hakCutiTahunan' => $data['HakCutiTahunan'],
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'jumlahcuti' => $jumlahcuti. " Hari",
			'keperluan'  => $keperluan,
			'sisa'    => $sisa,
			'tglmasuk' => $tglmasuk,
			'bagian' => $data['Bagian'],
			'jabatan' => $data['Jabatan'],
			'alamat' => $data['Alamat'],
			'no_telepon' => $data['no_telepon']
	);
	$data3[] = (object)$data2;
	$data4['hasil'] = $data3;
	$this->load->view('penglihatanCuti', $data4);
  }
  else echo "<script>alert('NRP Tidak Ditemukan');history.go(-1);</script>";
 	} // end if tanggal awal > tanggal akhir
 } //end if jenis cuti tahunan
 else if ($jenis == "Melahirkan"){
 	$ketemu = 0;
 	//load input 
 	$nrpM =  $this->input->post('nrpMelahirkan');
	$tglawalM = $this->input->post('tanggalAwalMelahirkan');
	
	//mencocokkan
	$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan/format/json');
	$json = json_decode($data, TRUE);
	foreach($json as $urutan => $array) {
			 if($array['nrp'] == $nrpM){
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'Nama' => $array['Nama'],
						'jenis_kelamin' => $array['jenis_kelamin'],
						'Alamat' =>$array['Alamat'],
						'no_telepon' => $array['no_telepon'],
						'Jabatan' => $array['Jabatan'],
						'Bagian' => $array['Bagian']
						);
						$ketemu = 1;		
				} 			
			}
	if($ketemu == 1 && $data['jenis_kelamin'] == "Perempuan"){
	//mencari taggal akhir dan tanggal masuk kembali
	$tglawalM = date('d-m-Y', strtotime($tglawalM));
	$tglakhirM = date('d-m-Y', strtotime("+3 months", strtotime($tglawalM)));
	$tglakhirM = date('d-m-Y', strtotime($tglakhirM));
	$tglMasukM =  date('d-m-Y', strtotime("+1 day", strtotime($tglakhirM)));
    
	// dijalankan ketika tglMasukM adalah hari minggu
	$d = strtotime($tglMasukM);
	if (date("w",$d)=="0"){
	 $tglakhirM = date('d-m-Y', strtotime($tglakhirM));
	 $tglMasukM = date('d-m-Y', strtotime("+2 days", strtotime($tglakhirM)));
    }
	
	//load view
	$jumlahcuti = "3 Bulan";
	$sisa = "&nbsp;";
	$hakCutiTahunan = "&nbsp;";
	$keperluan = "Melahirkan";
	$data2= array(
			'jenis' => $jenis,
			'nrp' => $nrpM,
			'nama' => $data['Nama'],
			'tglawal' => $tglawalM,
			'tglakhir' => $tglakhirM,
			'jumlahcuti' => $jumlahcuti,
			'keperluan'  => $keperluan,
			'sisa'   => $sisa,
			'hakCutiTahunan' => $hakCutiTahunan,
			'tglmasuk'  => $tglMasukM,
			'bagian' => $data['Bagian'],
			'jabatan' => $data['Jabatan'],
			'alamat' => $data['Alamat'],
			'no_telepon' => $data['no_telepon']
	);
	$data3[] = (object)$data2;
	$data4['hasil'] = $data3;
	$this->load->view('penglihatanCuti', $data4);
	}
	else if($data['jenis_kelamin'] != "Perempuan") {
		echo "<script>alert('Anda Seorang Laki-laki Tidak Berhak Mengambil Cuti Melahirkan');history.go(-1);</script>";
			}
	else if($ketemu == 0) {
		echo "<script>alert('NRP Tidak Ditemukan');history.go(-1);</script>";
			}
 		} //end if jenis cuti melahirkan
 	} // end menghitung waktu cuti
	
	
   function mencetakFormCuti(){
		//load library
		$this->load->library('m_pdf');
	
		//load input
		$jenis = $this->input->post("jenis");
		$nama = $this->input->post("nama");
		$nrp = $this->input->post("nrp");
		$tglawal = $this->DateToIndo($this->input->post("tglawal"));
		$tglakhir = $this->DateToIndo($this->input->post("tglakhir"));
		$hakcuti = $this->input->post("hakcuti");
		$jumlahcuti = $this->input->post("jumlahcuti");
		$sisa = $this->input->post("sisa");
		$keperluan = $this->input->post("keperluan");
		$tglmasuk =  $this->DateToIndo($this->input->post("tglmasuk"));
		$bagian =   $this->input->post("bagian");
		$jabatan = $this->input->post("jabatan");
		$alamat = $this->input->post("alamat");
		$no_telepon = $this->input->post("no_telepon");
		
		//load bulan ini
		$array_bulan = array(1=>"januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$bulan = $array_bulan[date('n')];
		
		//print pdf
		$data= array(
			'nrp' => $nrp,
			'nama' => $nama,
			'hakCutiTahunan' => $hakcuti,
			'tglawal' => $tglawal,
			'tglakhir' => $tglakhir,
			'jumlahcuti' => $jumlahcuti,
			'jenis' => $jenis,
			'keperluan' => $keperluan,
			'sisa'    => $sisa,
			'tglmasuk' => $tglmasuk,
			'bagian' => $bagian,
			'jabatan' => $jabatan,
			'alamat'=> $alamat,
			'no_telepon' => $no_telepon,
			'bulan' =>$bulan
	);
		$data2[] = (object)$data;
		$data3['hasil'] = $data2;	
		$html=$this->load->view('form_cuti',$data3, true);
		
		
		//nama pdf yang akan di download
		$pdfFileName ="Form Cuti-".$nama."-download.pdf";
		
		//pass mPDF parameter pada fungsi load()
		$pdf = $this->m_pdf->load();
		//generate PDF
		$pdf->SetHTMLHeader('<div><table><tr><td><img src="' . base_url() . 'assets/img/logo.jpg" height="70" width="70"></img></td><td> </td><td><br><br><b> PT. Surya Optima Nusa Raya </b> <br> <i>HRD Department</i></td></tr></table></div>');
		$pdf->AddPage('P', // L - landscape, P - portrait 
        '', '', '', '',
        25, // margin_left
        20, // margin right
       32, // margin top
       4, // margin bottom: 30
        10, // margin header
        3, // margin footer
		'', // odd-header name
		'', // even header-name
		'', // odd footer name
		'', //even footer name
		'', // odd header value
		'', // even header value
		'', //odd footer value
		'', //even footer value
		'', // page selector
		'F4' //sheet size
		); 
		$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		ob_clean();
		$script="this.print();";
        $pdf->SetJS($script);
		$pdf->Output($pdfFileName, "I");
	}
	
	function DateToIndo($date) { 
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
	
		$tahun = substr($date, 6, 4); // memisahkan format tahun menggunakan substring(string, Mulai, panjangnya)
		$bulan = substr($date, 3, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 0, 2); // memisahkan format tanggal menggunakan substring
		
		 $info=date('w', mktime(0,0,0,$bulan,$tgl,$tahun));
    
    	switch($info){
        case '0': $hari = "Minggu"; break;
        case '1': $hari = "Senin"; break;
        case '2': $hari = "Selasa"; break;
        case '3': $hari = "Rabu"; break;
        case '4': $hari = "Kamis"; break;
        case '5': $hari = "Jumat"; break;
        case '6': $hari = "Sabtu"; break;
    };
		
		$result =  $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun ." &nbsp;&nbsp;(Hari <i>". $hari ."</i>)" ;
		return($result);
}
 }
?>