<?php 
//echo $_SESSION['admn'];
include 'cek_session.php';?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Pengurus PPG Jakarta Pusat</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
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
    <br><br><br>

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
		<li><a href="#" data-target=".pgrs" class="nav-header collapsed" data-toggle="collapse" ><i class="fa fa-fw fa-university"></i> Pengurus PPG<i class="fa fa-collapse"></i></a></li>
        <li><ul class="pgrs nav nav-list collapsed">
            <li><a href="data-pengurus.php"><span class="fa fa-users"></span>  Data Pengurus </a></li>
			<li class="active"><a href="data-pengurus.php"><span class="fa fa-puzzle-piece"></span>  Pengurus Perbidang</a></li>
			<li><a href="data-pengurus.php"><span class="fa fa-file-text"></span>  Musyawarah PPG </a></li>
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
            <li class="active">Pengurus PPG Jakarta Pusat</li>
        </ul>

        </div>
        <div class="main-content">
		<div class="alert alert-warning" role="alert">
		Dalam pelaksanaan tugas dan kewajibannya, PPG Jakarta Pusat membentuk sebuah kepengurusan yang bergerak masing-masing bidang tertentu antara lain : 
		</div>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="harian">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#harian-isi" aria-expanded="false" aria-controls="collapseTwo">
          Pengurus Harian
        </a>
      </h4>
    </div>
    <div id="harian-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="harian">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="pdkn">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#pdkn-isi" aria-expanded="false" aria-controls="collapseTwo">
          Bidang Pendidikan
        </a>
      </h4>
    </div>
    <div id="pdkn-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="pdkn">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="kurikulum">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#kurikulum-isi" aria-expanded="false" aria-controls="collapseThree">
          Bidang Kurikulum
        </a>
      </h4>
    </div>
    <div id="kurikulum-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="kurikulum">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="konseling">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#konseling-isi" aria-expanded="false" aria-controls="collapseThree">
          Bidang Konseling
        </a>
      </h4>
    </div>
    <div id="konseling-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="konseling">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="kemandirian">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#kemandirian-isi" aria-expanded="false" aria-controls="collapseThree">
          Bidang Kemandirian
        </a>
      </h4>
    </div>
    <div id="kemandirian-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="kemandirian">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
   <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="sarana-prasarana">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#sarana-prasarana-isi" aria-expanded="false" aria-controls="collapseThree">
          Bidang Sarana & Prasarana
        </a>
      </h4>
    </div>
    <div id="sarana-prasarana-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="sarana-prasarana">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="seni-olh">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#seni-olh-isi" aria-expanded="false" aria-controls="collapseThree">
          Bidang Seni & Olahraga
        </a>
      </h4>
    </div>
    <div id="seni-olh-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="seni-olh">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="keputrian">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#keputrian-isi" aria-expanded="false" aria-controls="collapseThree">
          Bidang Keputrian
        </a>
      </h4>
    </div>
    <div id="keputrian-isi" class="panel-collapse collapse" role="tabpanel" aria-labelledby="keputrian">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="alert alert-info" role="alert">
	<a href="" class="btn btn-success">Tambah Bidang</a>
		</div>
	<footer>
	
	</footer>
</div>

            
    </div>


    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>

