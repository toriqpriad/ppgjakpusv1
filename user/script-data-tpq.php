<?php	
	function detail(){
	if(isset($_GET['detail'])) {
	include 'cek_session.php';
	require_once "../db/database.php";
	$select_user_login="SELECT * FROM user_entry_login where id_user='$usnm'";
	$query_user_login=mysql_query($select_user_login);
	$getdata_user=mysql_fetch_object($query_user_login);
	$tpq_user=$getdata_user->id_tpq;
	
	
	$select_data_tpq = mysql_query("SELECT * FROM data_tpq where id_tpq='$tpq_user'") or die(mysql_error());	
	$numrowslihat= mysql_num_rows($select_data_tpq);
	$getdata_tpq=mysql_fetch_object($select_data_tpq);
	$tpq_nm=$getdata_tpq->nama_tpq;

	echo '
	
				
				<div class="col-xs-12">
				
				<div class="panel panel-default">
				<div class="panel-heading">Detail TPQ</div>
				<div class="panel-body">
					<div class="row">
					
					<div class="col-md-2">
					<br>
					<img src="../images/logo_tpq/'.$getdata_tpq->logo.'" class="img-thumbnail img-responsive" width="300">
					</div>
					<div class="col-md-4">
					<br>
							<p><h3><b>'.$tpq_user.' - TPQ '.$tpq_nm.'</b></h3></p>
							<p><strong><h5><i class="fa fa-fw fa-home"></i> Alamat - '.$getdata_tpq->alamat.'</h5></strong></p>
							<p><strong><h5><i class="fa fa-fw fa-phone"></i> Kontak - '.$getdata_tpq->kontak.'</h5></strong></p>
							<p><strong><h5><i class="fa fa-fw fa-envelope"></i> Email - '.$getdata_user->email.' </h5></strong></p>
					</div>
					
					<div class="col-md-6">
						<img src="../images/foto_tpq/'.$getdata_tpq->foto.'" class="img-responsive img-thumbnail" width="600">
					</div>
					</div>
					<br>
					<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
						<label>ID TPQ</label>
						<input type="text" value="'.$getdata_tpq->id_tpq.'"class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Nama TPQ</label>
						<input type="text" value="'.$getdata_tpq->nama_tpq.'" class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Kepala TPQ</label>
						<input type="text" value="'.$getdata_tpq->kepala_tpq.'" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label>Pembina TPQ</label>
						<input type="text" value="'.$getdata_tpq->pembina_tpq.'" class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Desa</label>
						<input type="text" value="'.$getdata_tpq->desa.'" class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Jumlah Kelompok</label>
						<input type="text" value="'.$getdata_tpq->jml_kelompok.'" class="form-control" disabled>
						</div>
					</div>
					</div>
				</div>
				<div class="panel-footer">
				<a href="?edit='.$getdata_tpq->id_tpq.'" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
				</div>
				</div>
				
			
			
			
'; }

if (isset($_GET['edit']))
	{
	
	require_once "../db/database.php";
	$selectedit = mysql_query("SELECT * FROM data_tpq inner join user_entry_login on data_tpq.id_tpq=user_entry_login.id_tpq where `data_tpq`.`id_tpq` = '".$_GET['edit']."' ") or die(mysql_error());
    $selectedit2 = mysql_fetch_object($selectedit);
	$id=$selectedit2->id_tpq;
	echo '
	
	
	<div class="container">
	
	<div class="panel panel-default">
	<div class="panel-heading">Edit TPQ</div>
	<div class="panel-body">
	
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail TPQ</a></li>
        <li><a href="#logo" data-toggle="tab">Logo TPQ</a></li>
        <li><a href="#foto" data-toggle="tab">Foto TPQ</a></li>
		</ul>
		
		<div id="my-tab-content" class="tab-content">
			<div class="tab-pane active" id="detail_tpq">
				<div class="row">
					<div class="col-md-6">
							<br>
						<form  method="post" enctype="multipart/form-data">
							<div class="form-group">
							<label>Nama TPQ</label>
							<input type="text" class="form-control" name="tx_nm_tpq" value="'.$selectedit2->nama_tpq.'">
							</div>
        
							<div class="form-group">
							<label>Kepala TPA</label>
							<input type="text" name="tx_kpl_tpq" class="form-control" value="'.$selectedit2->kepala_tpq.'">
							</div>
        
							<div class="form-group">
							<label>Pembina TPA</label>
							<input type="text" name="tx_pmbn_tpq" class="form-control" value="'.$selectedit2->pembina_tpq.'">
							</div>
							
							<div class="form-group">
							<label>Desa</label>
							<input type="text" name="tx_desa" class="form-control" value="'.$selectedit2->desa.'">
							</div>
								
							<div class="form-group">
							<label>Jumlah Kelompok</label>
							<input type="text" name="tx_jml_tpq" class="form-control" value='.$selectedit2->jml_kelompok.'>
							</div>

							<div class="form-group">
							<label>Kontak</label>
							<input type="text" name="tx_kontak_tpq" class="form-control" value='.$selectedit2->kontak.'>
							</div>
		
							
					</div>
		
							<div class="col-md-6">
							<br>
							
							<div class="form-group">
							<label>Alamat</label>
							<textarea rows="3" class="form-control" name="tx_alamat">'.$selectedit2->alamat.'</textarea>
							</div> 
							
							<div class="form-group">
							<label>Username</label>
							<input type="text" name="tx_id_user" class="form-control" value='.$selectedit2->id_user.' required>
							</div>
			
							<div class="form-group">
							<label>Password</label>
							<input id="pwd0"  class="form-control" type="text"  name="pass_user" value='.$selectedit2->password.' required>
							</div>
		
							<div class="form-group">
							<label>Email</label>
							<input type="text" name="tx_id_email" class="form-control" value='.$selectedit2->email.' required>
							</div>
		
				</div>
			</div>
			</div>
		       
        <div class="tab-pane" id="logo">
		<br>
			<img src="../images/logo_tpq/'.$selectedit2->logo.'" id="gambar_nodin" width="400" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
			<output id="gambar_nodin"></output>
			<input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value='.$selectedit2->logo.'/>'; ?>
			<script>
			function bacaGambar(input) {
			if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) 
			{
				$('#gambar_nodin').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
			}	
			}
			</script>
			<script>
			$("#preview_gambar").change(function(){
			bacaGambar(this);
			});
			</script> 
			</div>
			<script>
				function toggle_password(target){
				var d = document;
				var tag = d.getElementById(target);
				var tag2 = d.getElementById("showhide");

				if (tag2.innerHTML == 'Show'){
				tag.setAttribute('type', 'text');   
				tag2.innerHTML = 'Hide';
				} else {
				tag.setAttribute('type', 'password');   
				tag2.innerHTML = 'Show';
				}
				}
		</script>
		<?php
			echo'
			
				
		 <div class="tab-pane" id="foto">
		 <br>
			<img src="../images/foto_tpq/'.$selectedit2->foto.'" id="gambar_nodin2" width="400" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
			<output id="gambar_nodin2"></output>
			<input type="file" name="Filegambar2" id="preview_gambar2" class="btn btn-info" value='.$selectedit2->foto.'/>'; ?>
		<script>
		function bacaGambar2(input) {
		if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
		
		$('#gambar_nodin2').attr('src', e.target.result);
		}

		reader.readAsDataURL(input.files[0]);
		}
		}
	</script>
	<script>
	$("#preview_gambar2").change(function(){
		bacaGambar2(this);
		});
	</script> 
	</div>
	</div>
	</div>
        <?php 
		echo '
    
	<div class="panel-footer">
			<input type="submit" value="Simpan" name="btn_ubah" class="btn btn-info">
	</div>
			<script type="text/javascript">jQuery(document).ready(function ($) {$("#tabs").tab();});</script>    

	</form>
	</div>
	</div>
	';

	  
	  
	  if(isset($_POST['btn_ubah']))
	{
		include 'cek_session.php';
		include 'script-dashboard.php';
		
		$nm=$_POST['tx_nm_tpq'];
		$nm_tpq=mysql_real_escape_string($nm);
		$kpl=$_POST['tx_kpl_tpq'];
		$pbn=$_POST['tx_pmbn_tpq'];
		$ds=$_POST['tx_desa'];
		$jml_k=$_POST['tx_jml_tpq'];
		$kontak=$_POST['tx_kontak_tpq'];
		$almt=$_POST['tx_alamat'];
		$logo=$_FILES['Filegambar']['name'];
		$foto=$_FILES['Filegambar2']['name'];
		$id_user=$_POST['tx_id_user'];
		$pas_user=$_POST['pass_user'];
		$pas=mysql_real_escape_string($pas_user);
		$email=$_POST['tx_id_email'];
		
		require_once "../db/database.php";
		if (empty($logo) AND  empty($foto))
		{
		$isi="Update data_tpq set id_tpq='".$id."' , nama_tpq='".$nm_tpq."' , kepala_tpq='".$kpl."', pembina_tpq='".$pbn."',desa='".$ds."', jml_kelompok='".$jml_k."',kontak='".$kontak."', alamat='".$almt."'  WHERE id_tpq = '".$id."'";
		$isi_login="Update user_entry_login set id_user='".$id_user."' , id_tpq='".$id."' , password='".$pas."', email='".$email."'  WHERE id_tpq = '".$id."'";
		}
		
		elseif (!empty($logo))
		{ 
		$isi="Update data_tpq set id_tpq='".$id."' , nama_tpq='".$nm_tpq."' , kepala_tpq='".$kpl."', pembina_tpq='".$pbn."',desa='".$ds."', jml_kelompok='".$jml_k."',kontak='".$kontak."', alamat='".$almt."', logo='".$logo."' WHERE id_tpq = '".$id."'";
		$isi_login="Update user_entry_login set id_user='".$id_user."' , id_tpq='".$id."' , password='".$pas."', email='".$email."'  WHERE id_tpq = '".$id."'";
		}
		elseif (!empty($foto))
		{ 
		$isi="Update data_tpq set id_tpq='".$id."' , nama_tpq='".$nm_tpq."' , kepala_tpq='".$kpl."', pembina_tpq='".$pbn."',desa='".$ds."', jml_kelompok='".$jml_k."',kontak='".$kontak."', alamat='".$almt."', foto='".$foto."'  WHERE id_tpq = '".$id."'";
		$isi_login="Update user_entry_login set id_user='".$id_user."' , id_tpq='".$id."' , password='".$pas."', email='".$email."'  WHERE id_tpq = '".$id."'";
		}
		
		$sqltambah=mysql_query($isi) or die(mysql_error());
		$sqllogin=mysql_query($isi_login) or die(mysql_error());
		$dirlogo="../images/logo_tpq/"; 
		$dirfoto="../images/foto_tpq/";
		$logo_data = $dirlogo . basename($_FILES['Filegambar']['name']);
		$logo_move=move_uploaded_file($_FILES['Filegambar']['tmp_name'], $logo_data);
		$foto_data = $dirfoto . basename($_FILES['Filegambar2']['name']);
		$foto_move=move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
		
		if($sqltambah && $sqllogin) 
		{		
			
		echo "<script type='text/javascript'>alert('Data berhasil diubah');window.location.href='data-tpq.php?detail';</script>";
		
		}
		else 
		{
		
		echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
		}
		} }	 }?>
		
	
	
	
	
	
		