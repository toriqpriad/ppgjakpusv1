<!-----------------------------------|untuk TPQ|---------------------------------->
<?php

$tgl=date("d/m/Y");
//export dari semua hasil yang ditampilkan
if(isset($_GET['tpq'])){
header("Content-type: application/vnd-msword");
header("Content-Disposition: attachment; filename=rekap-data-tpq-$tgl.doc");
if(isset($_GET['all'])){
require_once "../db/database.php";
$select = mysql_query("SELECT * FROM data_tpq") or die(mysql_error());	
$numrowslihat= mysql_num_rows($select);
?>

<center><h2>Rekap Keseluruhan Data TPQ </h2></center	>
	<table width="100%" border="1" cellpadding="5" cellspacing="1">
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
echo '</p>';
} 
//export dari hasil pencarian yang ditampilkan
elseif(isset($_GET['kategori'])){
require_once "../db/database.php";
$kat=$_GET['kategori'];
$key=$_GET['keyword_cari'];

$sqlcari="SELECT * FROM data_tpq WHERE `$kat` LIKE  '%$key%'";
$select=mysql_query($sqlcari);
$numrowslihat= mysql_num_rows($select);
if($kat=="id_tpq"){ $judul="ID TPQ"; }
elseif($kat=="nama_tpq"){ $judul="Nama TPQ"; }
elseif($kat=="kepala_tpq"){ $judul="Kepala TPQ"; }
elseif($kat=="desa"){ $judul="Desa"; }
elseif($kat=="jml_kelompok"){ $judul="Jumlah Kelompok"; }
elseif($kat=="kontak"){ $judul="Kontak"; }
?>

<center><h2>Rekap Data TPQ Berdasarkan <?=$judul;?> : <?=$key;?></h2></center	>
	<table width="100%" border="1" cellpadding="5" cellspacing="1">
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
					 <th ><?php echo "&nbsp;",$hsl->kontak_peng; ?> </th>
					<th ><?=$hsl->alamat_peng;?></th>
					</tr>
	<?php $x++;  } } ?>					
	</table>
	<br>
	<p>Didownload pada hari : <?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
echo '</p>';
}


//export dari detail
if(isset($_GET['detail'])){
require_once "../db/database.php";
$detail=$_GET['detail'];
$sqlcari="SELECT * FROM data_tpq WHERE `id_tpq` LIKE  '%$detail%'";
$select=mysql_query($sqlcari);
$numrowslihat= mysql_num_rows($select);
$hsl = mysql_fetch_object($select);
?>

<center><h2>Rekap Data TPQ <?=$hsl->nama_tpq;?> </h2></center>


	<table  border='1'>
	<tr ><th align='left'>ID TPQ</th><th>:</th><th align='left'><?=$hsl->id_tpq;?></th></tr>
	<tr ><th align='left'>Nama TPQ</th><th>:</th><th align='left'><?=$hsl->nama_tpq;?></th></tr>
	<tr><th align='left'>Kepala TPQ</th><th>:</th><th align='left'><?=$hsl->kepala_tpq;?></th></tr>
	<tr><th align='left'>Pembina TPQ</th><th>:</th><th align='left'><?=$hsl->pembina_tpq;?></th></tr>
	<tr><th align='left'>Desa</th><th>:</th><th align='left'><?=$hsl->desa;?></th></tr>
	<tr><th align='left'>Jumlah Kelompok</th><th>:</th><th align='left'><?=$hsl->jml_kelompok;?></th></tr>
	<tr><th align='left'>Kontak</th><th>:</th><th align='left'><?php echo "&nbsp;",$hsl->kontak_peng; ?> </th></tr>
	<tr><th align='left'>Alamat</th><th>:</th><th align='left'><?=$hsl->alamat_peng;?></th></tr>
	</table>
	
	<br>
	<p>Didownload pada hari : <?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
echo '</p>';

} }
?>

<?php
										/*UNTUK PENGAJAR*/
$tgl=date("d/m/Y");
//export dari semua hasil yang ditampilkan

if(isset($_GET['peng'])){
header("Content-type: application/vnd-msword");
header("Content-Disposition: attachment; filename=rekap-data-pengajar-$tgl.doc");
if(isset($_GET['all'])){
require_once "../db/database.php";
$select = mysql_query("SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq") or die(mysql_error());	
$numrowslihat= mysql_num_rows($select);
?>

<center><h2>Rekap Keseluruhan Data Pengajar </h2></center	>
	<table width="100%" border="1" cellpadding="5" cellspacing="1">
	<tr>
	<th>No.</th>
	<th>ID Pengajar</th>
	<th>Nama Pengajar</th>
	<th>Jenis Kelamin</th>
	<th>Tmp Lahir</th>
	<th>Tgl Lahir</th>
	<th>Pendidikan</th>
	<th>Status</th>
	<th>Pernikahan</th>
	<th>TPQ/Desa</th>
	<th>Kelas Ajar</th>
	<th>Kontak</th>
	<th>Alamat</th>
	</tr>
	<?php 
					$x=1;
					if($select) {
					 
					while ($x<=$numrowslihat){
					echo "<script type='text/javascript'>alert('Data Ditemukan');</script>";	
					while ($hsl = mysql_fetch_object($select) ) {
					 
					?>
					<tr >
					<th ><?php echo "$x"; ?></th>
					<th ><?=$hsl->id_peng;?></th>
					<th ><?=$hsl->nm_peng;?></th>
					<th ><?=$hsl->j_klmn;?></th>
					<th ><?=$hsl->tmp_lhr;?></th>
					<th ><?=$hsl->tgl_lhr;?></th>
					<th ><?=$hsl->pdkn;?> - <?=$hsl->ket_pdkn;?></th>
					<th ><?=$hsl->status;?></th>
					<th ><?=$hsl->pkw; ?> </th>
					<th ><?=$hsl->nama_tpq;?> - <?=$hsl->desa;?></th>
					<th ><?=$hsl->kelas_ajar;?></th>
					<th >&nbsp;<?=$hsl->kontak_peng;?></th>
					<th ><?=$hsl->alamat_peng;?></th>
	<?php $x++;  } } ?>					
	</table>
	<br>
	<p>Didownload pada hari : <?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
echo '</p>';
} }
//export dari hasil pencarian yang ditampilkan
elseif(isset($_GET['kategori'])){
require_once "../db/database.php";
$kat=$_GET['kategori'];
$key=$_GET['keyword_cari'];

$sqlcari="SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq WHERE `$kat` LIKE  '%$key%'";
$select=mysql_query($sqlcari);
$numrowslihat= mysql_num_rows($select);
if($kat=="id_peng"){ $judul="ID Pengajar"; }
elseif($kat=="nm_peng"){ $judul="Nama Pengajar"; }
elseif($kat=="tmp_lhr"){ $judul="Tempat Lahir"; }
elseif($kat=="tgl_lhr"){ $judul="Tanggal Lahir"; }
elseif($kat=="desa"){ $judul="Desa"; }
elseif($kat=="nama_tpq"){ $judul="Nama TPQ"; }
elseif($kat=="status"){ $judul="Status"; }
elseif($kat=="pdkn"){ $judul="Pendidikan"; }
elseif($kat=="kelas_ajar"){ $judul="Kelas Ajar"; }

?>

<center><h2>Rekap Data Pengajar Berdasarkan <?=$judul;?> : <?=$key;?></h2></center	>
	<table width="100%" border="1" cellpadding="5" cellspacing="1">
	<tr>
	<th>No</th>
	<th>ID Pengajar</th>
	<th>Nama Pengajar</th>
	<th>Jenis Kelamin</th>
	<th>Tmp Lahir</th>
	<th>Tgl Lahir</th>
	<th>Pendidikan</th>
	<th>Status</th>
	<th>Pernikahan</th>
	<th>TPQ/Desa</th>
	<th>Kelas Ajar</th>
	<th>Kontak</th>
	<th>Alamat</th>
	</tr>
	<?php 
					$x=1;
					if($select) 
					while ($x<=$numrowslihat){				
					while ($hsl = mysql_fetch_object($select) ) {			 
	?>
					<th ><?php echo "$x"; ?></th>
					<th ><?=$hsl->id_peng;?></th>
					<th ><?=$hsl->nm_peng;?></th>
					<th ><?=$hsl->j_klmn;?></th>
					<th ><?=$hsl->tmp_lhr;?></th>
					<th ><?=$hsl->tgl_lhr;?></th>
					<th ><?=$hsl->pdkn;?> - <?=$hsl->ket_pdkn;?></th>
					<th ><?=$hsl->status;?></th>
					<th ><?=$hsl->pkw; ?> </th>
					<th ><?=$hsl->nama_tpq;?> - <?=$hsl->desa;?></th>
					<th ><?=$hsl->kelas_ajar;?></th>
					<th >&nbsp;<?=$hsl->kontak_peng;?></th>
					<th ><?=$hsl->alamat_peng;?></th>
	<?php $x++;  } } ?>					
	</table>
	<br>
	<p>Didownload pada hari : <?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
echo '</p>';
}


//export dari detail
if(isset($_GET['detail'])){
require_once "../db/database.php";
$detail=$_GET['detail'];
$sqlcari="SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq WHERE `id_tpq` LIKE  '%$detail%'";
//$sqlcari="SELECT * FROM data_tpq WHERE `id_tpq` LIKE  '%$detail%'";
$select=mysql_query($sqlcari);
$numrowslihat= mysql_num_rows($select);
$hsl = mysql_fetch_object($select);
?>

<center><h2>Rekap Data Pengajar <?=$hsl->nama_tpq;?> </h2></center>


	<table  border='1'>
	
	<tr><th>ID Pengajar</th><th>:</th><th align='left'><?=$hsl->id_peng;?></th></tr>
	<tr><th>Nama Pengajar</th><th>:</th><th align='left'><?=$hsl->nm_peng;?></th></tr>
	<tr><th>Jenis Kelamin</th><th>:</th><th align='left'><?=$hsl->j_klmn;?></th></tr>
	<tr><th>Tmp Lahir</th><th>:</th><th align='left'><?=$hsl->tmp_lhr;?></th></tr>
	<tr><th>Tgl Lahir</th><th>:</th><th align='left'><?=$hsl->tgl_lhr;?></th></tr>
	<tr><th>Pendidikan</th><th>:</th><th align='left'><?=$hsl->pdkn;?>-<?=$hsl->ket_pdkn;?> </th></tr>
	<tr><th>Status</th><th>:</th><th align='left'><?=$hsl->status;?></th></tr>
	<tr><th>Pernikahan</th><th>:</th><th align='left'><?=$hsl->pkw;?></th></tr>
	<tr><th>TPQ/Desa</th><th>:</th><th align='left'><?=$hsl->nama_tpq;?>-<?=$hsl->desa;?></th></tr>
	<tr><th>Kelas Ajar</th><th>:</th><th align='left'><?=$hsl->kelas_ajar;?></th></tr>
	<tr><th>Kontak</th><th>:</th><th align='left'>&nbsp;<?=$hsl->kontak_peng;?></th></tr>
	<tr><th>Alamat</th><th>:</th><th align='left'><?=$hsl->Alamat_peng;?></th></tr>
	
	</table>
	
	<br>
	<p>Didownload pada hari : <?php
$hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu");
$bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");
echo '</p>';

} } 
?>