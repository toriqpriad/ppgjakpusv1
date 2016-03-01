<?php
header("Content-type: application/x-pdf");
header("Content-Disposition: attachment; filename=rekap-data-tpq.pdf");//ganti nama sesuai keperluan
//disini script laporan anda
require_once "../db/database.php";
$select = mysql_query("SELECT * FROM data_tpq") or die(mysql_error());	
$numrowslihat= mysql_num_rows($select);
?>

<?php
 // Define relative path from this script to mPDF
 $nama_dokumen='data-tpq-pdf'; //Beri nama file PDF hasil.
define('_MPDF_PATH','../pdf/');
include(_MPDF_PATH . "mpdf.php");
$mpdf=new mPDF('utf-8', 'A4'); // Create new mPDF Document
 
//Beginning Buffer to save PHP variables and HTML tags
ob_start();
?>
 <center><h2>Rekap Keseluruhan Data TPQ </h2></center>
	
	<table width="100%" border="1" cellpadding="5" cellspacing="1">
	<tr>
	<th>No.</th>
	<th>ID TPQ</th>
	<th>Nama TPQ</th>
	<th>Kepala TPQ</th>
	<th>Pembina TPQ</th>
	<th>Desa</th>
	<th>Jumlah Kelompok</th>
	<th>Kontak</th>
	<th>Alamat</th>
	</tr>
	<?php 
					$x=1;
					if($select) 
					while ($x<=$numrowslihat){				
					while ($hsl = mysql_fetch_object($select) ) {			 
	?>
					<tr >
					<th ><?php echo "$x"; ?></th>
					<th ><?=$hsl->id_tpq;?></th>
					<th ><?=$hsl->nama_tpq;?></th>
					<th ><?=$hsl->kepala_tpq;?></th>
					<th ><?=$hsl->pembina_tpq;?></th>
					<th ><?=$hsl->desa;?></th>
					<th ><?=$hsl->jml_kelompok;?></th>
					 <th ><?php echo "&nbsp;",$hsl->kontak; ?> </th>
					<th ><?=$hsl->alamat;?></th>
					</tr>
	<?php $x++;  } } ?>					
	</table>
	<br>
	<p>Didownload pada hari : <?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
?></p>


<?php
$html = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>

		
	