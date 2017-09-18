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

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="<?php echo base_url('autentikasi/login'); ?>" method="post" id="formLogin">
		        <h2 class="form-login-heading">HRD <i>Department</i></h2>
		        <div class="login-wrap">
				<p align="center"> Silahkan Login</p>
		            <input type="text" class="form-control required" placeholder="Username" name="username" autofocus>
		            <br>
		            <input type="password" class="form-control required" placeholder="Password" name="password">
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.php#myModal"> Lupa Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-theme btn-block" type="submit" value="Login"><i class="fa fa-lock"></i> LOGIN</button>
		             <hr>
				<div align="center"> 
				 <p>Atau Anda Ingin Mencetak Surat Permohonan Cuti?</p>
				  <a data-toggle="modal" href="login.php#myModal2">
				  <button class="btn btn-facebook" type="submit" value="cetak"><b><i class="fa fa-print"></i> Cetak Surat Cuti</b></button></a>
				<br><br>
				<?php echo "&copy " . (int)date('Y'). " PT. Surya Optima Nusa Raya";  ?> </div>
		        </div>
		 </form>
		          <!-- Modal 1-->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Lupa Password?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Segera Hubungi Manager HRD untuk Dilakukan Peresetan Password Anda.</p>
		                      </div>
		                      <div class="modal-footer">
		                         <div align="center"> <?php echo "&copy " . (int)date('Y'). " PT. Surya Optima Nusa Raya";  ?> </div>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- Akhir modal 1-->
				  <!-- Modal 2-->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal2" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
						   <form action="<?php echo base_url('pengelolaanCuti/menghitungWaktuCuti'); ?>" method="post" id="formCuti">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Cetak Surat Permohonan Cuti?</h4>
		                      </div>
		                      <div class="modal-body">
		                          
							<p><b>Jenis Cuti: </b></p>
							<p>
							<input type="radio" value="Tahunan" onclick="javascript:yesnoCheck();" name="jenis" id="tahunan"/> <b>Cuti Tahunan</b> &nbsp &nbsp <input type="radio" value="Melahirkan" onclick="javascript:yesnoCheck();" name="jenis" id="melahirkan"/> <b>Cuti Melahirkan</b> </p>
							<div id="tahunancheck" style="display:none">
							<p>Masukkan <b> NRP </b> beserta <b>Tanggal Mulai </b>, <b>Tanggal Selesai </b> Cuti dan <b> Keperluan</b> Cuti Anda</p>
							<input type="text" name="nrp" placeholder="NRP" autocomplete="off" class="form-control placeholder-no-fix required"> 
							<br>
							<input type="text" name="tanggalAwal" placeholder="Tanggal Mulai Cuti" autocomplete="off" class="form-control required" id="datepicker1">
							<br>
							<input type="text" name="tanggalAkhir" placeholder="Tanggal Selesai Cuti" autocomplete="off" class="form-control required" id="datepicker2">
							<br>
							<textarea form="formCuti" name="keperluan" placeholder="Keperluan Cuti" cols="35" wrap="soft" class="form-control required"></textarea>
							</div>
							<div id="melahirkancheck" style="display:none">
							<p>Masukkan <b> NRP Anda </b> beserta <b>Tanggal Mulai Cuti</b><br> (<i>Cuti Melahirkan Akan diberikan Waktu Cuti selama 3 bulan</i>) </p>
							<input type="text" name="nrpMelahirkan" placeholder="NRP" autocomplete="off" class="form-control placeholder-no-fix required"> 
							<br>
							<input type="text" name="tanggalAwalMelahirkan" placeholder="Tanggal Mulai Cuti" autocomplete="off" class="form-control required" id="datepicker3">
							<br>
							</div>
		                      </div>
		                      <div class="modal-footer">
		                         <button data-dismiss="modal" class="btn btn-theme04" type="button">Batal</button> 
								 
		                          <button class="btn btn-theme03" type="submit">Proses</button>
		                      </div>
							  </form>
		                  </div>
		              </div>
		          </div>
		          <!-- Akhir modal 2-->
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
        $.backstretch("<?php echo base_url()?>assets/img/login-bg.jpg", {speed: 500});
    </script>
	 <!--validasi form-->
<script>$(document).ready(function() {
				$("#formLogin").validate();
			});
		</script>
		<script>$(document).ready(function() {
				$("#formCuti").validate();
			});
		</script>
   <script>
		$(function() {
		$( "#datepicker1" ).datepicker({ dateFormat: 'dd-mm-yy' });
		});
		</script>
		<script>
		$(function() {
		$( "#datepicker2" ).datepicker({ dateFormat: 'dd-mm-yy' });
		});
		</script>
		<script>
		$(function() {
		$( "#datepicker3" ).datepicker({ dateFormat: 'dd-mm-yy' });
		});
		</script>
	<script type="text/javascript">
function yesnoCheck() {
    if (document.getElementById('tahunan').checked) {
        document.getElementById('tahunancheck').style.display = 'block';
        document.getElementById('melahirkancheck').style.display = 'none';
    } 
    else if(document.getElementById('melahirkan').checked) {
        document.getElementById('melahirkancheck').style.display = 'block';
        document.getElementById('tahunancheck').style.display = 'none';
   }
}
	</script>
  </body>
</html>
