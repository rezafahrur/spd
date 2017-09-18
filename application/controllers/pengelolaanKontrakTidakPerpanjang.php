<?php
	class PengelolaanKontrakTidakPerpanjang extends CI_Controller {
		
		public function __construct() 
	{
		parent::__construct();	
		// Load the configuration file
		$this->load->config('rest');
		// Load  rest client
		$this->load->spark('restclient/2.0.0');		
		$this->rest->initialize(array('server' => 'http://localhost/webservice_karyawan/index.php/rest_karyawan/'));
		
	}
		
		
		
		function tidakPerpanjangKontrak($nrp){
			$data['hasil']=$this->rest->get('karyawan/nrp/'.$nrp.'/format/json');
			$this->load->model('KontrakTidakPerpanjang');
			$this->KontrakTidakPerpanjang->modTidakPerpanjangKontrak($data);
			redirect(base_url("EarlyWarning/cariKaryawanyangAkanHabisKontrak"));
		}
		
		function hapusKontrakTidakPerpanjang(){
			$tanggal= mktime(date("m"),date("d"),date("Y"));
			$tanggalsekarang = date("Y-m-d", $tanggal);
			
			$this->load->model('KontrakTidakPerpanjang');
			$data['hasil'] = $this->KontrakTidakPerpanjang->modFilterKontrakTidakPerpanjang();
			
			foreach ($data['hasil'] as $urutan){
				$EndDate=$urutan->Enddate;
				if($tanggalsekarang == $EndDate){
					$delete = array ( 
							 	'nrp'	=>	$urutan->nrp,
								'Nama' 	=> $urutan->Nama,
								'Enddate' => $urutan->Enddate
								);
							$hapus['hasil'] = (object) $delete;
							$this->load->model('KontrakTidakPerpanjang');
							$this->KontrakTidakPerpanjang->modHapusKontrakTidakPerpanjang($hapus);
						}
				}
					
			  		
			}	
				
	}	
?>