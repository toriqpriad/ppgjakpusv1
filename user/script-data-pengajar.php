<?php
	
	include 'cek_session.php';
	include 'script-dashboard.php';
	require_once "../db/database.php";
	$select_user_login="SELECT * FROM user_entry_login where id_user='$usnm'";
	$query_user_login=mysql_query($select_user_login);
	$getdata_user=mysql_fetch_object($query_user_login);
	$tpq_user=$getdata_user->id_tpq;
	
	if(!isset($_POST['btn_cari'])) 
	{
	
	//$sql="SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where data_pengajar.tpq_desa='$tpq_user'";
	//$select = mysql_query($sql) or die(mysql_error());	
	//$numrowslihat= mysql_num_rows($select);
	$per_page = 10;
	$page_query = mysql_query("SELECT COUNT(*) FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where data_pengajar.tpq_desa='$tpq_user' ");
	$pages = ceil(mysql_result($page_query, 0) / $per_page);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_page;
	$query = mysql_query("SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where data_pengajar.tpq_desa='$tpq_user' LIMIT $start, $per_page");
	$query2=mysql_query("SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where data_pengajar.tpq_desa='$tpq_user'");
	$numrowslihat=mysql_num_rows($query2);
	echo '
	
	
	<div class="panel panel-default">
	<!-- <a class="panel-heading">Pengajar <span class="label label-warning">+15</span> </a> -->
	<div class="panel-heading">Keseluruhan Data Pengajar<span class="label label-success"><strong>Total Data TPQ : '.$numrowslihat.' Data</strong></span></div>		
	<div class="table-responsive">
	<table class="table table-bordered">
	<tr class="success">
	<small>
	<th>#</th>
	<th>ID</th>
	<th>Nama</th>
	<th>Jns Kelamin</th>
	<th>Tmp Lahir</th> 
	<th>Tgl Lahir</th> 
	<th>Pendidikan</th> 
	<th>Status</th>
	<th>Pernikahan</th>
	<th>Alamat</th>
	<th>Kontak</th>
	<th><center>Aksi</center></th>
	</tr>
	<tr>';
	
	$num=1;


while($hsl = mysql_fetch_object($query))
{ 
echo '<th >'.$num.'</th>';
echo '									
					<th ><a href="detail-pengajar.php?detail='.$hsl->id_peng.'">'.$hsl->id_peng.'</a></th>
					<th >'.$hsl->nm_peng.'</th>
					<th >'.$hsl->j_klmn.'</th>
					<th >'.$hsl->tmp_lhr.'</th>
					<th >'.$hsl->tgl_lhr.'</th>
					<th>'.$hsl->pdkn.'</th>
					<th >'.$hsl->status.'</th>			
					<th >'.$hsl->pkw.'</th>
					
					<th >'.$hsl->kontak_peng.'</th>
					<th >'.$hsl->alamat_peng.'</th>';  ?>
					<th><center>
					<a href="detail-pengajar.php?edit=<?=$hsl->id_peng; ?>"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
					<a href="?hapus=<?=$hsl->id_peng; ?>" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
					</center>
					</th>
					
					
					</tr>					
					 
					<?php
					$num++;
					}
					
					
					
					
			echo '</small></table></div><div class="panel-footer">'; 
			echo '<h3>Halaman : &nbsp;</h3>';
			if($pages >= 1 && $page <= $pages){
			for($x=1; $x<=$pages; $x++){
			
			echo ($x == $page) ? '<b><a href="?page='.$x.'" class="btn btn-warning active">'.$x.'</a></b> ' : '<a href="?page='.$x.'" class="btn btn-warning">'.$x.'</a> ';
		
			}}
			
			echo '</div></div>';
			}
					
				
	elseif(isset($_POST['btn_cari'])) 
	{
	require_once "../db/database.php";
	$kat=$_POST['kategori_select'];
	$key=$_POST['keyword_cari'];
	$kunci=mysql_real_escape_string($key);
	$sqlcari="SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq WHERE `data_pengajar`.`$kat` LIKE  '%$kunci%' AND `tpq_desa`='".$tpq_user."'";
	$select = mysql_query($sqlcari);	
	$numrowslihat= mysql_num_rows($select);
	?>
	<div class="panel panel-default">
	<!-- <a class="panel-heading">Pengajar <span class="label label-warning">+15</span> </a> -->
	<div class="panel-heading">Keseluruhan Data Pengajar<span class="label label-info">Total Data Pengajar : <?php echo $numrowslihat; ?> Data</span></div>		
	<div class="table-responsive">
	<table class="table table-responsive table-bordered">
	<tr class="warning">
	<th>#</th>
	<th>ID</th>
	<th>Nama</th>
	<th>Jns Kelamin</th>
	<th>Tmp Lahir</th>
	<th>Tgl Lahir</th>
	<th>Pendidikan</th>
	<th>Status</th>
	<th>Pernikahan</th>
	
	<th>Kontak</th>
	<th>Alamat</th>
	<th><center>Aksi</center></th>
	</tr>
	<tr>
	<?php 
					$x=1;
					if($select) {
					 
					while ($x<=$numrowslihat){
					echo "<script type='text/javascript'>alert('Data Ditemukan');</script>";	
					while ($hsl = mysql_fetch_object($select) ) {
					 
					?>
					<tr >
					<th ><?php echo "$x"; ?></th>
					<th ><a href="detail-pengajar.php?detail=<?=$hsl->id_peng;?>"><?=$hsl->id_peng;?></a></th>
					<th ><?=$hsl->nm_peng;?></th>
					<th ><?=$hsl->j_klmn;?></th>
					<th ><?=$hsl->tmp_lhr;?></th>
					<th ><?=$hsl->tgl_lhr;?></th>
					<th ><?=$hsl->pdkn;?>-<?=$hsl->ket_pdkn;?></th>
					<th ><?=$hsl->status;?></th>
					<th ><?=$hsl->pkw; ?> </th>
	
					<th ><?=$hsl->kontak_peng;?></th>
					<th ><?=$hsl->alamat_peng;?></th>
					
					
					<th><center>
					<a href="detail-pengajar.php?edit=<?=$hsl->id_peng; ?>"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
					<a href="?hapus=<?=$hsl->id_peng; ?>" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
					</center>
					</th>
					</tr>
					<?php 
					
					$x++;  }
	
					}
					if($numrowslihat=='0')
					{ echo "<script type='text/javascript'>alert('Data Tidak Ditemukan');</script>"; 
					  echo "<tr><th colspan='10'><center>Data tidak ditemukan</center></th></tr>";
					}
					?>
					</table></div>
					<div class="panel-footer">
					<p class="text-right"><a href="export_to_xls.php?peng&&kategori=<?php echo $kat;?>&keyword_cari=<?php echo $key;?>" class="btn btn-warning"><i class=""fa fa-file-excel-o"" aria-hidden="true" title="Download sebagai Excel"></i> Download sebagai Excel (.xls)</a>
					<a href="export_to_word.php?peng&&kategori=<?php echo $kat;?>&&keyword_cari=<?php echo $key;?>" class="btn btn-info"><i class=""fa fa-file-word-o"" aria-hidden="true" title="Download sebagai Dokumen"></i> Download sebagai Dokumen (.docx)</a></p>
					</div>
					</div>				
					<?php 
					
					
					}
					
					
					
					} 
	?>
	
<?php
	function tambah(){
	if (isset($_GET['tambah']))
	{
	include 'cek_session.php';
	require_once "../db/database.php";
	$select_user_login="SELECT * FROM user_entry_login where id_user='$usnm'";
	$query_user_login=mysql_query($select_user_login);
	$getdata_user=mysql_fetch_object($query_user_login);
	$tpq_user=$getdata_user->id_tpq;	
	?>
	
	
	<div class="panel panel-default">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Data</h3>
	</div>
	<div class="panel-body">
    <div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#profil" data-toggle="tab">Profil Pengajar</a></li>
		<li><a href="#foto" data-toggle="tab">Foto Pengajar</a></li>
        
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="profil">
		
		<br>
		
		<form  method="post" enctype="multipart/form-data">
        
        <div class="form-group">
        <label>Nama Pengajar</label>
        <input type="text" class="form-control" name='tx_nm_peng' required>
        </div>
		<div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="tx_jklmn" class="form-control input-md" required>
			<option value="Pria">Pria</option>
			<option value="Wanita">Wanita</option>
		</select>
        </div>
        <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" name="tx_tmp_lhr" class="form-control" required>
        </div>
        <div class="form-group">
        <label>Tanggal Lahir</label>
		<div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" required>
         <input class="form-control" size="10" type="text" name="tx_tgl_lhr">
		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
        </div>
		<div class="form-group">
        <label>Pendidikan Akhir</label>
        <select name="tx_pdkn" class="form-control input-md">
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			<option value="SMA">SMA</option>
			<option value="D3">D3</option>
			<option value="S1">S1</option>
			<option value="S2">S2</option>
		</select>
		</div>
		<div class="form-group">
		<input type="text" name="tx_ket_pdkn" class="form-control" placeholder="Nama Sekolah/Universitas(Fakultas)">
        </div>
		<div class="form-group">
        <label>Status</label>
        <select name="tx_status" class="form-control input-md" required>
			<option value="Pribumi">Pribumi</option>
			<option value="Mubalegh Tugasan">Mubalegh Tugasan</option>
		</select>
        </div>
		<div class="form-group">
        <label>Pernikahan</label>
        <select name="tx_nkh" class="form-control input-md" required>
			<option value="Sudah Menikah">Sudah Menikah</option>
			<option value="Belum Menikah">Belum Menikah</option>
		</select>
        </div>
		
        
        <div class="form-group">
        <label>Kelas Ajar</label>
		<select name="tx_kls" class="form-control input-md">
			<option value="Caberawit">Caberawit</option>
			<option value="Praremaja">Praremaja</option>
			<option value="Remaja">Remaja</option>
		</select>
        </div>

		<div class="form-group">
        <label>Kontak</label>
        <input type="text" name="tx_kontak" class="form-control" >
        </div>
		
        <div class="form-group">
          <label>Alamat</label>
          <textarea rows="3" class="form-control" name="tx_alamat"></textarea>
        </div>
		</div>
        
		
		<div class="tab-pane" id="foto">
			<br>
			<input type="file" class="btn btn-default" name="Filegambar2" id="filesToUpload2">
			<br>
			<div class="row col-sm-12">	
			<output id="filesInfo2"></output>
			</div>
				
		</div>
			<!--- Preview Gambar -->
		<script>
		function fileSelect(evt) {
		if (window.File && window.FileReader && window.FileList && window.Blob) {
        var files = evt.target.files;
		var divOne = document.getElementById('filesInfo2'); 
        var result = '';
        var file;
        for (var i = 0; file = files[i]; i++) {
            // if the file is not an image, continue
            if (!file.type.match('image.*')) {
                continue;
            }
		
            reader = new FileReader();
            reader.onload = (function (tFile) {
                return function (evt) {
                    var div = document.createElement('div');
                    divOne.innerHTML = '<img id="img_prev2" style="width: 20; height: 30;" src="' + evt.target.result + '" class="img-responsive img-thumbnail" src="no"/>';
                    document.getElementById('filesInfo2').appendChild(div);
                };
            }(file));
            reader.readAsDataURL(file);
        }
		} else {
        alert('The File APIs are not fully supported in this browser.');
		}
		}
		document.getElementById('filesToUpload2').addEventListener('change', fileSelect, false);
		</script>

		<script>
		$('input[type=file]').bootstrapFileInput();
		$('.file-inputs').bootstrapFileInput();
		</script>
				
		</div>	
		</div>
	</div>
	
	<div class="panel-footer">
	<input type="submit" name="simpan" value="Simpan" class="btn btn-info">
	</div>
    </div>
	</div>
	</form>
 
	<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#tabs").tab();
    });
	</script>    
	
 
	<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#tabs").tab();
    });
	</script>    
	
	
	
	<?php
	if(isset($_POST['simpan']))
	{
		require_once "../db/database.php";
		$query = "SELECT MAX(RIGHT(id_peng, 4)) as max_id FROM data_pengajar ORDER BY id_peng"; 
		$result = mysql_query($query); 
		$data = mysql_fetch_array($result); 
		$id_max = $data['max_id']; 
		$sort_num = (int) substr($id_max, 1, 4); 
		$sort_num++; 
		//$new_code="GM00$sort_num";
		$gmx="PGJ";
		$new_code = sprintf("%03s", $sort_num, $gmx); 
		$new_code_2="$gmx$new_code";
		include 'cek_session.php';
		include 'script-dashboard.php';
		
		$id=$new_code_2;
		$nm=$_POST['tx_nm_peng'];
		$klmn=$_POST['tx_jklmn'];
		$nm_p=mysql_real_escape_string($nm);
		$tmp_lhr=$_POST['tx_tmp_lhr'];
		$tgl_lhr=$_POST['tx_tgl_lhr'];
		$pdkn=$_POST['tx_pdkn'];
		$pdkn_ket=$_POST['tx_ket_pdkn'];
		$pdkn_ket=mysql_real_escape_string($pdkn_ket);
		$sts=$_POST['tx_status'];
		$sts_p=mysql_real_escape_string($sts);
		$nkh=$_POST['tx_nkh'];
		$nkh_p=mysql_real_escape_string($nkh);
		$tpq_ds=$tpq_user;
		$nm_tpq=$nmtpq;
		$kls=$_POST['tx_kls'];
		$kontak=$_POST['tx_kontak'];
		$almt=$_POST['tx_alamat'];
		$foto=$_FILES['Filegambar2']['name'];	
		require_once "../db/database.php";
		$isi="INSERT INTO data_pengajar VALUES('$id','$nm_p','$klmn','$tmp_lhr','$tgl_lhr','$pdkn','$pdkn_ket','$sts_p','$nkh_p','$tpq_ds','$nm_tpq','$kls','$kontak','$almt','$foto')";
		$sqltambah=mysql_query($isi) or die(mysql_error());
		//echo $isi;
		$dir_foto="../images/foto_pengajar/"; 
		$foto_data = $dir_foto . basename($_FILES['Filegambar2']['name']);
		$move_foto=move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
		echo $isi;
		//$video_data	= $videofolder . basename($_FILES['Filevideo']['name']);
		//$move_video=move_uploaded_file($_FILES['Filevideo']['tmp_name'], $video_data);
		if($sqltambah) 
		{		
		?>
		<script type="text/javascript"> 
			alert("Data sudah disimpan");window.location.href='detail-pengajar.php?detail=<?php echo $id; ?>';
		</script>
		<?php
		}
		if(!$sqltambah)
		{
			echo '<script type="text/javascript"> 	alert("Data gagal disimpan");	</script>';
		}
		} 
		}
		}
		?>
		
		<?php
		if (isset($_GET['hapus'])){
		require_once "../db/database.php";
		$hapus="DELETE FROM `data_pengajar` WHERE `id_peng` = '".$_GET['hapus']."' AND `tpq_desa`='".$tpq_user."'";
		$sqlhapus=mysql_query($hapus);
		
		if($sqlhapus)
		{
			
			echo '<script type="text/javascript">window.location.href="data-pengajar.php";alert("Data sudah dihapus");	</script>';
		}
		else
		{
			echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
			echo $hapus;
		}
		} 
		?>
		
		
			