
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- chrome Firefox Opera -->
	<meta name="theme-color" content="#8000ff">
	<!-- Windows Phone -->
	<meta name="msapplication-navbutton-color" content="#8000ff">
	<!-- iOS Safari -->
	<meta name="apple-mobile-web-app-status-bar-style" content="#8000ff">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<title>FAQ &mdash; Sistem Peringatan Dini Masa Kontrak</title>


	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,700,800" rel="stylesheet">
	<link rel="shortcut icon" sizes="114x114" href="<?php echo base_url()?>assets/img/logo.jpg" type="image/x-icon">
	<!-- Animate.css -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/faq/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/faq/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/faq/css/bootstrap.css">
	
	<!-- Theme style  -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/faq/css/style.css">

	<!-- Modernizr JS -->
	<script src="<?php echo base_url() ?>assets/faq/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->


	</head>
	<body class="single">
		
	<div class="fh5co-loader"></div>
	
	<div id="page">
		<div id="fh5co-aside" style="background-image: url(<?php echo base_url() ?>assets/img/lock_bg.jpg)" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<nav role="navigation">
				<ul>
					<li><a href="<?php echo base_url() ?>earlyWarning/faq/utama"><i class="icon-home"></i></a></li>
				</ul>
			</nav>
			<div class="page-title">
				<img src="<?php echo base_url() ?>assets/img/logo.jpg" alt="Free HTML5 by FreeHTMl5.co">
				<span>Pertanyaan 5</span>
				<h2>Bagaimana Cara Mensetting Ulang Windows Task Scheduler untuk Menjalankan Peringatan Ini?</h2>
			</div>
		</div>
		<div id="fh5co-main-content">
			<div class="fh5co-post"> 
				<div class="fh5co-entry padding">
					<div>
						<p>
						Langkah awal untuk mensetting dan menjalankan windows task scheduler jika anda menggunakan sistem ini pada server lain adalah
						</p>
						<p>
						1. Instal <b>wget.exe</b> dan <b>sed.exe</b> pada komputer server anda (program telah diberikan dan berada di folder utama sistem ini)
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task19.PNG">
						</p>
						<p>
						2. Buka <i>Task Scheduler</i> <a href="<?php echo base_url() ?>earlyWarning/faq/1"> (Ikuti Langkah Pada Pertanyaan 1)</a> dan tekan <i>create task</i>
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task6.PNG">
						</p>
						<p>
						3. Masukkan Nama "<i>Task</i>" <i>(Contoh: Mengirim Peringatan)</i>
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task20.PNG">
						</p>
						<p>
						4. Tekan tab <b><i>Triggers</i></b> dan tekan <b><i>New</i></b>
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task21.PNG">
						</p>
						<p>
						5. Pada jendela baru ini setting waktu untuk melakukan pengiriman sesuka anda dan jika selesai tekan "OK"
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task22.PNG">
						</p>
						<p>
						6. Setelah itu tekan tab <b><i>Actions</i></b> dan tekan <b><i>New</i></b>
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task23.PNG">
						</p>
						<p align="justify">
						7. Pada Jendela Baru ini tekan <i>browse</i> dan arahkan pada direktori tempat anda menginstal <b>wget.exe</b> dan <b>sed.exe</b> pada langkah 1 di atas dan arahkan pada <b>wget.exe</b> (<i>Contoh: C:\Program Files\GNUWin32\bin\wget.exe</i>). Kemudian pada kolom <i>add arguments (optional)</i> masukkan perintah <b> -O - -q -t 1  </b> diikuti oleh "alamat ip server" dan arahkan pada /spd/earlyWarning/mengirimPeringatanKontrak (<i>Contoh: -O - -q -t 1 192.168.43.5/spd/earlyWarning/mengirimPeringatanKontrak</i>) untuk <u>mengirimkan peringatan kontrak</u> dan /spd/earlyWarning/mengirimPeringatanAbsenJamKeluar untuk <u>mengirimkan peringatan absensi tidak ada jam keluar</u>. Jika telah selesai tekan "OK"
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task24.PNG">
						</p>
						<p>
						8. Setelah kembali ke jendela awal, akhiri dengan menekan tombol "OK", dan aksi mengirim peringatan otomatis berhasil ditambahkan pada server anda.
						</p>
						<p>
						<img src="<?php echo base_url() ?>assets/faq/images/task25.PNG">
						</p>
					</div>
				</div>
				
				

			</div>
		</div>
	</div>

	<div class="fh5co-navigation">
		<div class="fh5co-cover prev fh5co-cover-sm" style="background-image: url(<?php echo base_url() ?>assets/faq/images/project-1.jpg)">
			<div class="overlay"></div>

			<a class="copy" href="<?php echo base_url() ?>earlyWarning/faq/4">
				<div class="display-t">
					<div class="display-tc">
						<div>
							<span>Pertanyaan Sebelumnya</span>
							<h2>Bagaimana Cara untuk Menyalakan Peringatan Otomatis Kembali, Setelah Saya Mematikan Fitur Tersebut?</h2>
						</div>
					</div>
				</div>
			</a>

		</div>
		<div class="fh5co-cover next fh5co-cover-sm" style="background-image: url(<?php echo base_url() ?>assets/faq/images/project-5.jpg)">
			<div class="overlay"></div>
			<a class="copy" href="<?php echo base_url() ?>earlyWarning/faq/6">
				<div class="display-t">
					<div class="display-tc">
						<div>
							<span>Pertanyaan Selanjutnya</span>
							<h2>Mengapa Sistem Tidak Mengirimkan Laporan Kontrak maupun Absensi Kepada Saya Lagi?</h2>
						</div>
					</div>
				</div>
			</a>

		</div>
	</div>

	<footer>
		<div>
					&copy; <?php echo (int)date('Y'); ?> PT. SURYA OPTIMA NUSA RAYA <br> &nbsp;&nbsp;&nbsp; FAQ Ini Dibuat Oleh REZA FAHRUR RASYID Untuk Departemen HRD PT. SURYA OPTIMA NUSA RAYA 
					</div>
				</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/faq/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="<?php echo base_url() ?>assets/faq/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url() ?>assets/faq/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="<?php echo base_url() ?>assets/faq/js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="<?php echo base_url() ?>assets/faq/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="<?php echo base_url() ?>assets/faq/js/main.js"></script>


	</body>
</html>

