
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<!-- chrome Firefox Opera -->
	<meta name="theme-color" content="#8000ff">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#8000ff">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#8000ff">
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
	<link href="<?php echo base_url()?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
	
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Sistem</b></a>
            <!--logo end-->
			<!-- User Profile -->
            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
				  <a href="manajemenAkun/<?php echo $this->session->userdata('idPengguna') ?>" > <font color="ffffff"> <i class="fa fa-user fa-2x"></i> <?php echo $this->session->userdata("NamaPengguna"); ?>
                         </font></a> 
				</ul> 
				</div>
				<!-- logout -->
				<div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url('autentikasi/logout'); ?>">Logout</a></li>
            	</ul>
            </div>
			</header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
     <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
	<ul class="sidebar-menu" id="nav-accordion">
	<a href="manajemenAkun/<?php echo $this->session->userdata('idPengguna') ?>" > 
	<p class="centered"> <img src="../assets/img/jam.gif" class="img-circle" height="80" width="80"></p>
     <h4 class="centered"><span id="date_time"> </span></h4>
	</a>
		<li class="mt">
                      <a href="<?php echo base_url()?>earlyWarning">
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
             </li>
			 <li class="mt">
                      <a href="<?php echo base_url()?>pengelolaanKaryawanKontrak">
                          <i class="fa fa-th"></i>
                          <span>Kelola Karyawan Kontrak</span>
                      </a>
               </li>
			   <?php if($this->session->userdata('HakAkses') == "Manager HRD"){ ?>
			   <li class="mt">
                      <a  href="../pengelolaanPengguna">
                          <i class="fa fa-th"></i>
                          <span>Kelola Pengguna</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a  href="../pengelolaanPenerimaPeringatan">
                          <i class="fa fa-th"></i>
                          <span>Kelola Penerima Peringatan</span>
                      </a>
                  </li>
				  <?php } ?>
				  <li class="mt">
                      <a class="active" href="<?php echo base_url()?>pengelolaanLiburNasional">
                          <i class="fa fa-th"></i>
                          <span>Kelola Libur Nasional</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="<?php echo base_url()?>lock/kunci_layar">
                          <i class="fa fa-lock"></i>
                          <span>Kunci Layar</span>
                      </a>
                  </li>
				  
		</ul>
		</div>
		</aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Tambah Jadwal Libur Nasional Perusahaan</h3>
          	<div class="row mt">
          		<div class="col-lg-10">
				<?php
				    // untuk keperluan form validasi
					$atribut = array( 
								'id' => 'pembuatanLiburNasional'
								); 
  					echo form_open('PengelolaanLiburNasional/menambahLiburNasional', $atribut); 	
				?>
               	     <div class="panel panel-default">
                         <div class="panel-heading">
                           Isilah Form Di bawah ini
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
<div class="form-group">								
	<label>Tanggal Libur</label>
	<?php 
				$data = array(
				        'id' => 'datepicker',
				 		'name' => 'tanggal_libur',
						'class' => 'form-control required date'
				);
				echo form_input($data); ?> 
</div> 
<div class="form-group">								
	<label>Keterangan Libur</label>
	<?php 
				$data2 = array(
				 		'name' => 'keterangan',
						'class' => 'form-control required',
						'minlength' => '6'
				);
				echo form_input($data2); ?> 
</div> 
<div class="form-group">
	<?php 
			$data3 = array(
        		'name'          => 'submit',
        		'id'            => 'Submit',
        		'type'          => 'submit',
        		'class'         => 'btn btn-primary',
				'value'       	=> 'Simpan',
				'content'		=> 'Simpan'
);

			echo form_button($data3); ?> 
			</div> 
	
<?php echo form_close(); ?>
</form>
</div>		
</div>
</div>
</div>		
				
				
          		</div> <!-- col-lg-12 -->
          	</div> <!-- Row mt -->
			
		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
	  

      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              <?php echo "&copy " . (int)date('Y'). " PT. Surya Optima Nusa Raya";  ?>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

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

    <!--common script for all pages-->
    <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>
	<script src="<?php echo base_url()?>assets/js/date_time.js" type="text/javascript"></script>

    <!--script for this page-->
    <script src="<?php echo base_url()?>assets/plugins/pace/pace.js"></script>
	
	<script type="text/javascript"> window.onload = date_time('date_time');</script>
    <script>$(document).ready(function() {
				$("#pengubahanKaryawanKontrak").validate();
			});
		</script>
		<script>
		$(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
		});
		</script>

  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
  </script>
 

  </body>
</html>
