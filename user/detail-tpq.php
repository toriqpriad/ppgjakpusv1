<?php include 'cek_session.php';?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Detail TPQ</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">
	
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
          <a class="" href="index.php"><span class="navbar-brand">   Sistem Informasi Manajemen PPG Jakarta Pusat </span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">
          <ul id="main-menu" class="nav navbar-nav navbar-right">
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> Super Administrator
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
	<center><img src="img/logo.jpg" class="img-responsive img-thumbnail" width="150"></center>
	<br>
    <ul>
	
    <li><a href="index.php" class="nav-header"><i class="fa fa-fw fa-dashboard"></i> Beranda</a></li>
    <li><a href="data-tpq.php" class="nav-header"><i class="fa fa-fw fa-home"></i> Data TPQ</a></li>

		<li><a href="#" data-target=".pengajar" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Pengajar<i class="fa fa-collapse"></i></a></li>
        <li><ul class="pengajar nav nav-list collapse">
            <li ><a href="data-pengajar.php"><span class="fa fa-external-link"></span> Data Pengajar</a></li>
            </ul>
		</li>
        <li><a href="#" data-target=".caberawit" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Caberawit<i class="fa fa-collapse"></i></a></li>
        <li><ul class="caberawit nav nav-list collapse">
            <li ><a href="data-caberawit.php"><span class="fa fa-external-link"></span> Data Caberawit</a></li>
            </ul>
		</li>
		<li><a href="#" data-target=".praremaja" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Praremaja<i class="fa fa-collapse"></i></a></li>
        <li><ul class="praremaja nav nav-list collapse">
            <li ><a href="data-praremaja.php"><span class="fa fa-external-link"></span> Data Praremaja</a></li>
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
            <li class="active">Data TPQ</li>
        </ul>

        </div>
        <div class="main-content">
		<div class="container">
		<div class="panel panel-default">
		<div class="panel-heading">Detail Data</div>
		<div class="panel-body"><?php detail(); ?></div>
<?php 
	function detail(){
	if (isset($_GET['detail']))
	{
	
	require_once "../db/database.php";
	$detail_skrip="SELECT * FROM data_tpq inner join user_entry_login on data_tpq.id_tpq=user_entry_login.id_tpq where `data_tpq`.`id_tpq` = '".$_GET['detail']."' ";
	$selectdetail = mysql_query($detail_skrip) or die(mysql_error());
    $selectdetail2 = mysql_fetch_object($selectdetail);
	
	
	echo '
	
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail TPQ</a></li>
		<li><a href="#login" data-toggle="tab">User Login</a></li>
        <li><a href="#logo" data-toggle="tab">Logo TPQ</a></li>
        <li><a href="#foto" data-toggle="tab">Foto TPQ</a></li>
		
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="detail_tpq">
		<br>
        <form id="tab">
		<div class="form-group">
        <label>ID TPQ</label>
        <input type="text" value='.$selectdetail2->id_tpq.' class="form-control" disabled>
        </div>
        <div class="form-group">
        <label>Nama TPQ</label>
        <input type="text" class="form-control" value="'.$selectdetail2->nama_tpq.'" disabled>
        </div>
        <div class="form-group">
        <label>Kepala TPQ</label>
        <input type="text" value="'.$selectdetail2->kepala_tpq.'" class="form-control" disabled>
        </div>
        <div class="form-group">
        <label>Pembina TPA</label>
        <input type="text" value="'.$selectdetail2->pembina_tpq.'" class="form-control" disabled>
        </div>
		<div class="form-group">
        <label>Desa</label>
        <input type="text" value="'.$selectdetail2->desa.'" class="form-control" disabled>
        </div>
        <div class="form-group">
        <label>Jumlah Kelompok</label>
        <input type="text" value="'.$selectdetail2->jml_kelompok.'" class="form-control" disabled>
        </div>
		
		<div class="form-group">
        <label>Kontak</label>
        <input type="text" value="'.$selectdetail2->kontak.'" class="form-control" disabled>
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <textarea rows="3" class="form-control" disabled>'.$selectdetail2->alamat.'</textarea>
        </div>      
        
      </div>
	  </form>
      <div class="tab-pane" id="login">
	  <br>
	  <div class="form-group">
		<label>Username</label>
		<input type="text" name="tx_id_user" class="form-control" value="'.$selectdetail2->id_user.'"  disabled>
		</div>
			
		<div class="form-group">
		<label>Password</label>
		<input id="pwd0"  class="form-control" type="password"   value="*************" name="pass_user" disabled>
		</div>
		
		<div class="form-group">
		<label>Email</label>
		<input type="text" name="tx_id_email" class="form-control"   disabled value="'.$selectdetail2->email.'">
		</div>
	  </div>
	  <div class="tab-pane" id="logo">
	  <br>
            <img src="../images/logo_tpq/'.$selectdetail2->logo.'" class="img-responsive img-thumbnail" style="width:425px; height:300px;">	
		</div>
      <div class="tab-pane" id="foto">
		<br>
        <img src="../images/foto_tpq/'.$selectdetail2->foto.'" class="img-responsive img-thumbnail" style="width:425px; height:300px;">	
		</div>
		
        </div>
		<br>';
		?>
		<a href="?edit=<?=$selectdetail2->id_tpq;?>" class="btn btn-info"><span class="glyphicon glyphicon-pencil" aria-hidden="true" title="Ubah"></span> Ubah</a>
	<a href="data-tpq.php?hapus=<?=$selectdetail2->id_tpq;?>" onclick="return confirm('Yakin menghapus data ini?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Hapus"></span> Hapus</a>
	
	  <?php 
	  echo '
		</div>
 
	<div class="panel-footer">
 	
	
	<a href="export_to_xls_tpq.php?detail='.$selectdetail2->id_tpq.'" class="btn btn-warning"><i class=""fa fa-file-excel-o"" aria-hidden="true" title="Download sebagai Excel"></i> Download sebagai Excel (.xls)</a>
	<a href="export_to_word_tpq.php?detail='.$selectdetail2->id_tpq.'" class="btn btn-info"><i class=""fa fa-file-word-o"" aria-hidden="true" title="Download sebagai Dokumen"></i> Download sebagai Dokumen (.docx)</a>
	
	
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
	$selectedit = mysql_query("SELECT * FROM data_tpq inner join user_entry_login on data_tpq.id_tpq=user_entry_login.id_tpq where `data_tpq`.`id_tpq` = '".$_GET['edit']."' ") or die(mysql_error());
    $selectedit2 = mysql_fetch_object($selectedit);
	echo '
	
	
	
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#detail_tpq" data-toggle="tab">Detail TPQ</a></li>
        <li><a href="#logo" data-toggle="tab">Logo TPQ</a></li>
        <li><a href="#foto" data-toggle="tab">Foto TPQ</a></li>
		
        
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="detail_tpq">
		<br>
        
	<div class="form-group">
		<form  method="post" enctype="multipart/form-data">
        <label>ID TPQ</label>
        <input type="text" name="tx_id_tpq"  class="form-control" value='.$selectedit2->id_tpq.' >
        </div>
        <div class="form-group">
        <label>Nama TPA</label>
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
		
        <div class="form-group">
          <label>Alamat</label>
          <textarea rows="3" class="form-control" name="tx_alamat">'.$selectedit2->alamat.'</textarea>
        </div>
		
		<blockquote><p><h3>Informasi User Entry Login</h3></p></blockquote>
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
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $("#tabs").tab();
    });
</script>    
</div>
</form>	';
	
	  
	  
	  
	  if(isset($_POST['btn_ubah']))
	{
		
		$id=$_POST['tx_id_tpq'];
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
			
		echo "<script type='text/javascript'>alert('Data berhasil diubah');window.location.href='detail-tpq.php?detail=$id';</script>";
		
		}
		else 
		{
		
		echo "<script type='text/javascript'>alert('Data gagal diubah')</script>";
		}
		} }	 }?>
		
		
            
        </div>
    </div>


    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    
    
  
</body></html>		