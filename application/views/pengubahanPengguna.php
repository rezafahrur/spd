
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
    <link href="../../assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../../assets/css/style.css" rel="stylesheet">
    <link href="../../assets/css/style-responsive.css" rel="stylesheet">
	<link href="../../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
	
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
            <a href="index.html" class="logo"><b>Sistem </b></a>
            <!--logo end-->
			<!-- User Profile -->
            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
				   <a href="../manajemenAkun/<?php echo $this->session->userdata('idPengguna') ?>" > <font color="ffffff"> <i class="fa fa-user fa-2x"></i> <?php echo $this->session->userdata("NamaPengguna"); ?>
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
	<a href="../manajemenAkun/<?php echo $this->session->userdata('idPengguna') ?>" >
	<p class="centered"> <img src="../../assets/img/jam.gif" class="img-circle" height="80" width="80"></p>
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
                      <a class="active" href="../../pengelolaanPengguna">
                          <i class="fa fa-th"></i>
                          <span>Kelola Pengguna</span>
                      </a>
                  </li>
				  <li class="mt">
                      <a href="<?php echo base_url()?>pengelolaanPenerimaPeringatan">
                          <i class="fa fa-th"></i>
                          <span>Kelola Penerima Peringatan</span>
                      </a>
                  </li>
				  <?php } ?>
				  <li class="mt">
                      <a href="<?php echo base_url()?>pengelolaanLiburNasional">
                          <i class="fa fa-th"></i>
                          <span>Kelola Libur Nasional</span>
                      </a>
                  </li>
				   <li class="mt">
                      <a href="<?php echo base_url()?>autentikasi/kunci_layar">
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
          	<h3><i class="fa fa-angle-right"></i> Ubah Pengguna</h3>
          	<div class="row mt">
          		<div class="col-lg-10">
				<?php 
						$atribut = array(
									'id' => 'pengubahanPengguna'
									);
  echo form_open('PengelolaanPengguna/mengubahPengguna/'.$hasil -> idPengguna, $atribut); 	
						?>
               	     <div class="panel panel-default">
                        <div class="panel-heading"> 
                           Ubahlah Form Di bawah ini
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
<div class="form-group">								
	<label>Nama:</label>
	<?php 
				$data = array(
				 		'name' => 'namaPengguna',
						'value'=> $hasil ->NamaPengguna,
						'class' => 'form-control required',
						'minlength' => '2'
				);
				echo form_input($data); ?> </div> 
<div class="form-group">								
	<label>NRP:</label>
	<?php 
				$data4 = array(
				 		'name' => 'nrp',
						'value'=> $hasil ->nrp,
						'class' => 'form-control required',
						'minlength' => '6'
				);
				echo form_input($data4); ?> </div> 
<div class="form-group">								
	<label>Username:</label>
	<?php 
				$data = array(
				 		'name' => 'username',
						'value'=> $hasil ->Username,
						'class' => 'form-control required',
						'minlength' => '6',
						'readonly' => 'readonly'
				);
				echo form_input($data); ?> </div> 
<div class="form-group">								
	<label>Password:</label>
	<br>
	<a data-toggle="modal" href="<?php echo $hasil ->idPengguna; ?>#myModal"> Ubah Password </a>  </div> 
<div class="form-group">
	 <label>Alamat Email:  </label>
	 <?php 
	 		$data2 = array(
					'name' => 'email',
					'value' => $hasil->Email,
					'class' => 'form-control required email'
			);
			echo form_input($data2); ?>
			</div>
<div class="form-group">								
	<label>Hak Akses:</label>
	<select name="hakAkses" class="form-control required">
						   <option  value="<?php echo $hasil ->HakAkses; ?>" selected><?php echo $hasil ->HakAkses; ?></option>
						  <option  value="Manager HRD">Manager HRD</option>
						  <option value="Staff HRD">Staff HRD</option>
						</select>
	
	<?php 
	/*			$data = array(
				 		'name' => 'hakAkses',
						'value'=> $hasil ->HakAkses,
						'class' => 'form-control required',
						'minlength' => '2'
				);
				echo form_input($data); */ ?> </div> 
<div class="form-group">
	<?php 
			$data3 = array(
        		'name'          => 'submit',
        		'id'            => 'Submit',
        		'type'          => 'submit',
        		'class'         => 'btn btn-primary',
				'content'       => 'Ubah'
);

			echo form_button($data3); ?> 
			</div> 
	
<?php echo form_close(); ?>
<!-- Modal -->
 <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Ubah Password</h4>
		                      </div>
		                      <div class="modal-body">
		                    <iframe id="theFrame" src="<?php echo base_url()?>/pengelolaanPengguna/ubahPassword/<?php echo $hasil ->idPengguna; ?>" frameborder="0" height="230" width="100%">
</iframe> 
		                      </div>
							  
		                      <div class="modal-footer">
		                         <div align="center"> <?php echo "&copy " . (int)date('Y'). " PT. Surya Optima Nusa Raya";  ?> </div>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- akhir modal -->
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
    <script src="../../assets/js/jquery.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="../../assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="../../assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="../../assets/js/jquery.scrollTo.min.js"></script>
    <script src="../../assets/js/jquery.nicescroll.js" type="text/javascript"></script>
	<script type="text/javascript" src="../../assets/js/jquery.validate.js"></script>
	<script type="text/javascript" src="../../assets/js/messages_id.js"></script>

    <!--common script for all pages-->
    <script src="../../assets/js/common-scripts.js"></script>
	<script src="../../assets/js/date_time.js" type="text/javascript"></script>

    <!--script for this page-->
    <script src="../../assets/plugins/pace/pace.js"></script>
	
	<script type="text/javascript"> window.onload = date_time('date_time');</script>
    <script>$(document).ready(function() {
				$("#pengubahanPengguna").validate();
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
