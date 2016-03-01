<?php
	
	$tpq=$_GET['detail_tpq'];
	include 'db/database.php';
	$sqldatatpq="SELECT * FROM `data_tpq` where id_tpq='$tpq'";
	$querydatatpq=mysql_query($sqldatatpq);
	$countdatatpq=mysql_num_rows($querydatatpq);
	$getdata=mysql_fetch_array($querydatatpq);
	$logo=$getdata['logo'];
	$desa=$getdata['desa'];
	$nmtpq=$getdata['nama_tpq'];
	
	
	$sqldatapeng="SELECT * FROM `data_pengajar` where tpq_desa='$tpq'";
	$querydatapeng=mysql_query($sqldatapeng);
	$countdatapeng=mysql_num_rows($querydatapeng);
	
	$sqldatacbr="SELECT * FROM `data_caberawit` where tpq_desa='$tpq'";
	$querydatacbr=mysql_query($sqldatacbr);
	$countdatacbr=mysql_num_rows($querydatacbr);
	
	$sqldatapraremaja="SELECT * FROM `data_praremaja` where tpq_desa='$tpq'";
	$querydatapraremaja=mysql_query($sqldatapraremaja);
	$countdatapraremaja=mysql_num_rows($querydatapraremaja);
	
	$sqldataremaja="SELECT * FROM `data_remaja` where tpq_desa='$tpq' ";
	$querydataremaja=mysql_query($sqldataremaja);
	$countdataremaja=mysql_num_rows($querydataremaja);	
	
?>