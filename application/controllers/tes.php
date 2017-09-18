<?php
class Tes extends CI_Controller {


 function coba()
  { 

		//load mPDF library
		$this->load->library('m_pdf');
		//load mPDF library
		
		$data2= array(
			'nrp' => '1132',
			'nama' => 'reza',
			'hakCutiTahunan' => '12',
			'tglawal' => '12-12-12',
			'tglakhir' => '12-12-12',
			'jumlahcuti' => '4 hari',
			'sisa'    => '2'
	);
		$data3[] = (object)$data2;
		$data4['hasil'] = $data3;	
		$html=$this->load->view('pdf_output',$data4, true);
 	 
		//this the the PDF filename that user will get to download
		$pdfFilePath ="mypdfName-".time()."-download.pdf";

		
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();
		//generate the PDF!
		$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
		$pdf->WriteHTML($html,2);
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		$pdf->Output($pdfFilePath, "I");
		 
		 	
  }
  
  function coba2(){
  //load mPDF library
		$this->load->library('m_pdf');
		//load mPDF library
		
		//nama pdf yang akan di download
		$pdfFileName ="Form Cuti download.pdf";
		
		//pass mPDF parameter pada fungsi load()
		$pdf = $this->m_pdf->load();
		
  	$data = file_get_contents('http://localhost/webservice_karyawan/index.php/rest_karyawan/all_karyawan/format/json');
	
	$json = json_decode($data, TRUE);
	foreach($json as $urutan => $array) {
			 
				$data = array ( 
						'nrp'=>$array['nrp'], 
						'nama' => $array['Nama'], 
						'hakCutiTahunan' => $array['HakCutiTahunan'] 
						);	
				$data2[] = (object)$data;
				$data3['hasil'] = $data2;
				echo "<pre>". print_r($data3['hasil']) ."</pre>";
				}
				
				/*
				$html=$this->load->view('pdf_output',$data3, true);	
				if($urutan){
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
				}
				$html = mb_convert_encoding($html, 'UTF-8', 'UTF-8');
				$pdf->WriteHTML($html);
			}
	
		
		
		
		//generate PDF
		$pdf->SetHTMLHeader('<div><table><tr><td><img src="' . base_url() . 'assets/img/logo.jpg" height="70" width="70"></img></td><td> </td><td><br><br><b> PT. Surya Optima Nusa Raya </b> <br> <i>HRD Department</i></td></tr></table></div>');
		
	
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		ob_clean();
		$script="this.print();";
        $pdf->SetJS($script);
		$pdf->Output($pdfFileName, "I");
		*/
  }
 }
  ?>