<?php include 'cek_session.php';?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data Admin</title>
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
	<script src="../lib/bootstrap/js/bootstrap.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.js"></script>
	
	<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../lib/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
	<script type="text/javascript" src="../lib/bootstrap/js/bootstrap-datetimepicker.id.js" charset="UTF-8"></script>
    <script type="text/javascript">
        $(function() {
            $(".knob").knob();
        });
    </script>
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
    <br><br>
	<?php
	require_once "../db/database.php";
	$adminget="SELECT * FROM data_admin ";
	$queryadminget=mysql_query($adminget);
    $getadmin = mysql_fetch_object($queryadminget);
	?>
    <div class="sidebar-nav">
	<br>
	<center><img src="img/<?=$getadmin->logo;?>" class="img-responsive img-thumbnail" width="150"></center>
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
        <li><ul class="caberawit nav nav-list collapse ">
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
			<p class="stat"><span class="label label-warning"><?php echo $countdatatpq; ?></span> TPQ</p>
			<p class="stat"><span class="label label-success"><?php echo $countdatapeng; ?></span> Pengajar</p>
			<p class="stat"><span class="label label-info"><?php echo $countdatacbr; ?></span> Caberawit</p>
			<p class="stat"><span class="label label-danger"><?php echo $countdatapraremaja; ?></span> Praremaja</p>
			<p class="stat"><span class="label label-default"><?php echo $countdataremaja; ?></span> Remaja</p>
    		</div>
            <h1 class="page-title">PPG Jakarta Pusat</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class="active">Tentang Akun</li>
        </ul>

        </div>
        <div class="main-content">
		<div class="panel panel-default">
		<div class="panel-heading">Detail Data</div>
		<div class="panel-body">
		<form id="tab" action='' enctype="multipart/form-data" method="post">
<?php 
	
	
	require_once "../db/database.php";
	$skripdetail="SELECT * FROM data_admin ";
	$selectdetail=mysql_query($skripdetail);
    $selectdetail2 = mysql_fetch_object($selectdetail);
	
	echo '
		<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#detail_admin" data-toggle="tab">Detail Admin</a></li>
        <li><a href="#logo" data-toggle="tab">Logo PPG</a></li>
			</ul>
			<div id="my-tab-content" class="tab-content">
			<div class="tab-pane active" id="detail_admin">
			<br>
			
			<div class="form-group">
				<label>Username</label>
				<input type="text" value='.$selectdetail2->username.' class="form-control" name="tx_username">
			</div>
			<div class="form-group">
				<label>Password</label>
				<input type="text" class="form-control" value="'.$selectdetail2->password.'" name="tx_pass">
			</div>
			<div class="form-group">
				<label>Nama Lengkap</label>
				<input type="text" class="form-control" value="'.$selectdetail2->nm_lengkap.'" name="tx_nama">
			</div>
			<div class="form-group">
				<label>Email</label>
				<input type="text" class="form-control" value="'.$selectdetail2->email.'" class="form-control" name="tx_email">
			</div>
			<div class="form-group">
				<label>Kontak</label>
				<input type="text"  class="form-control" value="'.$selectdetail2->kontak.'" class="form-control" name="tx_kontak">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea rows="3" class="form-control" value="'.$selectdetail2->alamat.'" name="tx_alamat">'.$selectdetail2->alamat.'</textarea>
			</div>      
			</div>
		     
			<div class="tab-pane" id="logo">
			<br>
			<img src="img/'.$selectdetail2->logo.'" id="gambar_nodin" width="400" alt="Preview Gambar" class="img-thumbnail img-responsive"/>
			<output id="gambar_nodin"></output>
			<input type="file" name="Filegambar" id="preview_gambar" class="btn btn-info" value='.$selectdetail2->logo.'/>'; ?>
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
			
		<?php 
		echo '
		</div>
		</div>
		<div class="panel-footer">
		<input type="submit" class="btn btn-success" value="Simpan" name="simpan">
		</div>
		</div>	
		';
		?>
</form>
	<?php
	if(isset($_POST['simpan'])){
	$username=$_POST['tx_username'];
	$us=mysql_escape_string($username);
	$password=$_POST['tx_pass'];
	$pass=mysql_escape_string($password);
	
	$nm=$_POST['tx_nama'];
	$email=$_POST['tx_email'];
	$kontak=$_POST['tx_kontak'];
	$alamat=$_POST['tx_alamat'];
	$logo=$_FILES['Filegambar']['name'];
	if(empty($logo)) 
	{
	$skrip_update="UPDATE `data_admin` set username='".$us."',password='".$pass."',nm_lengkap='".$nm."',kontak='".$kontak."',email='".$email."',alamat='".$alamat."' Where `data_admin`.`id` = '0'"; 
	}
	elseif(!empty($logo))
	{
	$skrip_update="UPDATE `data_admin` set username='".$us."',password='".$pass."',nm_lengkap='".$nm."',kontak='".$kontak."',email='".$email."',alamat='".$alamat."' ,logo='".$logo."' Where `data_admin`.`id` = '0'"; 
	}
	$query=mysql_query($skrip_update);
	$dir_logo="img/";
	$logo_data = $dir_logo . basename($_FILES['Filegambar']['name']);
	$move_logo=move_uploaded_file($_FILES['Filegambar']['tmp_name'], $logo_data);
	echo $skrip_update;
	if ($query)
	{ ?>
	<script type="text/javascript"> 
			alert("Data sudah disimpan");window.location.href='tentang_akun.php';
		</script>
	<?php
	}
	}
	?>
    
</div>
</div>
    
  
</body></html>		