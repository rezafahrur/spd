
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
	<link href="<?php echo base_url()?>assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
	<link href="<?php echo base_url()?>assets/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
	
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
            <a href="<?php echo base_url()?>" class="logo"><b>Sistem</b></a>
            <!--logo end-->
			<!-- User Profile -->
            <div class="nav notify-row" id="top_menu">
                <ul class="nav top-menu">
				   <a href="<?php echo base_url()?>pengelolaanPengguna/manajemenAkun/<?php echo $this->session->userdata('idPengguna') ?>" > <font color="ffffff"> <i class="fa fa-user fa-2x"></i> <?php echo $this->session->userdata("NamaPengguna"); ?>
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
	<a href="<?php echo base_url()?>pengelolaanPengguna/manajemenAkun/<?php echo $this->session->userdata('idPengguna') ?>" >
	<p class="centered"> <img src="<?php echo base_url()?>assets/img/jam.gif" class="img-circle" height="80" width="80"></p>
          <h4 class="centered"><span id="date_time"> </span></h4>
		</a>
		<li class="mt">
                      <a href="<?php echo base_url()?>earlyWarning">
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
             </li>
			 <li class="mt">
                      <a class="active" href="<?php echo base_url()?>pengelolaanKaryawanKontrak">
                          <i class="fa fa-th"></i>
                          <span>Kelola Karyawan Kontrak</span>
                      </a>
               </li>
			   <?php if($this->session->userdata('HakAkses') == "Manager HRD"){ ?>
			   <li class="mt">
                      <a href="<?php echo base_url()?>pengelolaanPengguna">
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
      
	  <?php if (empty ($hasil)) { ?>
	  <!--main content start 1-->
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Daftar Karyawan Kontrak</h3>
			<hr>
          	<div class="row mt">
          		<div class="col-lg-12">
                
				
				<div class="panel panel-default">
                        <div class="panel-heading" align="right">
                         
                        </div>
                        <!-- /.panel-heading 1 -->
                        <div class="panel-body">
						<h2 align="center">Tidak Ada Data</h2>
				</div>
				</div>
				</div>
          	</div>
			
		</section><! --/wrapper 1-->
      </section><!-- /MAIN CONTENT 1 -->

      <!--main content 1 end-->
				 <!--footer 1 start-->
      <footer class="site-footer">
          <div class="text-center">
              <?php echo "&copy " . (int)date('Y'). " PT. Surya Optima Nusa Raya";  ?>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer 1 end-->
			<?php	
				}
				else {	
				?>
				<!-- main content 2 start -->
				<section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i> Daftar Karyawan Kontrak</h3>
			<hr>
          	<div class="row mt">
          		<div class="col-lg-12">
				<div class="panel panel-default">
                        <div class="panel-heading" align="right">
                           
                        </div>
                        <!-- /.panel-heading 2 -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="tabelkaryawankontrak" >
                                   <thead>
									<tr>
										<th> No </th>
										<th> NRP </th>
										<th> Nama</th>
										<th>Tanggal Awal Kontrak</th>
										<th>Tanggal Habis Kontrak</th>
										<th>Aksi</th>
									 </tr>
									</thead>
									<tbody>
										<?php 
											$no=1;
											foreach ($hasil as $data):
											?>
									<tr> 
										<td class="center"> <?php echo $no; ?> </td>
										<td class="center"> <?php echo $data->nrp; ?> </td>
										<td class="center"> <?php echo $data->Nama; ?> </td>
										<td class="center"> <?php echo $data->StartDate; ?> </td>
										<td class="center"> <?php echo $data->EndDate; ?> </td>
										<td class="center"> 
			
			<a href="<?php echo base_url()?>pengelolaanKaryawanKontrak/memanggilWebServiceMengubahKaryawan/<?php echo $data ->nrp; ?>" class="btn btn-primary"> <i class="fa fa-pencil"></i>
			
	       						Ubah </a> 
								
		 
				  
	</td>
</tr>
<?php 
$no++;
endforeach;
?>
</tbody>
</table>
	</div>
	</div>
	</div>			
				
				
          		</div>
          	</div>
			
		</section><! --/wrapper 2 -->
      </section><!-- /MAIN CONTENT 2 -->

      <!--main content 2 end-->
	  

      <!--footer 2 start-->
      <footer class="site-footer">
          <div class="text-center">
              <?php echo "&copy " . (int)date('Y'). " PT. Surya Optima Nusa Raya";  ?>
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer 2 end-->
  </section>
<?php
}
?>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>
	<script src="<?php echo base_url()?>assets/js/date_time.js" type="text/javascript"></script>

    <!--script for this page-->
	<script src="<?php echo base_url()?>assets/plugins/dataTables/jquery.dataTables.js"></script>
    <script  src="<?php echo base_url()?>assets/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/pace/pace.js"></script>
	
	<script type="text/javascript"> window.onload = date_time('date_time');</script>
	 <script>
        $(document).ready(function () {
            $('#tabelkaryawankontrak').dataTable();
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
