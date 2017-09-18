<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	
    <title>Sistem Peringatan Dini Masa Kontrak</title>
	<link rel="shortcut icon" sizes="114x114" href="<?php echo base_url()?>assets/img/logo.jpg" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/jquery-ui.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/bootstrap-datepicker.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/bootstrap-datepicker.css.map" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	 
	  	<div class="container">
		<div class="form-cuti">
		    <h2 class="form-cuti-heading">Harap Periksa Kembali</h2>
			<div class="cuti-wrap">
			<table style="font-size: 18px;"> 
			
<?php
    foreach ($hasil as $data):
	echo "<tr><td>Nama Anda</td><td>:&nbsp</td><td>". $data->nama ."</td></tr>";
	echo "<tr><td>NRP Anda</td><td>:</td><td>". $data->nrp ."</td></tr>";
    echo "<tr><td>Mulai Cuti</td><td>:</td><td>".$data->tglawal."</td></tr>"; 
	echo "<tr><td>Selesai Cuti</td><td>:</td><td>".$data->tglakhir."</td></tr>";
    echo "<tr><td>Jumlah Cuti Anda</td><td>:</td><td>". $data->jumlahcuti ."</td></tr>";
	echo "<tr><td>Keperluan Cuti Anda</td><td>:</td><td>". $data->keperluan ."</td></tr>";
	if($data->jenis == "Tahunan"){
	echo "<tr><td>Hak Cuti Anda</td><td>:</td><td>". $data->hakCutiTahunan ." Hari</td></tr>";
	}
	if($data->jenis == "Tahunan" && $data->hakCutiTahunan != 0 && $data->sisa >= 0) {
		echo "<tr><td>Hak Cuti Anda Akan Tersisa</td><td>:</td><td>". $data->sisa ." Hari</td></tr>";
	}
	if($data->jenis == "Tahunan" && $data->sisa <= 0) {
		echo "<tr><td>Hak Cuti Anda Akan Tersisa</td><td>:</td><td>0 Hari</td></tr>";
	}	
	
?> 
            </table>
			<br>
<?php
   if($data->jenis == "Tahunan" && $data->hakCutiTahunan == 0){
?>
    <span id="blinker" style="color:red"> Anda Tidak Memiliki Hak Cuti...!!! <br> Anda Akan Dikenakan Pemotongan Gaji Jika Melakukan Cuti</span>
<?php 
	} 
?>
<?php 
	if($data->jenis == "Tahunan" && $data->hakCutiTahunan != 0 && $data->sisa <= 0) {
?>
    <span id="blinker" style="color:red"> Sisa Hak Cuti Anda Akan Habis...!!!</span>
<?php 
	}
?>
            <hr>
			<div align="center"> 
			<p>Lanjutkan Mencetak?</p>
			<form action="<?php echo base_url('pengelolaanCuti/mencetakFormCuti'); ?>" method="post" id="cetakCuti">
			<input type="hidden" name="nrp"  value="<?php echo $data->nrp; ?>"> 
			<input type="hidden" name="nama"  value="<?php echo $data->nama; ?>">
			<input type="hidden" name="tglawal"  value="<?php echo $data->tglawal; ?>">
			<input type="hidden" name="tglakhir"  value="<?php echo $data->tglakhir; ?>">
			<input type="hidden" name="jumlahcuti"  value="<?php echo $data->jumlahcuti; ?>">   
			<input type="hidden" name="keperluan"  value="<?php echo $data->keperluan; ?>">
			<input type="hidden" name="hakcuti"  value="<?php echo $data->hakCutiTahunan; ?>">
			<input type="hidden" name="jenis"  value="<?php echo $data->jenis; ?>">    
			<input type="hidden" name="sisa"  value="<?php echo $data->sisa; ?>"> 
			<input type="hidden" name="tglmasuk"  value="<?php echo $data->tglmasuk; ?>"> 
			<input type="hidden" name="bagian"  value="<?php echo $data->bagian; ?>"> 
			<input type="hidden" name="jabatan"  value="<?php echo $data->jabatan; ?>"> 
			<input type="hidden" name="alamat"  value="<?php echo $data->alamat; ?>"> 
			<input type="hidden" name="no_telepon"  value="<?php echo $data->no_telepon; ?>"> 
			<button class="btn btn-theme03" type="submit" value="cetak"><b><i class="fa fa-print"></i> Lanjut Mencetak Surat Cuti</b></button><br><br>
			</form>
<?php endforeach; ?>
			<a href="<?php echo base_url()?>autentikasi">
			<button class="btn btn-theme04"  value="cetak"><b><i class="fa fa-times"></i> Batal Mencetak</b></button> </a>
			</div>
          </div>
		</div>
	   </div>
	  
	   
	   <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	 <script src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/messages_id.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("<?php echo base_url()?>assets/img/lock_bg.jpg", {speed: 500});
    </script>
	<script>
	var blink_speed = 800;
	var t = setInterval(function (){
		var ele = 
		document.getElementById('blinker');
		 ele.style.visibility =
		 (ele.style.visibility == 'hidden' ?
		 '' : 'hidden');
		 }, blink_speed);
	</script>
   </body>
</html>