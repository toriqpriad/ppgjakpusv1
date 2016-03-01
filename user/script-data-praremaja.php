<?php
    include 'cek_session.php';
	require_once "../db/database.php";
	$select_user_login="SELECT * FROM user_entry_login where id_user='$usnm'";
	$query_user_login=mysql_query($select_user_login);
	$getdata_user=mysql_fetch_object($query_user_login);
	$tpq_user=$getdata_user->id_tpq;
	if(!isset($_POST['btn_cari'])) 
	{
	require_once "../db/database.php";
	//$select1 = "SELECT * FROM data_praremaja inner join data_tpq on data_tpq.id_tpq=data_praremaja.tpq_desa AND data_praremaja.tpq_desa='$tpq_user' ";	
	//$select = mysql_query($select1) or die(mysql_error());	
	//$numrowslihat= mysql_num_rows($select);
	$per_page = 10;
	$page_query = mysql_query("SELECT COUNT(*) FROM data_praremaja inner join data_tpq on data_tpq.id_tpq=data_praremaja.tpq_desa AND data_praremaja.tpq_desa='$tpq_user'");
	$pages = ceil(mysql_result($page_query, 0) / $per_page);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
	$start = ($page - 1) * $per_page;
	$query = mysql_query("SELECT * FROM data_praremaja inner join data_tpq on data_tpq.id_tpq=data_praremaja.tpq_desa AND data_praremaja.tpq_desa='$tpq_user' LIMIT $start, $per_page");
	$query2=mysql_query("SELECT * FROM data_praremaja inner join data_tpq on data_tpq.id_tpq=data_praremaja.tpq_desa AND data_praremaja.tpq_desa='$tpq_user'");
	$numrowslihat=mysql_num_rows($query2);
	echo '
	
	<div class="panel panel-default">
	<!-- <a class="panel-heading">Pengajar <span class="label label-warning">+15</span> </a> -->
	<div class="panel-heading">Keseluruhan Data Praremaja<span class="label label-info">Total Data Praremaja : '.$numrowslihat.' Data</span></div>		
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
	<th>Bpk</th>
	<th>Ibu</th>
	<th>Kontak</th>
	<th>Alamat</th>
	<th><center>Aksi</center></th>
	</tr>
	<tr>';
	$num=1;
	while($hsl = mysql_fetch_object($query))
{ 
echo '<th >'.$num.'</th>';
?>
				
				
	
					<th ><a href="detail-praremaja.php?detail=<?=$hsl->id_prmj;?>"><?=$hsl->id_prmj;?></a></th>
					<th ><?=$hsl->nm_prmj;?></th>
					<th ><?=$hsl->j_klmn;?></th>
					<th ><?=$hsl->tmp_lhr;?></th>
					<th ><?=$hsl->tgl_lhr;?></th>
					<th ><?=$hsl->pdkn;?>-Kelas <?=$hsl->kls;?> di <?=$hsl->nm_sklh;?> </th>
					<th ><?=$hsl->bapak;?></th>
					<th ><?=$hsl->ibu;?></th>
					<th ><?=$hsl->kontak_prmj;?></th>
					<th ><?=$hsl->alamat_prmj;?></th>
					
					
					<th><center>
					<a href="detail-praremaja.php?edit=<?=$hsl->id_prmj; ?>"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
					<a href="?hapus=<?=$hsl->id_prmj; ?>" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
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
		
			echo ($x == $page) ? '<b><a href="?page='.$x.'" class="btn btn-success active">'.$x.'</a></b> ' : '<a href="?page='.$x.'" class="btn btn-success">'.$x.'</a> ';
		
			}}
			
			echo '</div></div>';
			}
					
	elseif(isset($_POST['btn_cari'])) 
	{
	require_once "../db/database.php";
	$kat=$_POST['kategori_select'];
	$key=$_POST['keyword_cari'];
	$kunci=mysql_real_escape_string($key);
	$sqlcari = "SELECT * FROM data_praremaja inner join data_tpq on data_tpq.id_tpq=data_praremaja.tpq_desa WHERE `data_praremaja`.`$kat` LIKE  '%$kunci%' AND data_praremaja.tpq_desa='$tpq_user'";	
	$select = mysql_query($sqlcari);	
	$numrowslihat= mysql_num_rows($select);
	?>
	<div class="panel panel-default">
	<!-- <a class="panel-heading">Pengajar <span class="label label-warning">+15</span> </a> -->
	<div class="panel-heading">Keseluruhan Data Praremaja<span class="label label-info">Total Data Praremaja : <?php echo $numrowslihat; ?> Data</span></div>		
	<div class="table-responsive">
	<table class="table table-responsive table-bordered">
	<tr class="warning">
	<th>#</th>
	<th>ID Praremaja</th>
	<th>Nama Praremaja</th>
	<th>Jenis Kelamin</th>
	<th>Tmp Lahir</th>
	<th>Tgl Lahir</th>
	<th>Pendidikan</th>
	<th>Hobi</th>
	<th>Bpk</th>
	<th>Ibu</th>
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
					<th ><a href="detail-praremaja.php?detail=<?=$hsl->id_prmj;?>"><?=$hsl->id_prmj;?></a></th>
					<th ><?=$hsl->nm_prmj;?></th>
					<th ><?=$hsl->j_klmn;?></th>
					<th ><?=$hsl->tmp_lhr;?></th>
					<th ><?=$hsl->tgl_lhr;?></th>
					<th ><?=$hsl->pdkn;?>-Kelas <?=$hsl->kls;?> di <?=$hsl->nm_sklh;?> </th>
					<th ><?=$hsl->hobi;?></th>
					<th ><?=$hsl->bapak;?></th>
					<th ><?=$hsl->ibu;?></th>
					<th ><?=$hsl->kontak_prmj;?></th>
					<th ><?=$hsl->alamat_prmj;?></th>
					
					
					<th><center>
					<a href="detail-praremaja.php?edit=<?=$hsl->id_prmj; ?>"><span class="glyphicon glyphicon-edit" title="Ganti"></span></a>
					<a href="?hapus=<?=$hsl->id_prmj; ?>" onclick='return confirm("Yakin menghapus data ini?")'><span class="glyphicon glyphicon-trash" title="Hapus"></span></a>
					</center>
					</th>
					</tr>
					<?php 
					
					$x++;  }
					}
					}
					if($numrowslihat=='0')
					{ echo "<script type='text/javascript'>alert('Data Tidak Ditemukan');</script>"; 
					  echo "<tr><th colspan='14'><center>Data tidak ditemukan</center></th></tr>";
					} 
					?>
					</table></div>
	   				<div class="panel-footer">
					<p class="text-right"><a href="export_to_xls.php?prmj&&kategori=<?php echo $kat;?>&keyword_cari=<?php echo $key;?>" class="btn btn-warning"><i class=""fa fa-file-excel-o"" aria-hidden="true" title="Download sebagai Excel"></i> Download sebagai Excel (.xls)</a>
					<a href="export_to_word.php?prmj&&kategori=<?php echo $kat;?>&keyword_cari=<?php echo $key;?>" class="btn btn-info"><i class=""fa fa-file-word-o"" aria-hidden="true" title="Download sebagai Dokumen"></i> Download sebagai Dokumen (.docx)</a></p>
					<!-- <a href="export_to_pdf_tpq.php" class="btn btn-danger"><i class=""fa fa-file-pdf-o"" aria-hidden="true" title="Download sebagai PDF"></i> Download sebagai PDF (.pdf)</a> -->
					</div>
					</div>
					<?php
					}
					?>
					
	
<?php
	function tambah(){
	if (isset($_GET['tambah']))
	{
	
		
	?>
	
	
	<div class="panel panel-default">
	<div class="panel-heading">
    <h3 class="panel-title">Tambah Data</h3>
	</div>
	<div class="panel-body">
    <div id="content">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#profil" data-toggle="tab">Profil Praremaja</a></li>
		<li><a href="#foto" data-toggle="tab">Foto Praremaja</a></li>
        
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="profil">
		
		<br>
		<form  method="post" enctype="multipart/form-data">
		<!--
		<div class="form-group">
		<label>ID Praremaja</label>
        <input type="text" name="tx_id_prmj"  class="form-control" value="<?php //echo autoNumber(); ?>" >
        </div>
		-->
        <div class="form-group">
        <label>Nama Praremaja</label>
        <input type="text" class="form-control" name='tx_nm_prmj' placeholder="Nama" required>
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
        <input type="text" name="tx_tmp_lhr" class="form-control" placeholder="Tempat Lahir" required>
        </div>
        <div class="form-group">
        <label>Tanggal Lahir</label>
		<div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" placeholder="dd/mm/yyyy">
         <input class="form-control" size="10" type="text" name="tx_tgl_lhr" required placeholder="dd/mm/yyy">
		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                </div>
        </div>
		<div class="form-group">
        <label>Pendidikan</label>
        <select name="tx_pdkn" class="form-control input-md">
			<option value="SMP">SMP</option>
			<option value="MTS">MTS</option>
			
			
		</select>
		</div>
		<div class="form-group">
		<label>Kelas</label>
		<select name="tx_kls" class="form-control input-md">
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			
				
		</select>
        </div>
		<div class="form-group">
		<label>Nama Sekolah</label>
		<input type="text" name="tx_nm_sklh" class="form-control" placeholder="Nama Sekolah" required>
        </div>
		<div class="form-group">
        <label>Hobi</label>
        <input type="text" name="tx_hobi" class="form-control" placeholder="Hobi Praremaja">
        </div>
		
        <div class="form-group">
        <label>Orang Tua</label>
		<input type="text" name="bapak" class="form-control" placeholder="Nama Bapak">
        </div>
		<div class="form-group">
		<input type="text" name="ibu" class="form-control" placeholder="Nama Ibu">
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
		include 'cek_session.php';
		require_once "../db/database.php";
		$select_user_login="SELECT * FROM user_entry_login inner join data_tpq on user_entry_login.id_tpq=data_tpq.id_tpq where id_user='$usnm'";
		$query_user_login=mysql_query($select_user_login);
		$getdata_user=mysql_fetch_object($query_user_login);
		$tpq_user=$getdata_user->id_tpq;
		
		
		//$id=$_POST['tx_id_peng'];
		$nm=$_POST['tx_nm_prmj'];
		$klmn=$_POST['tx_jklmn'];
		$nm_p=mysql_real_escape_string($nm);
		$tmp_lhr=$_POST['tx_tmp_lhr'];
		$tgl_lhr=$_POST['tx_tgl_lhr'];
		$pdkn=$_POST['tx_pdkn'];
		$kls=$_POST['tx_kls'];
		$nm_sklh=$_POST['tx_nm_sklh'];
		$nm_sklh_p=mysql_real_escape_string($nm_sklh);
		$kls=$_POST['tx_kls'];
		$kls=mysql_real_escape_string($kls);
		$hobi=$_POST['tx_hobi'];
		$tpq_ds=$tpq_user;
		$nm_tpq=$getdata_user->nama_tpq;
		$bapak=$_POST['bapak'];
		$ibu=$_POST['ibu'];
		$kontak=$_POST['tx_kontak'];
		$almt=$_POST['tx_alamat'];
		$foto=$_FILES['Filegambar2']['name'];	
		
		$query = "SELECT MAX(RIGHT(id_prmj, 4)) as max_id FROM data_praremaja ORDER BY id_prmj"; 
		$result = mysql_query($query); 
		$data = mysql_fetch_array($result); 
		$id_max = $data['max_id']; 
		$sort_num = (int) substr($id_max, 2, 4); 
		$sort_num++; 
		$gmx="PMJ";
		$new_code = sprintf("%02s", $sort_num, $gmx); 
		$new_code_2="$gmx$new_code";
		$id=$new_code_2;
		
		$isi="INSERT INTO data_praremaja VALUES('$id','$nm_p','$klmn','$tmp_lhr','$tgl_lhr','$pdkn','$kls','$nm_sklh_p','$hobi','$tpq_ds','$nm_tpq','$bapak','$ibu','$kontak','$almt','$foto')";
		echo $isi;
		$sqltambah=mysql_query($isi) or die(mysql_error());
		$dir_foto="../images/foto_prmj/"; 
		$foto_data = $dir_foto . basename($_FILES['Filegambar2']['name']);
		$move_foto=move_uploaded_file($_FILES['Filegambar2']['tmp_name'], $foto_data);
		//$video_data	= $videofolder . basename($_FILES['Filevideo']['name']);
		//$move_video=move_uploaded_file($_FILES['Filevideo']['tmp_name'], $video_data);
		if($sqltambah) 
		{		
		?>
		<script type="text/javascript"> 
			alert("Data sudah disimpan");window.location.href='detail-praremaja.php?detail=<?php echo $id; ?>';
		</script>
		<?php
		}
		if(!$sqltambah)
		{
			echo '<script type="text/javascript"> 	alert("Data gagal disimpan");	</script>';
		}
		} 
		}
		
		?>
		
		<?php
		if (isset($_GET['hapus'])){
        include 'cek_session.php';
	    require_once "../db/database.php";
	    $select_user_login="SELECT * FROM user_entry_login where id_user='$usnm'";
	    $query_user_login=mysql_query($select_user_login);
	    $getdata_user=mysql_fetch_object($query_user_login);
	    $tpq_user=$getdata_user->id_tpq;  
		
		$hapus="DELETE FROM `data_praremaja` WHERE `id_prmj` = '".$_GET['hapus']."' AND data_praremaja.tpq_desa='".$tpq_user."'";
		
		$sqlhapus=mysql_query($hapus);
		
		if($sqlhapus)
		{
			
			echo '<script type="text/javascript">alert("Data sudah dihapus");window.location.href="data-praremaja.php";	</script>';
		}
		else
		{
			echo '<script type="text/javascript"> 	alert("Data gagal dihapus!!");	</script>';
			
		}
		} }  
		?>
	