<?php include 'cek_session.php';?>
<?php include 'script-dashboard.php'; ?>
<!doctype html>
<html lang="en"><head>

    <meta charset="utf-8">
    <title>Caberawit</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
	<link href="../lib/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">
	
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
    <br><br>

    <div class="sidebar-nav">
	<br>
	<center><img src="../images/logo_tpq/<?php echo $logo;?>" class="img-responsive img-thumbnail" width="200"></center>
	<br>
    <ul>
	
    <li><a href="index.php" class="nav-header"><i class="fa fa-fw fa-dashboard"></i> Beranda</a></li>
    <li><a href="data-tpq.php?detail" class="nav-header"><i class="fa fa-fw fa-home"></i> Data TPQ</a></li>

		<li><a href="#" data-target=".pengajar" class="nav-header collapsed" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Pengajar<i class="fa fa-collapse"></i></a></li>
        <li><ul class="pengajar nav nav-list collapse">
            <li ><a href="data-pengajar.php?detail"><span class="fa fa-external-link"></span> Data Pengajar</a></li>
            </ul>
		</li>
        <li><a href="#" data-target=".caberawit" class="nav-header collapse" data-toggle="collapse"><i class="fa fa-fw fa-bars"></i> Data Caberawit<i class="fa fa-collapse"></i></a></li>
        <li><ul class="caberawit nav nav-list collapse in">
            <li class="active"><a href="data-caberawit.php"><span class="fa fa-external-link"></span> Data Caberawit</a></li>
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
				<li><a href="index.html">Home</a> </li>
				<li class="active">Data Caberawit</li>
			</ul>

        </div>
        <div class="main-content">
		
		<div class="search-well">
                <form class="form-inline" id="myForm" method="post">
                    <input class="input-xlarge form-control" placeholder="Tentukan kata kunci ...  " id="appendedInputButton" type="text" name="keyword_cari" required>
					<select name="kategori_select" class="form-control"  placeholder="Kategori Pencarian"> 
						<option value="id_cbr">ID Caberawit</option>
						<option value="nm_cbr">Nama Caberawit</option>
						<option value="j_klmn">Jenis Kelamin</option>
						<option value="tmp_lhr">Tempat Lahir</option>
						<option value="tgl_lhr">Tanggal Lahir</option>
						<option value="pdkn">Pendidikan (TK/SD)</option>
						<option value="kls">Kelas</option>
						<option value="nm_sklh">Nama Sekolah</option>
						<option value="hobi">Hobi</option>
						<option value="bapak">Bapak</option>
						<option value="ibu">Ibu</option>
						<option value="kontak_cbr">Kontak</option>
					</select>
					<input type="submit" value="Cari Data"  name="btn_cari" title="Cari Data" class="btn btn-danger form-control"> 
                	<a title="Tambah Data" href="data-caberawit.php?tambah" class="btn btn-success form-control"><span class="fa fa-plus"></span> Tambah Data</a>
                </form>
		</div>
		<div class="alert alert-info "><h3 ><strong>Caberawit</strong> adalah para generasi penerus (generus) yang berusia dini, diperkirakan berada di bangku taman kanak-kanak dan sekolah dasar (TK/SD).</h3></div>
	<small>
		
			<?php include 'script-data-caberawit.php'; ?>
	</small>
	
		</div>
				<?php tambah(); ?>
				
		</div>
        
        </div>
		
    </div>
    
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
