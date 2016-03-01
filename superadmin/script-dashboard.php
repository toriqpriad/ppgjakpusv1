<?php
	include '../db/database.php';
	//Untuk merekap data master
	$sqldatatpq="SELECT * FROM `data_tpq`";
	$querydatatpq=mysql_query($sqldatatpq);
	$countdatatpq=mysql_num_rows($querydatatpq);
	
	$sqldatapeng="SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq";
	$querydatapeng=mysql_query($sqldatapeng);
	$countdatapeng=mysql_num_rows($querydatapeng);
	
	$sqldatacbr="SELECT * FROM `data_caberawit`";
	$querydatacbr=mysql_query($sqldatacbr);
	$countdatacbr=mysql_num_rows($querydatacbr);
	
	$sqldatapraremaja="SELECT * FROM `data_praremaja`";
	$querydatapraremaja=mysql_query($sqldatapraremaja);
	$countdatapraremaja=mysql_num_rows($querydatapraremaja);
	
	$sqldataremaja="SELECT * FROM `data_remaja`";
	$querydataremaja=mysql_query($sqldataremaja);
	$countdataremaja=mysql_num_rows($querydataremaja);	
?>