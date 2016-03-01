<?php 
//echo $_SESSION['admn'];
include 'cek_session.php';
include 'script-dashboard.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIM PPG Jakarta Pusat </title>
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
		 <li><a>TPQ <?php echo $nmtpq;?> - Desa <?php echo $desa;?></a></li> 
            <li class="dropdown hidden-xs">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user padding-right-small" style="position:relative;top: 3px;"></span> User Entry 
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
            <li ><a href="data-praremaja.php"><span class="fa fa-external-link"></span> Data Remaja</a></li>
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
			<p class="stat"><span class="label label-success"><?php echo $countdatapeng; ?></span> Pengajar</p>
			<p class="stat"><span class="label label-info"><?php echo $countdatacbr; ?></span> Caberawit</p>
			<p class="stat"><span class="label label-danger"><?php echo $countdatapraremaja; ?></span> Praremaja</p>
			<p class="stat"><span class="label label-default"><?php echo $countdataremaja; ?></span> Remaja</p>
    		</div>

            <h1 class="page-title">PPG Jakarta Pusat</h1>
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a> </li>
            <li class="active">Beranda</li>
        </ul>

        </div>
        <div class="main-content">
            



	<div class="row">
	<div class="col-md-12">
		<div class="jumbotron img-thumbnail">
		<center><h1>SIM PPG Jakarta Pusat</h1></center><br>
		<center><p>TPQ <?php echo $nmtpq;?> - Desa <?php echo $desa;?></p></center>
		<br>
		<p align='justify'>Sistem Informasi Manajemen (SIM) PPG Jakarta Pusat adalah sebuah aplikasi database online berbasis web yang dibuat untuk membantu kinerja program PPG (Penggerak Pembina Generus) dalam mengolah data informasi seputar generasi penerus, khususnya di daerah Jakarta Pusat.</p><br>
		<center>
		<a href="data-tpq.php" class="btn btn-default ">Manajemen Data TPQ</a>
		<a href="data-pengajar.php" class="btn btn-info ">Manajemen Data Pengajar</a>
		<a href="data-caberawit.php" class="btn btn-warning ">Manajemen Data Caberawit</a>
		<a href="data-praremaja.php" class="btn btn-danger ">Manajemen Data Praremaja</a>
		<a href="data-remaja.php" class="btn btn-success ">Manajemen Data Remaja</a>
		</center>
		
		
		</div>
	</div>
	</div>
    <div class="panel panel-default">
        
        <div id="page-stats" class="panel-collapse panel-body collapse in">
			

					
                    <div class="row">
					<div class="col-md-12">
					
						
                        <div class="col-md-3">
                            <div class="knob-container">
                                <input class="knob"  data-width="200" data-min="0" data-max="50" data-displayPrevious="true" value="<?php echo $countdatapeng; ?>" data-fgColor="#92A3C2" data-readOnly=true;>
                                <h3 class="text-muted text-center">Pengajar</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="50" data-displayPrevious="true" value="<?php echo $countdatacbr; ?>" data-fgColor="#92A3C2" data-readOnly=true;>
                                <h3 class="text-muted text-center">Caberawit</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="50" data-displayPrevious="true" value="<?php echo $countdatapraremaja; ?>" data-fgColor="#92A3C2" data-readOnly=true;>
                                <h3 class="text-muted text-center">Praremaja</h3>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="knob-container">
                                <input class="knob" data-width="200" data-min="0" data-max="50" data-displayPrevious="true" value="<?php echo $countdataremaja; ?>" data-fgColor="#92A3C2" data-readOnly=true;>
                                <h3 class="text-muted text-center">Remaja</h3>
                            </div>
                        </div> 
						 
						
                    </div>
					</div>
					
        </div>
    </div>
	

<div class="row">
<!--    <div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <a href="#Pengajar" class="panel-heading" data-toggle="collapse">Pengajar <span class="label label-warning">+15</span> </a>
            <div id="Pengajar" class="panel-body collapse">
             <table class="table table-bordered" id="pengajar">
			
              <thead>
                <tr class="warning">
				  <th>No.</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
				  <th>Tempat Lahir</th>
				  <th>Tanggal Lahir</th>
				  <th>Pendidikan</th>
				  <th>Status</th>
				  <th>Pernikahan</th>
				  <th>Kelas Ajaran</th>
				  <th>Alamat</th>
				  <th>Kontak</th>
				  
                </tr>
              </thead>
              <tbody>
                <tr>
				  <td>1</td>
                  <td><a>12001</a></td>
                  <td>Habib Maulana</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 1994</td>
				  <td>S1</td>
				  <td>Mubaligh Tugasan</td>
				  <td>Belum Menikah</td>
				  <td>Caberawit</td>
				  <td>Podomoro</td>
				  <td>081123354313</td>
				  
                </tr>
               <tr>
				  <td>2</td>
                  <td><a>12002</a></td>
                  <td>Khusnul Khotimah</td>
                  <td>Wanita</td>
				  <td>Karawang</td>
				  <td>1 Januari 1995</td>
				  <td>SMA</td>
				  <td>Mubalighot Tugasan</td>
				  <td>Belum Menikah</td>
				  <td>Praremaja</td>
				  <td>Podomoro</td>
				  <td>081123354312</td>
				  
                </tr>
                <tr>
				  <td>3</td>
                  <td><a>12003</a></td>
                  <td>Sinung Hidayat</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>16 Maret 1994</td>
				  <td>SMK</td>
				  <td>Mubaligh Tugasan</td>
				  <td>Belum Menikah</td>
				  <td>Remaja</td>
				  <td>Jl. Bentengan Mas V, Sunter , Jakarta Utara</td>
				  <td>081123354354</td>
				  
                </tr>
                
              </tbody>
            </table>
			</div>
        </div>
    </div>
	<div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <a href="#caberawit" class="panel-heading" data-toggle="collapse">Caberawit <span class="label label-info">+5</span> </a>
            <div id="caberawit" class="panel-body collapse">
            <table class="table table-bordered table-striped" id="pengajar">
			
              <thead>
                <tr class="warning">
				  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
				  <th>Tempat Lahir</th>
				  <th>Tanggal Lahir</th>
				  <th>Pendidikan</th>
				  <th>Bapak</th>
				  <th>Ibu</th>
				  <th>Alamat</th>
				  <th>Kontak</th>
				  
                </tr>
              </thead>
              <tbody>
                <tr>
				  <td>1</td>
                  <td><a>11001</a></td>
                  <td>Adrian</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2006</td>
				  <td>SD</td>
				  <td>Nanang</td>
				  <td>Uus</td>
				  <td>Podomoro</td>
				  <td>081123354313</td>
				  
                </tr>
               <tr>
				  <td>2</td>
                   <td><a>11002</a></td>
                  <td>Alfan</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2007</td>
				  <td>SD</td>
				  <td>Abdurrahman</td>
				  <td>Ny. Abdurrahman</td>
				  <td>Jl. Bentengan Mas V, Sunter , Jakarta Utara</td>
				  <td>081123354312</td>
				  
                </tr>
               
                
              </tbody>
            </table>
			</div>
        </div>
    </div>
	<div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <a href="#praremaja" class="panel-heading" data-toggle="collapse">Praremaja <span class="label label-success">+27</span> </a>
            <div id="praremaja" class="panel-body collapse">
            <table class="table table-bordered table-striped">
              <thead>
                <tr class="success">
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
				  <th>Tempat Lahir</th>
				  <th>Tanggal Lahir</th>
				  <th>Tingkatan Sekolah</th>
				  <th>Kelas</th>
				  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>13001</td>
                  <td>Bintang</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2003</td>
				  <td>SMP</td>
				  <td>1</td>
				  <td>Podomoro</td>
                </tr>
				<tr>
                  <td>13002</td>
                  <td>Toriq</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2006</td>
				  <td>SD</td>
				  <td>1</td>
				  <td>Podomoro</td>
                </tr>
                <tr>
                  <td>13003</td>
                  <td>Adi</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2005</td>
				  <td>SMP</td>
				  <td>2</td>
				  <td>Podomoro</td>
                </tr>
                </tbody>
            </table>
			</div>
        </div>
    </div>               
	<div class="col-sm-12 col-md-12">
        <div class="panel panel-default">
            <a href="#remaja" class="panel-heading" data-toggle="collapse">Remaja <span class="label label-danger">+15</span> </a>
            <div id="remaja" class="panel-body collapse">
            <table class="table table-bordered table-striped">
              <thead>
                <tr class="danger">
                  <th>NIM</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
				  <th>Tempat Lahir</th>
				  <th>Tanggal Lahir</th>
				  <th>Tingkatan Sekolah</th>
				  <th>Kelas</th>
				  <th>Alamat</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>10001</td>
                  <td>Indra</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2003</td>
				  <td>SMA</td>
				  <td>1</td>
				  <td>Podomoro</td>
                </tr>
				<tr>
                  <td>10001</td>
                  <td>Aris</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2006</td>
				  <td>SMK</td>
				  <td>2</td>
				  <td>Podomoro</td>
                </tr>
                <tr>
                  <td>10001</td>
                  <td>Dhani</td>
                  <td>Pria</td>
				  <td>Jakarta</td>
				  <td>12 Juli 2005</td>
				  <td>SMA</td>
				  <td>3</td>
				  <td>Podomoro</td>
                </tr>
                </tbody>
            </table>
			</div>
        </div>
    </div>
    -->
</div>


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

