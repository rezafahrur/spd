<html>
<head>
   <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8">  
 </head>
<body>
  <h3 align="center"> SURAT HASIL EVALUASI DAN PERPANJANGAN KONTRAK</h3>

  <p style="font-size:15px;">Sehubungan dengan dengan habisnya masa kontrak karyawan sebagai berikut:</p>
  <table style="font-size:15px; border-collapse: collapse; border-spacing: 0;">
  <?php
  foreach ($hasil as $data):
	echo "<tr><td width='50'>Nama</td><td>:</td><td width='450'> &nbsp;". $data->Nama ."</td></tr>";
	echo "<tr><td>Alamat</td><td>:</td><td>&nbsp;". $data->Alamat ."</td></tr>";
	echo "<tr><td>Umur</td><td>:</td><td>&nbsp;". $data->Umur ." Tahun</td></tr>";
	echo "<tr><td>Status</td><td>:</td><td>&nbsp;". $data->Status ."</td></tr>";
	?>
	</table>
	
	<p style="font-size:15px"> Dengan ini memberikan hasil penilaian dari rekomendasi karyawan tersebut di atas</p>
	<p style="font-size15px"><b><u>HASIL PENILAIAN :</u></b></p>
	
	<table cellpadding="0" cellspacing="0" border="0" align="left" width="700" style="font-size:15px; border-collapse: collapse; border-spacing: 0;vertical-align:top;border: 1px solid #000;">
	
	<tr>
	<td align="left" style="height:230px; width:250px; vertical-align:top;" ></td><td  style="height:100px; width:250px; vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yang Menilai,</td>
	</tr>
	<tr>
	<td></td><td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (___________________________________)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Bag/Jabatan<font size="1"><br>  &nbsp; </font></td>
	</tr>
	</table>
	<br>
	<p align="left" style="font-size:15px;"><b><u>REKOMENDASI :</u></b></p>
	<table cellpadding="0" cellspacing="0" border="0" align="left" width="700" style="font-size:15px; border-collapse: collapse; border-spacing: 0;vertical-align:top;border: 1px solid #000;">
	
	<tr>
	<td style="height:230px; width:250px; vertical-align:top;" >&nbsp;&nbsp; Diperpanjang / Tidak <font size="5"> *</font> )</td><td  style="height:100px; width:250px; vertical-align:top;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yang Merekomendasi,</td>
	</tr>
	<tr>
	<td></td><td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; (___________________________________)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Bag/Jabatan <font size="1"><br> &nbsp; </font></td>
	</tr>
	</table>
	<?php
	endforeach;
	?>
</body>
</html>
