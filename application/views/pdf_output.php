<html>
<head>
   <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8">  

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
  <h2 align="center"> Surat Permohonan Cuti</h2>
  <h5 align="left">Data Karyawan</h5>
  <table border="1" style="font-size:13px; border-collapse: collapse; border-spacing: 0;">
  <?php
  foreach ($hasil as $data):
	echo "<tr><td width='170'>Nama Pemohon</td><td width='450'> &nbsp;". $data->nama ."</td></tr>";
	echo "<tr><td>NRP</td><td>&nbsp;". $data->nrp ."</td></tr>";
	echo "<tr><td>Departemen/Bagian</td><td>&nbsp;". $data->nrp ."</td></tr>";
	echo "<tr><td>Jabatan</td><td>&nbsp;". $data->nrp ."</td></tr>";
	echo "<tr><td>Alamat</td><td>&nbsp;". $data->nrp ."</td></tr>";
	echo "<tr><td>No. Telepon</td><td>&nbsp;". $data->nrp ."</td></tr>";
	?>
	</table>
	
	<h5 align="left">Keterangan Cuti (<?php echo $data->nama; ?>)</h5>
	<table border="1" style="font-size:13px; border-collapse: collapse; border-spacing: 0;">
	<?php
    echo "<tr><td width='170'>Mulai Cuti Tanggal</td><td width='450'>&nbsp;".$data->nama."</td></tr>"; 
	echo "<tr><td>Selesai Cuti Tanggal</td><td>&nbsp;".$data->nama."</td></tr>";
    echo "<tr><td>Masuk Kembali Tanggal</td><td>&nbsp;". $data->nama ."</td></tr>";
	echo "<tr><td style='height:70px; width:170px; vertical-align:top;'>Keperluan Cuti</td><td width='450' style='vertical-align:top'><br>&nbsp;". $data->nama ."</td></tr>";
	?>
	</table>
	
	<h5 align="left">Selama Cuti Tugas Digantikan Oleh</h5>
	<table border="1" style="font-size:13px; border-collapse: collapse; border-spacing: 0;">
	<tr><td style="height:40px; width:170px; vertical-align:top;">Nama Lengkap</td><td width='450'></td></tr>
	<tr><td style="height:40px; width:170px; vertical-align:top;">Tanda Tangan</td><td width='450'></td></tr>
	</table>
	<br><br>
	<table  style="font-size:13px; border-collapse: collapse; border-spacing: 0;">
	<tr><td>Gempol, <?php echo (int)date('d') ."-". (int)date('m') ."-". (int)date('Y'); ?></td></tr>
	<tr>
	<td align="left" style="height:100px; width:170px; vertical-align:top;" >Pemohon Cuti,</td><td align="center" style="height:100px; width:250px; vertical-align:top;">Persetujuan Atasan,</td><td align="center" style="height:100px; width:170px; vertical-align:top;">HRD</td>
	</tr>
	<tr>
	<td>(<u><?php echo $data->nama; ?></u>)</td> <td align="center">(___________________________________)</td> <td align="center">(___________________________________)</td>
	</tr>
	</table>
	<br>
	<h6 align="left">Catatan dari HRD</h6>
	<table border="1" align="left" width="700" style="font-size:14px; border-collapse: collapse; border-spacing: 0;vertical-align:top;">
	<tr><td style="height:150px; vertical-align:top;">
	<?php
	echo "Hak Cuti Untuk Tahun ". (int)date('Y') ."&nbsp;:&nbsp;". $data->hakCutiTahunan ." Hari";
	echo "<br>Cuti yang Akan Diambil&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp; ". $data->nama;
	echo "<br>Sisa Cuti Untuk Tahun ". (int)date('Y') ."&nbsp;:&nbsp;". $data->nama ." Hari<br>Lain-lain:";
	
	endforeach;
	?>
	</td></tr>
    </table>
	<p style="font-size:11px; vertical-align:top">
	Perhatikan:<br>
	1. Surat permohonan cuti ini harus diajukan kepada HRD minimal 3 hari sebelum cuti dijalankan. <br>
	2. Sebelum ada persetujuan dari atasan, tidak diperkenankan untuk meninggalkan/mendahului cuti, kecuali sakit dengan &nbsp;&nbsp;&nbsp; dibuktikan surat keterangan dokter atau karena keperluan mendesak. 
	</p>
</body>
</html>
