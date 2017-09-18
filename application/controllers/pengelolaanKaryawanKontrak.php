<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PengelolaanKaryawanKontrak extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		if($this->session->userdata('status1') != "login" && $this->session->userdata('status2') != "unlock"){
			redirect(base_url("autentikasi"));
		}
		else if($this->session->userdata('status1') == "login" && $this->session->userdata('status2') == "lock") {
		redirect(base_url("autentikasi/kunci_layar"));
		}
		else{
			
		// Load the configuration file
		$this->load->config('rest');
		
		// Load the rest client
		$this->load->spark('restclient/2.0.0');		
		// $this->rest->initialize(array('server' => $this->config->item('rest_server')));
		$this->rest->initialize(array('server' => 'http://localhost/webservice_karyawan/index.php/rest_karyawan/'));
		}
	}
	
	public function index()
	{
		$this->memanggilWebServiceMelihatKaryawan();
	}
	
	public function memanggilWebServiceMengubahKaryawan($nrp){
	
	if($_POST == NULL) {
			$data['hasil'] = $this->rest->get('karyawan/nrp/'.$nrp.'/format/json');
			$this->load->view('pengubahanKaryawanKontrak', $data);
			
	}
	else {
		
		$data = array(
			'Nama' => $this->input->post('Nama'), 'StartDate' => $this->input->post('StartDate'), 'EndDate' => $this->input->post('EndDate')
		);
		$query = $this->rest->post('update_karyawan/nrp/'.$nrp.'/format/php', $data);
		if($query){
			redirect('PengelolaanKaryawanKontrak/memanggilWebServiceMelihatKaryawan');
		} else {
			echo "<script>alert('Gagal Diubah'); window.close ();</script>";
		}
		}
	}
	public function memanggilWebServicePerpanjangKontrak($nrp){
	if ($this->session->userdata('HakAkses') == "Manager HRD" || $this->session->userdata('HakAkses') == "Staff HRD") {
	if($_POST == NULL) {
			$data['hasil'] = $this->rest->get('karyawan/nrp/'.$nrp.'/format/json');
			$this->load->view('penglihatanPerpanjanganKontrak', $data);
			
	}
	else {
		$gaji = $this->input->post('Gaji');
		$gaji = str_replace(".", "", $gaji);
		$terbilangUpah = $this->Terbilang($gaji);
		
		$transport = $this->input->post('transport');
		$transport = str_replace(".", "", $transport);
		$terbilangTransport = $this->Terbilang($transport);
		
		$lembur = $this->input->post('lembur');
		$lembur = str_replace(".", "", $lembur);
		$terbilangLembur = $this->Terbilang($lembur);
		
		$makan = $this->input->post('makan');
		$makan = str_replace(".", "", $makan);
		$terbilangMakan = $this->Terbilang($makan);
		
		$istri = $this->input->post('istri');
		$istri = str_replace(".", "", $istri);
		$terbilangIstri = $this->Terbilang($istri);
		
		$anak = $this->input->post('anak');
		$anak = str_replace(".", "", $anak);
		$terbilangAnak = $this->Terbilang($anak);
		
		$data = array(
			'StartDate' => $this->input->post('StartDate'), 
			'EndDate' => $this->input->post('EndDate'), 
			'Gaji' => $gaji,
			'tunjangan_transport' => $transport,
			'upah_lembur' => $lembur,
			'upah_makan' => $makan,
			'tunjangan_istri' => $istri,
			'tunjangan_anak' => $anak
		);
		$query = $this->rest->post('update_kontrak/nrp/'.$nrp.'/format/php', $data);
		if($query){
		
			//menghitung selisih dan terbilang selisih bulan
			$startdate = strtotime($this->input->post('StartDate'));
			$enddate = strtotime($this->input->post('EndDate'));
			$selama = 1 + (date("Y",$enddate)-date("Y",$startdate))*12;
			$selama += date("m",$enddate)-date("m",$startdate);
			$terbilangSelama = $this->Terbilang($selama);
		
			//cetak kontrak	
			$this->cetakKontrak($nrp, $terbilangUpah, $terbilangTransport, $terbilangLembur, $terbilangMakan, $terbilangIstri, $terbilangAnak, $selama, $terbilangSelama);
		} else {
			echo "<script>alert('Gagal Diubah'); window.close ();</script>";
		}
		}
		}
	}
	


	public function memanggilWebServiceMelihatKaryawan(){
		$query =$this->rest->get('all_karyawan_kontrak/format/json');
		$data['hasil']=$query;
		$this->load->view('penglihatanKaryawanKontrak', $data);
	}
	
	
	function cetakKontrak($nrp, $terbilangUpah, $terbilangTransport, $terbilangLembur, $terbilangMakan, $terbilangIstri, $terbilangAnak, $selama, $terbilangSelama)
	{
		//load library
		$this->load->library('m_pdf');
		
		//load from webservice untuk manager HRD
		 $dataM = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan/format/json');
		$jsonM = json_decode($dataM, TRUE);
		foreach($jsonM as $no => $arrayM) {
			 if($arrayM['Bagian'] == "HRD" && $arrayM['Jabatan'] == "Manager"){
				$Manager = array ( 
						'nrpM'=>$arrayM['nrp'], 
						'NamaM' => $arrayM['Nama']
						);				
				}
			  }
		
		//load tulisan hari dan bulan
		$array_hari = array(1=>"Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
		$hari = $array_hari[date("N")];
		$array_bulan = array(1=>"januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
		$bulan = $array_bulan[date('n')];
		
		//load from webservice untuk karyawan kontrak
		$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan_kontrak/format/json');
		$json = json_decode($data, TRUE);
		foreach($json as $urutan => $array) {
			 if($array['nrp'] == $nrp){
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'Nama' => $array['Nama'],
						'Alamat' =>$array['Alamat'],
						'StartDate' => $this->DateToIndo($array['StartDate']),
						'EndDate' => $this->DateToIndo($array['EndDate']),
						'Gaji' => $array['Gaji'],
						'tunjangan_transport' => $array['tunjangan_transport'],
						'tunjangan_lembur' => $array['upah_lembur'],
						'tunjangan_makan' => $array['upah_makan'],
						'tunjangan_istri' => $array['tunjangan_istri'],
						'tunjangan_anak' => $array['tunjangan_anak'],
						);				
				} 			
			}
		
		
		//set view
		$view = array(
				'nrpM' => $Manager['nrpM'],
				'NamaM' => $Manager['NamaM'],
				'hariIni' => $hari,
				'bulanIni' => $bulan,
				'nrp'=>$data['nrp'], 
				'Nama' => $data['Nama'],
				'Alamat' =>$data['Alamat'],
				'StartDate' => $data['StartDate'],
				'EndDate' => $data['EndDate'],
				'Gaji' => $data['Gaji'],
				'tunjangan_transport' => $data['tunjangan_transport'],
				'tunjangan_lembur' => $data['tunjangan_lembur'],
				'tunjangan_makan' => $data['tunjangan_makan'],
				'tunjangan_istri' => $data['tunjangan_istri'],
				'tunjangan_anak' => $data['tunjangan_anak'],
				'TerbilangUpah' => $terbilangUpah,
				'TerbilangTransport' => $terbilangTransport,
				'TerbilangLembur' => $terbilangLembur,
				'TerbilangMakan' => $terbilangMakan,
				'TerbilangIstri' => $terbilangIstri,
				'TerbilangAnak' => $terbilangAnak,
				'selama' => $selama,
				'TerbilangSelama' => $terbilangSelama
				);
		$data2[] = (object)$view;
		$data3['hasil'] = $data2;	
		$html=$this->load->view('form_kontrak',$data3, true);
		
		//nama pdf yang akan di download
		$pdfFileName ="Form Kontrak-". $data['Nama']."-download.pdf";
		
		//pass mPDF parameter pada fungsi load()
		$pdf = $this->m_pdf->load();
		
		//generate pdf
		$pdf->SetHTMLHeader('<div><table><tr><td><img src="' . base_url() . 'assets/img/logo.jpg" height="70" width="70"></img></td><td> </td><td><br><br><b> PT. Surya Optima Nusa Raya </b> <br> <i>HRD Department</i></td></tr></table></div>');
		$pdf->defaultfooterline = FALSE;
		$pdf->SetHTMLFooter('<p align="center" style="font-size:15px">{PAGENO}</p>');
		$pdf->AddPage('P', // L - landscape, P - portrait 
        '', '', '', '',
        25, // margin_left
        20, // margin right
       32, // margin top
       8, // margin bottom: 30
        10, // margin header
        4, // margin footer
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
	
	function cetakEvaluasi($nrp){
		//load library
		$this->load->library('m_pdf');
		
		//load from webservice untuk karyawan kontrak
		$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan_kontrak/format/json');
		$json = json_decode($data, TRUE);
		foreach($json as $urutan => $array) {
			 if($array['nrp'] == $nrp){
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'Nama' => $array['Nama'],
						'Alamat' =>$array['Alamat'],
						'Umur'  => $array['Umur'],
						'Status' => $array['Status_nikah']
						);				
				} 			
			}
			
			//set view
			$data2[] = (object)$data;
			$data3['hasil'] = $data2;	
			$html=$this->load->view('form_evaluasi',$data3, true);
			
			//nama pdf yang akan di download
			$pdfFileName ="Surat Evaluasi Kontrak-". $data['Nama'].".pdf";
		
			//pass mPDF parameter pada fungsi load()
			$pdf = $this->m_pdf->load();
		
			//generate pdf
			$pdf->SetHTMLHeader('<div><table><tr><td><img src="' . base_url() . 'assets/img/logo.jpg" height="70" width="70"></img></td><td> </td><td><br><br><b> PT. Surya Optima Nusa Raya </b> <br> <i>HRD Department</i></td></tr></table></div>');
			$pdf->SetHTMLFooter('<div style="font-size:12px"><font size="3">*</font> ) Coret yang Tidak Perlu</div>');
			$pdf->AddPage('P', // L - landscape, P - portrait 
        	'', '', '', '',
        	25, // margin_left
        	20, // margin right
       		32, // margin top
       		8, // margin bottom: 30
        	10, // margin header
        	4, // margin footer
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
			
			//buka print 
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
	
		$tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
		$bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
		$tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
		
		$result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
		return($result);
}
	function Terbilang($x){
  $abil = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
  if ($x < 12)
    return " " . $abil[$x];
  elseif ($x < 20)
    return $this->Terbilang($x - 10) . " Belas";
  elseif ($x < 100)
    return $this->Terbilang($x / 10) . " Puluh" . $this->Terbilang($x % 10);
  elseif ($x < 200)
    return " seratus" . $this->Terbilang($x - 100);
  elseif ($x < 1000)
    return $this->Terbilang($x / 100) . " Ratus" . $this->Terbilang($x % 100);
  elseif ($x < 2000)
    return " seribu" . $this->Terbilang($x - 1000);
  elseif ($x < 1000000)
    return $this->Terbilang($x / 1000) . " Ribu" . $this->Terbilang($x % 1000);
  elseif ($x < 1000000000)
    return $this->Terbilang($x / 1000000) . " Juta" . $this->Terbilang($x % 1000000);
	}
}

/* End of PengelolaanKaryawanKontrak.php */