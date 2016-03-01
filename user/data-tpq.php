<?php include 'cek_session.php';?>
<?php include 'script-dashboard.php'; ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Data TPQ</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/scrolling-nav.css">
    <link rel="stylesheet" href="../lib/font-awesome/css/font-awesome.css">
	
	
    <script src="../lib/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="../lib/bootstrap/js/jquery.easing.min.js" type="text/javascript"></script>
	<script src="../lib/bootstrap/js/scrolling-nav.js" type="text/javascript"></script>
<script src="../lib/bootstrap/js/bootstrap-show-password.js"></script>
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

    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  

    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="" href="index.php"><span class="navbar-brand">   SIM PPG Jakarta Pusat</span></a></div>

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
	<div class="main-content">
    <div class="content">
        <div class="header">
			<div class="stats">
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
		<div class="row">
				<?php include 'script-data-tpq.php'; ?>
				<?php detail(); ?>
				
		</div>	
			
		</div>
		</div>
        
		
    
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
</body></html>
