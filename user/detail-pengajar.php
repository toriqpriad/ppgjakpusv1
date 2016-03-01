<?php include 'cek_session.php';?>
<?php include 'script-dashboard.php'; ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detail Pengajar</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">
	<link href="../lib/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <script src="../lib/jquery-1.11.1.min.js" type="text/javascript"></script>

        <script src="../lib/jQuery-Knob/js/jquery.knob.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>


    <link rel="stylesheet" type="text/css" href="../stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="../stylesheets/premium.css">

</head>
<body class=" theme-blue">

    <!-- Demo page code -->

    <script type="text/javascript">
        $(function() {
            var match = document.cookie.match(new RegExp('color=([^;]+)'));
            if(match) var color = match[1];
            if(color) {
                $('body').removeClass(function (index, css) {
                    return (css.match (/\btheme-\S+/g) || []).join(' ')
                })
                $('body').addClass('theme-' + color);
            }

            $('[data-popover="true"]').popover({html: true});
            
        });
    </script>
    <style type="text/css">
        #line-chart {
            height:300px;
            width:800px;
            margin: 0px auto;
            margin-top: 1em;
        }
        .navbar-default .navbar-brand, .navbar-default .navbar-brand:hover { 
            color: #fff;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            var uls = $('.sidebar-nav > ul > *').clone();
            uls.addClass('visible-xs');
            $('#main-menu').append(uls.clone());
        });
    </script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
   
  <!--<![endif]-->

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.php"><span class="navbar-brand">   SIM PPG Jakarta Pusat </span></a></div>

       <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
		   <li><a>TPQ <?php echo $nmtpq;?> - Desa <?php echo $desa;?></a></li> 
		   <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     User Entry
                    <i class="fa fa-caret-down"></i>
                </a>

              <ul class="dropdown-menu">
                <li><a href="tentang_akun.php"><span class="fa fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Tentang Akun</a></li>
                <li class="divider"></li>
                <li><a href="proses-logout.php"><span class="fa fa-sign-out"></span>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>
    <br><br><br>

    <div class="sidebar-nav">
	<br>
	<center><img src="../images/logo_tpq/<?php echo $logo;?>" class="img-responsive img-thumbnail" width="200"></center>
	<br>
    <ul>
	
    <li><a href="index.php" class="nav-header"><i class="fa fa-fw fa-dashboard"></i> Beranda</a></li>
    <li><a href="data-tpq.php" class="nav-header"><i class="fa fa-fw fa-home"></i> Data TPQ</a></li>

		<li><a href="#" data-target=".pengajar" class="nav-header collapse" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Pengajar<i class="fa fa-collapse"></i></a></li>
        <li><ul class="pengajar nav nav-list collapse in">
            <li class="active"><a href="data-pengajar.php"><span class="fa fa-external-link"></span> Data Pengajar</a></li>
            </ul>
		</li>
        <li><a href="#" data-target=".caberawit" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Caberawit<i class="fa fa-collapse"></i></a></li>
        <li><ul class="caberawit nav nav-list collapse">
            <li ><a href="data-caberawit.php"><span class="fa fa-external-link"></span> Data Caberawit</a></li>
            </ul>
		</li>
		<li><a href="#" data-target=".praremaja" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Praremaja<i class="fa fa-collapse"></i></a></li>
        <li><ul class="praremaja nav nav-list collapse">
            <li ><a href="data-remaja.php"><span class="fa fa-external-link"></span> Data Praremaja</a></li>
            </ul>
		</li>
		<li><a href="#" data-target=".remaja" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Remaja<i class="fa fa-collapse"></i></a></li>
        <li><ul class="remaja nav nav-list collapse">
            <li ><a href="data-remaja.php"><span class="fa fa-external-link"></span> Data Remaja</a></li>
            </ul>
		</li>

        <li><a href="bantuan.html" class="nav-header"><i class="fa fa-fw fa-question-circle"></i> Bantuan</a></li>
        <li><a href="tentang_akun.php" class="nav-header"><i class="fa fa-fw fa-info"></i>Tentang Akun</a></li>
        <li><a href="proses-logout.php" class="nav-header"><i class="fa fa-sign-out"></i>Logout</a></li>
            
	
	</ul>
    </div>

    <div class="content">
        <div class="header">
            <div class="stats">
			<?php include 'script-dashboard.php'; ?>
			
			<p class="stat"><span class="label label-success"><?php echo $countdatapeng; ?></span> Pengajar</p>
			<p class="stat"><span class="label label-info"><?php echo $countdatacbr; ?></span> Caberawit</p>
			<p class="stat"><span class="label label-danger"><?php echo $countdatapraremaja; ?></span> Praremaja</p>
			<p class="stat"><span class="label label-default"><?php echo $countdataremaja; ?></span> Remaja</p>
    		</div>

            <h1 class="page-title">PPG Jakarta Pusat</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class="active">Data Pengajar</li>
        </ul>

        </div>
        <div class="main-content">
		<div class="panel panel-default">
		<div class="panel-heading">Detail Data</div>
		<div class="panel-body"><?php detail(); ?></div>
<?php 
	function detail(){
	if (isset($_GET['detail']))
	{
	include 'cek_session.php';
	require_once "../db/database.php";
	$select_user_login="SELECT * FROM user_entry_login where id_user='$usnm'";
	$query_user_login=mysql_query($select_user_login);
	$getdata_user=mysql_fetch_object($query_user_login);
	$tpq_user=$getdata_user->id_tpq;
	
	$skripdetail="SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where id_peng='".$_GET['detail']."' AND tpq_desa='".$tpq_user."'";
	
	$selectdetail=mysql_query($skripdetail);
    $selectdetail2 = mysql_fetch_object($selectdetail);
	$getimg= $selectdetail2->foto_peng;
	
	
	echo '
		<form id="tab">
		<div class="row">
		<div class="col-md-3">
		';
	  if(empty($getimg)){echo '<img src="../images/foto_pengajar/noimg.jpg" class="img-responsive img-thumbnail" style="width:425px; height:300px;">';}
	  else { echo '
	  <img src="../images/foto_pengajar/'.$selectdetail2->foto_peng.'" class="img-responsive img-thumbnail" style="width:425px; height:300px;">'; }
	   echo '
			</div>
		<div class="col-md-9">
			<div class="form-group">
				<label>ID Pengajar</label>
				<input type="text" value='.$selectdetail2->id_peng.' class="form-control" disabled>
			</div>
			<div class="form-group">
				<label>Nama Pengajar</label>
				<input type="text" class="form-control" value="'.$selectdetail2->nm_peng.'" disabled>
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<input type="text" class="form-control" value="'.$selectdetail2->j_klmn.'" disabled>
			</div>
			<div class="form-group">
				<label>Tempat Lahir</label>
				<input type="text" value="'.$selectdetail2->tmp_lhr.'" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label>Tanggal Lahir</label>
				<input type="text" value="'.$selectdetail2->tgl_lhr.'" class="form-control" disabled>
			</div>
		</div>
			
		</div>
		<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Pendidikan</label>
				<input type="text" value="'.$selectdetail2->pdkn.'" class="form-control" disabled>
			</div>
			<div class="form-group">
				<input type="text" value="'.$selectdetail2->ket_pdkn.'" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label>Status</label>
				<input type="text" value="'.$selectdetail2->status.'" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label>Pernikahan</label>
				<input type="text" value="'.$selectdetail2->pkw.'" class="form-control" disabled>
			</div>
		
			<div class="form-group">
				<label>TPQ/Desa</label>
				<input type="text" value="'.$selectdetail2->tpq_desa.' - '.$selectdetail2->nama_tpq.' - '.$selectdetail2->desa.' " class="form-control" disabled>
			</div>
		
			<div class="form-group">
				<label>Kelas Ajar</label>
				<input type="text" value="'.$selectdetail2->kelas_ajar.'" class="form-control" disabled>
			</div>
			<div class="form-group">
				<label>Kontak</label>
				<input type="text" value="'.$selectdetail2->kontak_peng.'" class="form-control" disabled>
			</div>
			
			<div class="form-group">
				<label>Alamat</label>
				<textarea rows="3" class="form-control" disabled>'.$selectdetail2->alamat_peng.'</textarea>
			</div>      
		</div> 
		</div>
		</form>    
		<br>
		</div>
 
 <div class="panel-footer">
 	<div class="row">
	<div class="col-md-6">
	';
	?>
	<a href="?edit=<?=$selectdetail2->id_peng;?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
	<a href="data-pengajar.php?hapus=<?=$selectdetail2->id_peng;?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>
	<?php
	echo '
	</div>
	<div class="col-md-6">
	<p class="text-right">
	<a href="export_to_xls_tpq.php?peng&&detail='.$selectdetail2->id_peng.'" class="btn btn-warning"><i class=""fa fa-file-excel-o"" aria-hidden="true" title="Download sebagai Excel"></i> Download sebagai Excel (.xls)</a>
	<a href="export_to_word_tpq.php?peng&&detail='.$selectdetail2->id_peng.'" class="btn btn-info"><i class=""fa fa-file-word-o"" aria-hidden="true" title="Download sebagai Dokumen"></i> Download sebagai Dokumen (.docx)</a>
	</p>
	</div>
	
	</div>
		</div>
	
	
	
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#tabs").tab();
    });
</script>    

	
	
	
	';
	//edit//
	  }
	  if (isset($_GET['edit']))
	{
	
	require_once "../db/database.php";
	$skripedit="SELECT * FROM data_pengajar inner join data_tpq on data_pengajar.tpq_desa=data_tpq.id_tpq where id_peng='".$_GET['edit']."' ";
	$selectedit = mysql_query($skripedit) or die(mysql_error());
    $selectedit2 = mysql_fetch_object($selectedit);
	$id=$selectedit2->id_peng;
	echo '
	
	
	
   <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail Pengajar</a></li>
        <li><a href="#foto" data-toggle="tab">Foto Pengajar</a></li>
		
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="detail_tpq">
		<br>
        <form method="post" enctype="multipart/form-data" >
		
        <div class="form-group">
        <label>Nama Pengajar</label>
        <input type="text" class="form-control" value="'.$selectedit2->nm_peng.'" name="tx_nm_peng">
        </div>
		<div class="form-group">
        <label>Jenis Kelamin</label>
		 <div class="input-group-btn">
		<select class="form-control input-md" name="jk_kl" >
		<option value='.$selectedit2->j_klmn.'>'.$selectedit2->j_klmn.'</option>
		<option value="Pria">Pria</option>
		<option value="Wanita">Wanita</option>
		</select>	
		</div>
        </div>
        <div class="form-group">
        <label>Tempat Lahir</label>
        <input type="text" value="'.$selectedit2->tmp_lhr.'" class="form-control" name="tx_tmp_lhr" >
        </div>
        <div class="form-group">
        <label>Tanggal Lahir</label>
		<div class="input-group date form_date col-md-5" data-date="" data-date-format="dd/mm/yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
         <input class="form-control" size="10" value="'.$selectedit2->tgl_lhr.'" type="text" name="tx_tgl_lhr" >
		<span class="input-group-addon"><span class="glyphicon glyphicon-calendar">
		</span></span>
         </div>
        </div>
		<div class="form-group">
        <label>Pendidikan</label>
		<select name="tx_pdkn" class="form-control input-md">
		<option value="'.$selectedit2->pdkn.'">'.$selectedit2->pdkn.'</option> 
			<option value="SD">SD</option>
			<option value="SMP">SMP</option>
			<option value="SMA">SMA</option>
			<option value="D3">D3</option>
			<option value="S1">S1</option>
			<option value="S2">S2</option>
		</select>
		</div>
		<div class="form-group">
		<input type="text" value="'.$selectedit2->ket_pdkn.'" class="form-control" name="tx_ket_pdkn">
        </div>
        <div class="form-group">
        <label>Status</label>
         <select name="tx_status" class="form-control input-md">
		 <option value="'.$selectedit2->status.'">'.$selectedit2->status.'</option>
			<option value="Pribumi">Pribumi</option>
			<option value="Mubalegh Tugasan">Mubalegh Tugasan</option>
		</select>
        </div>
		
		<div class="form-group">
        <label>Pernikahan</label>
		<select name="tx_nkh" class="form-control input-md">
			<option value="'.$selectedit2->pkw.'">'.$selectedit2->pkw.'</option>
			<option value="Sudah Menikah">Sudah Menikah</option>
			<option value="Belum Menikah">Belum Menikah</option>
		</select>
        </div>
		
		<div class="form-group">
        <label>TPQ/Desa</label>
        <input type="text" value="'.$selectedit2->tpq_desa.' - '.$selectedit2->nama_tpq.' - '.$selectedit2->desa.' " class="form-control" disabled >
        </div>
		
		<div class="form-group">
        <label>Kelas Ajar</label>
		<select name="tx_kls" class="form-control input-md">
			<option value="'.$selectedit2->kelas_ajar.'">'.$selectedit2->kelas_ajar.'</option>
			<option value="Caberawit">Caberawit</option>
			<option value="Praremaja">Praremaja</option>
			<option value="Remaja">Remaja</option>
		</select>
        </div>
		
		<div class="form-group">
        <label>Kontak</label>
        <input type="text" value="'.$selectedit2->kontak_peng.'" class="form-control" name="tx_kontak">
        </div>
		
        <div class="form-group">
          <label>Alamat</label>
          <textarea rows="3" class="form-control" name="alamat" value='.$selectedit2->alamat_peng.'>'.$selectedit2->alamat_peng.'</textarea>
        </div>      
        
      </div>
        
        <div class="tab-pane" id="foto">
		<br>
			<img src="../images/foto_pengajar/'.$selectedit2->foto_peng.'" id="gambar_nodin" width="400" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
			<output id="gambar_nodin"></output>
			<input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value='.$selectedit2->foto_peng.'/>'; ?>
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
			</div>
			</div>
        <?php 
		echo '
    
	<div class="panel-footer">
	<input type="submit" value="Simpan" name="btn_ubah" class="btn btn-info">
	</div>
	</form>	
	<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#tabs").tab();
    });
	</script>    

	';
		if(isset($_POST['btn_ubah']))
		{
		
		$nm=$_POST['tx_nm_peng'];
		$nm_tpq=mysql_real_escape_string($nm);
		$klmn=$_POST['jk_kl'];
		$tmp_lhr=$_POST['tx_tmp_lhr'];
		$tgl_lhr=$_POST['tx_tgl_lhr'];
		$pdkn=$_POST['tx_pdkn'];
		$ket_pdkn=$_POST['tx_ket_pdkn'];
		$status=$_POST['tx_status'];
		$pkw=$_POST['tx_nkh'];
		$pkw=mysql_real_escape_string($pkw);
		//$tpq_desa=$_POST['tx_tpq'];
		//$nm_tpq=$nmtpq;
		$kls=$_POST['tx_kls'];
		$kontak=$_POST['tx_kontak'];
		$almt=$_POST['alamat'];
		$foto=$_FILES['Filegambar']['name'];
		require_once "../db/database.php";
		if (empty($foto))
		{ 
		$isi="Update data_pengajar set  nm_peng='".$nm."' , j_klmn='".$klmn."', tmp_lhr='".$tmp_lhr."',tgl_lhr='".$tgl_lhr."',pdkn='".$pdkn."', ket_pdkn='".$ket_pdkn."',status='".$status."', pkw='".$pkw."',  kelas_ajar='".$kls."', kontak_peng='".$kontak."', alamat_peng='".$almt."'  WHERE id_peng = '".$id."'";
		}
		elseif (!empty($foto))
		{ 
		$isi="Update data_pengajar set  nm_peng='".$nm."' , j_klmn='".$klmn."' , tmp_lhr='".$tmp_lhr."', tgl_lhr='".$tgl_lhr."',pdkn='".$pdkn."', ket_pdkn='".$ket_pdkn."',status='".$status."', pkw='".$pkw."',  kelas_ajar='".$kls."', kontak_peng='".$kontak."', alamat_peng='".$almt."',foto_peng='".$foto."'  WHERE id_peng = '".$id."'";
		}
		echo $isi;
		$sqltambah=mysql_query($isi) or die(mysql_error());
		$dirfoto="../images/foto_pengajar/";
		$foto_data = $dirfoto . basename($foto);
		$foto_move=move_uploaded_file($_FILES['Filegambar']['tmp_name'], $foto_data);
		
		if($sqltambah) 
		{		
			
		echo "<script type='text/javascript'>alert('Data berhasil diubah');window.location.href='detail-pengajar.php?detail=$id';</script>";
		
		}
		else 
		{
		
		echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
		}
		} }	 }?>
		
		
            <footer>
                
            </footer>	
        </div>
    </div>


    <script src="../lib/bootstrap/js/bootstrap.js"></script>
	
	
	<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../lib/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../lib/bootstrap/js/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
	<input type="hidden" id="dtp_input2" value=""/>
    <script type="text/javascript">
 $('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1,
  startView: 2,
  minView: 2,
  forceParse: 0
    });
</script>
    
  
</body></html>		