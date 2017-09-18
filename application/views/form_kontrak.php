<html>
<head>
   <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8">  
 </head>
<body>
<table align="center">
  <tr><td align="center" style="font-size:19px;"> <b> PERJANJIAN KERJA <br> <u>UNTUK WAKTU TERTENTU (KONTRAK)</u></b> </td></tr>
  <tr><td align="center" style="font-size:13px;font-weight:bold" >No.:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/PKWT/SONR/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/</td></tr> </table>
  
 <?php
  foreach ($hasil as $data):
	?>
  <p align="justify" style="font-size:15px"> Pada hari ini,&nbsp;&nbsp; <?php echo "<b>". $data->hariIni ."</b>&nbsp;&nbsp; Tanggal &nbsp;&nbsp;<b>". (int)date('d') ."</b>&nbsp;&nbsp; Bulan &nbsp;&nbsp;<b>". $data->bulanIni ."</b>&nbsp;&nbsp; Tahun &nbsp;&nbsp;<b>". (int)date('Y') ."</b>"; ?> &nbsp;&nbsp; telah di buat dan disepakati perjanjian kerja antara:  </p>
  
  <table  style="font-size:15px; border-spacing: 0;">
  <tr><td style="width:50px; vertical-align:top; font-weight:bold">I</td><td style="width:50px; vertical-align:top; font-weight:bold">Nama</td><td style="font-weight:bold">:</td><td style="font-weight:bold">&nbsp; <?php echo $data->NamaM;?></td></tr>
  <tr><td></td><td style="width:50px; vertical-align:top;font-weight:bold">Alamat</td><td style="vertical-align:top;font-weight:bold">:</td><td style="font-weight:bold">&nbsp; Jln Raya Wonoayu No. 26 D <br> &nbsp; Dsn Kisik RT 4 RW 11 Gempol <br> &nbsp; Pasuruan-Jawa Timur</td></tr>
  <tr><td></td><td style="width:100px; vertical-align:top;font-weight:bold">Jabatan</td><td style="font-weight:bold">:</td><td style="font-weight:bold">&nbsp; HRD Manager</td></tr>
  </table>
  <br>
  <table style="font-size:15px; border-spacing: 0;">
  <tr><td style="width:50px;"></td><td align="justify"> Dalam hal ini bertindak untuk dan atas nama &nbsp;  PT. SURYA OPTIMA &nbsp; NUSA &nbsp; RAYA  Jl. Raya Wonoayu No. 26 D Dusun Kisik RT 4 RW 11 Gempol-Pasuruan, yang selanjutnya disebut sebagai <b>PIHAK PERTAMA</b></td></tr>
  </table>
  <br>
  <table  style="font-size:15px; border-spacing: 0;">
  
	<tr><td style="width:50px; vertical-align:top; font-weight:bold">II</td><td style="width:50px; vertical-align:top; font-weight:bold">Nama</td><td style="font-weight:bold">:</td><td style="font-weight:bold">&nbsp; <?php echo $data->Nama;?></td></tr>
	<tr><td></td><td style="width:100px; vertical-align:top;font-weight:bold">Alamat</td><td style="font-weight:bold">:</td><td style="font-weight:bold;vertical-align:top">&nbsp; <?php echo $data->Alamat ?></td></tr>
	</table>
	<br>
  <table style="font-size:15px; border-spacing: 0;">
  <tr><td style="width:50px;"></td><td align="justify"> Dalam hal ini bertindak untuk dan atas nama diri sendiri, yang selanjutnya disebut sebagai <b>PIHAK KEDUA</b></td></tr>
  </table>
  <p align="justify" style="font-size:15px">Kedua belah pihak sepakat untuk mengikatkan diri dalam Perjanjian Kerja Untuk Waktu Tertentu (Kontrak) dengan ketentuan-ketentuan sebagai berikut:</p>
  <p align="center" style="font-size:15px"> <b> Pasal 1 </b></p>
  <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">PIHAK PERTAMA menerima dan memperkerjakan PIHAK KEDUA sebagai karyawan PT. SURYA OPTIMA NUSA RAYA.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">PIHAK KEDUA bersedia menerima tugas dan tanggung jawab yang diberikan oleh PIHAK PERTAMA dengan sebaik-baiknya dengan rasa tanggung jawab.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">PIHAK KEDUA bertanggung jawab serta memelihara dengan baik atas barang / alat yang digunakan (alat-alat) sehubungan dengan pekerjaannya masing-masing, dan apabila PIHAK KEDUA melakukan kecerobohan / tindakan yang disengaja dan atau tidak disengaja yang dapat mengakibatkan kerusakan barang-barang milik Perusahaan PT. SURYA OPTIMA NUSA RAYA, maka PIHAK KEDUA bersedia mengganti kerugian PT. SURYA OPTIMA NUSA RAYA dan / atau PIHAK PERTAMA dalam bentuk uang atau penggantian barang yang sama.</td>
  </tr>
  </table>
  <p align="center" style="font-size:15px"> Pasal 2 <br> JANGKA WAKTU</p>
  <p style="font-size:15px" align="justify">Pemberian perintah kerja ini berlaku untuk <u>kurun waktu</u> <b> <?php echo $data->selama; ?> ( <?php echo $data->TerbilangSelama; ?> ) bulan </b>, dimana <u>sejak tanggal</u> <b> <?php echo $data->StartDate; ?> </b> serta <u>berakhir pada tanggal</u> <b> <?php echo $data->EndDate; ?> </b> dan hubungan kerja ini dianggap telah putus dengan sendirinya setelah mencapai tanggal akhir kontrak perjanjian ini, atau bila mana tenaga kerja bersangkutan dalam masa kerja tidak mampu bekerja dengan baik, maka sewaktu-waktu tenaga kerja bisa diberhentikan berdasarkan keputusan dan kebijakan perusahaan.</p>
  <p align="center" style="font-size:15px"> Pasal 3 <br> PELAKSANAAN TUGAS</p>
  <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">PIHAK KEDUA wajib menjalankan tugas dengan baik dan memenuhi standar kinerja yang telah ditentukan oleh PIHAK PERTAMA dan atas perintah / arahan dari perusahaan yang tertera dalam deskripsi pekerjaan yang merupakan bagian dari Perjanjian Kerja Untuk Waktu Tertentu ini.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">PIHAK PERTAMA berhak memberikan pengarahan dan perintah mengenai pelaksanaan pekerjaan terhadap PIHAK KEDUA selama berlakunya perjanjian kerja ini, termasuk ketentuan pengawasan yang diperlukan. </td>
  </tr>
  </table>
  <p align="center" style="font-size:15px"> Pasal 4 <br> PENGUPAHAN, TUNJANGAN, DAN UPAH LEMBUR</p>
  <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">PIHAK PERTAMA akan memberikan / membayarkan upah kepada PIHAK KEDUA setiap tanggal 25 (Dua Puluh Lima) / akhir bulan melalui bank atau rekening pekerja dengan rincian sebagai berikut:</td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="width:25px; vertical-align:top;"></td>
  <td style="vertical-align:top;">a.</td>
  <td style="vertical-align:top;"><u>Upah Pokok</u></td>
  <td style="vertical-align:top;">:</td>
  <td><b>Rp. <?php echo number_format($data->Gaji, 2, ",", "."); ?> </b> (<?php echo $data->TerbilangUpah; ?> Rupiah ) </td>
  </tr>
  <tr>
   <td style="vertical-align:top;"></td>
  <td style="vertical-align:top;">b.</td>
  <td style="vertical-align:top;">Tunjangan-Tunjangan</td>
  <td style="vertical-align:top;">:</td>
  <td style="vertical-align:top;"></td>
  </tr>
  </table>
  <table>
  <tr>
   <td style="width:25px; vertical-align:top;"></td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"><u> Tunjangan Transportasi</u></td>
  <td style="vertical-align:top;"><i>Sebesar</i></td>
  <td style="vertical-align:top;"><b>Rp. <?php echo number_format($data->tunjangan_transport, 2, ",", "."); ?> </b> (<?php echo $data->TerbilangTransport; ?> Rupiah )</td>
  </tr>
  <tr>
   <td style="width:25px; vertical-align:top;"></td>
  <td></td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"><u> Uang Makan</u></td>
  <td style="vertical-align:top;"><i>Sebesar</i></td>
  <td style="vertical-align:top;"><b>Rp. <?php echo number_format($data->tunjangan_makan, 2, ",", "."); ?></b> (<?php echo $data->TerbilangMakan; ?> Rupiah )</td>
  </tr>
  <?php 
  	if($data->tunjangan_istri >0) {
  ?>
  <tr>
   <td style="width:25px; vertical-align:top;"></td>
  <td></td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"><u> Tunjangan Istri</u></td>
  <td style="vertical-align:top;"><i>Sebesar</i></td>
  <td style="vertical-align:top;"><b>Rp. <?php echo number_format($data->tunjangan_istri, 2, ",", "."); ?> </b>(<?php echo $data->TerbilangIstri; ?> Rupiah )</td>
  </tr> 
  <?php 
  	}
	else if($data->tunjangan_istri == 0) {
  ?>	
  <tr>
   <td style="width:25px; vertical-align:top;"></td>
  <td></td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"><u> Tunjangan Istri</u></td>
  <td style="vertical-align:top;"><i>Sebesar</i></td>
  <td style="vertical-align:top;">---------</td>
  </tr> 
  <?php 
  	} 
   if($data->tunjangan_anak > 0){
  ?>
  <tr>
   <td style="width:25px; vertical-align:top;"></td>
  <td></td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"><u> Tunjangan Anak</u></td>
  <td style="vertical-align:top;"><i>Sebesar</i></td>
  <td style="vertical-align:top;"><b>Rp. <?php echo number_format($data->tunjangan_anak, 2, ",", "."); ?></b> (<?php echo $data->TerbilangAnak; ?> Rupiah )</td>
  </tr> 
  <?php
  	}
	else if ($data->tunjangan_anak == 0) {
  ?>
  <tr>
   <td style="width:25px; vertical-align:top;"></td>
  <td></td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"> </td>
  <td style="vertical-align:top;"><u> Tunjangan Anak</u></td>
  <td style="vertical-align:top;"><i>Sebesar</i></td>
  <td style="vertical-align:top;">---------</td>
  </tr> 
  <?php
  	}
  ?>
  </table>
  <table>
  <tr>
  	<td style="width:25px; vertical-align:top;"></td>
	<td align="justify">Upah tersebut diatas belum termasuk uang lembur yang besarnya tiap bulan berdasarkan jumlah jam lembur, dengan <u>upah lembur</u> sebesar <b>Rp. <?php echo number_format($data->tunjangan_lembur, 2, ",", "."); ?> </b>(<?php echo $data->TerbilangLembur; ?> Rupiah ) setiap jam lembur.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">Tunjangan Transportasi dan Uang Makan akan diberikan sesuai dengan kehadiran PIHAK KEDUA per harinya.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">PIHAK PERTAMA akan menanggung biaya pengobatan dan perawatan jika PIHAK KEDUA sakit atau memerlukan perawaan kesehatan sesuai dengan syarat, peraturan dan ketentuan yang berlaku di PT. SURYA OPTIMA NUSA RAYA.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">4.</td>
	<td align="justify">Apabila PIHAK KEDUA mangkir atau tidak masuk kerja tanpa surat keterangan tertulis yang dilengkapi bukti yang sah. PIHAK PERTAMA dapat memberikan sanksi sesuai dengan ketentuan yang berlaku di PT. SURYA OPTIMA NUSA RAYA.</td>
  </tr>
  </table>
   <p align="center" style="font-size:15px"> Pasal 5 <br> JAMINAN SOSIAL TENAGA KERJA (JAMSOSTEK)</p>
   <p style="font-size:15px" align="justify"> 
  	Perusahaan PT. SURYA OPTIMA NUSA RAYA akan mengikutsertakan PIHAK KEDUA ke dalam program Jamsostek paket A dan termasuk di dalamnya JPK ( Jaminan Pemeliharaan Kesehatan ) kepada masing – masing untuk yang berstatus keluarga dan lajang dengan ketentuan yang ditetapkan oleh JAMSOSTEK maksimal dengan 3 anak.
   </p>
  <br>
  <br>
  <br>
  <br>
  <br>
  <p align="center" style="font-size:15px"> Pasal 6 <br> PAJAK PENGHASILAN</p>
   <p style="font-size:15px" align="justify"> 
  PIHAK KEDUA akan menanggung sendiri pajak penghasilan (PPh pasal 21) yang menjadi kewajibannya dan dipotong oleh perusahaan PT. SURYA OPTIMA NUSA RAYA. Untuk kepentingan pemotongan pajak, PIHAK KEDUA wajib memberikan keterangan sah mengenai status lajang/berkeluarga, serta memberitahukan semua perubahan status keluarga secara tertulis.
   </p>
  <p align="center" style="font-size:15px"> Pasal 7 <br> WAKTU KERJA</p>
  <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">Waktu kerja resmi yang ditetapkan perusahaan PT. SURYA OPTIMA NUSA RAYA adalah 8 (Delapan) jam sehari atau 40 (Empat Puluh) jam seminggu. Dengan waktu istirahat selama 1 (satu) jam, yang di tentukan oleh masing-masing kepala bagian / divisi</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">Dalam kondisi tertentu Perusahaan berhak meminta karyawan yang bersangkutan untuk bekerja melebihi waktu di atas sesuai dengan tugas dan kewajibannya</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">Jadwal Kerja biasa, shift, dan lembur diatur dan ditetapkan sesuai dengan kebutuhan PT. SURYA OPTIMA NUSA RAYA.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">4.</td>
	<td align="justify">Untuk tenaga kerja tertentu tidak diberikan upah lembur dikarenakan sifat dari pekerjaannya yang mewakili kepentingan PT. SURYA OPTIMA NUSA RAYA sebagaimana dimaksud dalam Keputusan Menteri tenaga kerja No.Kep-102/MEN/VI/2004 Jo. Peraturan Ketenagakerjaan yang berlaku.</td>
  </tr>
  </table>
  <p align="center" style="font-size:15px"> Pasal 8 <br> CUTI</p>
   <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">Hak cuti timbul setelah PIHAK KEDUA mempunyai masa kerja selama 1 (Satu) tahun.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">PIHAK KEDUA berhak atas cuti tahunan selama 12 (Dua Belas) hari, terhitung setelah 1 (satu) tahun bekerja sampai berakhirnya masa kerja. </td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">Sebelum melaksanakan cuti, PIHAK KEDUA telah mengajukan permohonan terlebih dahulu secara tertulis, selambat-lambatnya 3 (Tiga) hari dengan mendapat pengesahan berupa tanda tangan dan ijin dari atasan langsung yang bersangkutan.</td>
  </tr>
  </table>
  
  <p align="center" style="font-size:15px"> Pasal 9 <br> KEWAJIBAN PIHAK KEDUA</p>
   <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">PIHAK KEDUA wajib tunduk dan menjalankan semua ketentuan-ketentuan tata tertib pada Peraturan Perusahaan PT. SURYA OPTIMA NUSA RAYA yang berlaku saat ini maupun yang berlaku dikemudian hari. Pelanggaran atas peraturan mengakibatkan pemberhentian atau hukuman administrasi kepada PIHAK KEDUA.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">Selama berlakunya Perjanjian ini, PIHAK KEDUA dilarang menerima pembayaran dari segala sumber atau perusahaan lainnya, kecuali dengan persetujuan tertulis dari PIHAK PERTAMA. </td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">Selama Perjanjian Kerja ini berlangsung, jika PIHAK KEDUA tidak mampu menunjukan kinerja yang baik, maka PIHAK KEDUA dengan penuh kesadaran akan mengundurkan diri dari Perusahaan PT. SURYA OPTIMA NUSA RAYA.</td>
  </tr>
  </table>
  <br>
  <p align="center" style="font-size:15px"> Pasal 10 <br> KERAHASIAAN INFORMASI</p>
  <p style="font-size:15px" align="justify"> 
  PIHAK KEDUA secara langsung atau tidak langsung, selama atau setelah masa kerja dilarang memberitahukan informasi yang bersifat Rahasia, kepemilikan atas informasi teknik, keuangan, pemasaran, informasi yang berkaitan dengan proyek termasuk tetapi tidak terbatas pada konsep, teknik, metode, sistem rancangan dan data keuangan, pekerjaan pengembangan yang berhubungan dengan informasi bisnis lainnya atau informasi yang di wajibkan untuk diperlakukan sebagai sesuatu yang bersifat rahasia, atau setiap informasi yang bersifat rahasia yang di edarkan melalui sistem elektronik internal atau lainnya, kecuali telah memperoleh persetujuan dari perusahaan PT. SURYA OPTIMA NUSA RAYA.
   </p>
   <p align="center" style="font-size:15px"> Pasal 11 <br> BERAKHIRNYA PERJANJIAN KERJA</p>
   <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk dapat melakukan pemutusan hubungan kerja dengan alasan atau keadaan sebagai berikut:</td>
  </tr>
  </table>
  <table>
  <tr>
  <td style="width:25px; vertical-align:top;"></td>
  <td align="justify">a. PIHAK KEDUA tidak mampu melaksanakan tugasnya sesuai dengan standar kinerja &nbsp;&nbsp;&nbsp; yang disepakati walaupun perusahaan telah memberikan kesempatan kepada PIHAK &nbsp;&nbsp;&nbsp; KEDUA untuk memperbaiki kinerjanya.</td>
  </tr>
  <tr>
  <td align="justify" style="width:25px; vertical-align:top;"></td>
  <td>b. PIHAK KEDUA tidak melaksanakan kesepakatan dalam perjanjian ini. </td>
  </tr>
  <tr>
  <td align="justify" style="width:25px; vertical-align:top;"></td>
  <td>c. PIHAK KEDUA melanggar peraturan perusahaan dan atau tata tertib yang berlaku di &nbsp;&nbsp;&nbsp; PT. SURYA OPTIMA NUSA RAYA. </td>
  </tr>
  <tr>
  <td align="justify" style="width:25px; vertical-align:top;"></td>
  <td>d. PIHAK KEDUA mengundurkan diri. </td>
  </tr>
  <tr>
  <td align="justify" style="width:25px; vertical-align:top;"></td>
  <td>e. PIHAK PERTAMA dan PIHAK KEDUA bersepakat mengakhiri perjanjian ini. </td>
  </tr>
  </table>
  <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">Tata cara dan persyaratan pemutusan hubungan kerja akan mengikuti ketentuan UU Ketenagakerjaan Nomor 13 Tahun 2003 jo. Peraturan Perusahaan atau Perjanjian Kerja Bersama. </td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">Sebelum masa perjanjian kerja waktu tertentu sebagaimana tersebut dalam pasal 2 berakhir, apabila PIHAK KEDUA mengundurkan diri atas kemauan sendiri dan atau diputuskan hubungan kerjanya oleh PIHAK PERTAMA atas nama PT. SURYA OPTIMA NUSA RAYA disebabkan kesalahan oleh PIHAK KEDUA, maka kepada PIHAK KEDUA akan diberlakukan sanksi ganti kerugian kepada PIHAK PERTAMA sebesar sisa upah yang belum dibayarkan sampai masa kerja berakhir.</td>
  </tr>
  <tr>
  <td style="width:25px; vertical-align:top;">4.</td>
	<td align="justify">Apabila PIHAK PERTAMA melakukan pemutusan hubungan kerja kepada PIHAK KEDUA selama perjanjian kerja ini belum berakhir dan bukan karena kesalahan PIHAK KEDUA, maka PIHAK KEDUA tidak berkewajiban membayar ganti kerugian kepada PIHAK PERTAMA dan PIHAK PERTAMA akan memberikan sanksi ganti kerugian kepada PIHAK KEDUA sebesar sisa upah pokok yang belum dibayarkan sampai masa kerja berakhir. </td>
  </tr>
  <tr>
  <td style="width:25px; vertical-align:top;">5.</td>
	<td align="justify">PIHAK KEDUA diharuskan mengembalikan barang-barang yang selama ini dipercayakan oleh PT. SURYA OPTIMA NUSA RAYA kepada PIHAK KEDUA.</td>
  </tr>
  <tr>
  <td style="width:25px; vertical-align:top;">6.</td>
	<td align="justify">PIHAK KEDUA diharuskan menyelesaikan hal-hal yang berhubungan dengan administrasi keuangan, seperti hutang atau pinjaman yang dilakukan PIHAK KEDUA.</td>
  </tr>
  </table>
  <br>
  <br>
  <br>
  <p align="center" style="font-size:15px"> Pasal 12 <br> PERPANJANGAN PERJANJIAN KERJA</p>
  <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">PIHAK PERTAMA akan memperpanjang perjanjian kerja berdasarkan dari hasil evaluasi dan rekomendasi dari atasan yang bersangkutan.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">Apabila PIHAK PERTAMA hendak memperpanjang perjanjian kerja kepada PIHAK KEDUA, maka PIHAK PERTAMA diwajibkan memberitahukan terlebih dahulu kepada PIHAK KEDUA paling lambat 7 (tujuh) hari sebelum perjanjian kerja ini berakhir.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">Dengan ditandatanganinya Perjanjian Kerja Untuk Waktu Tertentu (Kontrak) ini maka kedua belah pihak sepakat untuk melaksanakan ketentuan-ketentuan dalam perjanjian kerja ini dan dengan demikian kedua belah pihak terikat demi hukum dalam suatu hubungan kerja.</td>
  </tr>
  </table>
  
   <p align="center" style="font-size:15px"> Pasal 13 <br> PENANDATANGANAN</p>
   <table>
  <tr>
  	<td style="width:25px; vertical-align:top;">1.</td>
	<td align="justify">Perjanjian kerja untuk waktu tertentu (kontrak) ini ditandatangani dalam keadaan sadar oleh kedua belah pihak dan tanpa paksaan dari pihak manapun.</td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">2.</td>
	<td align="justify">Perjanjian kerja ini dibuat rangkap 2 (dua) yaitu 1 (satu) untuk PIHAK PERTAMA dan 1 (satu) untuk PIHAK KEDUA. </td>
  </tr>
  <tr>
  	<td style="width:25px; vertical-align:top;">3.</td>
	<td align="justify">Dengan ditandatanganinya Perjanjian Kerja Untuk Waktu Tertentu (Kontrak) ini maka kedua belah pihak sepakat untuk melaksanakan ketentuan-ketentuan dalam perjanjian kerja ini dan dengan demikian kedua belah pihak terikat demi hukum dalam suatu hubungan kerja.</td>
  </tr>
  </table>
  <br>
  <br>
  <br>
  <br>
   <p align="center" style="font-size:15px"> <b> PIHAK-PIHAK YANG MENGADAKAN PERJANJIAN </b></p>
 
	<p align="center" style="font-size:15px">Pasuruan, <?php echo (int)date('d') ." ". $data->bulanIni ." ". (int)date('Y'); ?></p>
	<table  style="font-size:13px; border-collapse: collapse; border-spacing: 0;">
	<tr>
	<td align="left" style="height:160px; width:470px; vertical-align:top;" ><b>PIHAK PERTAMA, </b></td><td align="left" style="height:160px; width:170px; vertical-align:top;"><b>PIHAK KEDUA,</b></td>
	</tr>
	<tr>
	<td><b><u><?php echo $data->Nama; ?></u></b><br> <?php echo "NRP. ". $data->nrp; ?></td> <td align="left"><b><u><?php echo $data->NamaM; ?></u></b><br><?php echo "NRP. ". $data->nrpM;  ?></td>
	</tr>
	</table>
<?php 
	endforeach;
?>
</body>
</html>
