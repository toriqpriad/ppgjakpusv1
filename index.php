<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="cerulean/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="cerulean/bootstrap.min.css">
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

    
    
	<div class="container">
	<br><br><br>
	 <div class="navbar navbar-default">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="index.php">SIM PPG Jakarta Pusat </a>
                </div>
                <div class="collapse navbar-collapse collapse navbar-responsive-collapse">                 
                  <ul class="nav navbar-nav navbar-right">
				  <li><a href="tpq2.php">TPQ</a></li>
				  <li><a href="pengajar.php">Pengajar</a></li>
				  <li><a href="caberawit.php">Caberawit</a></li>
				  <li><a href="praremaja.php">Praremaja</a></li>
				  <li><a href="remaja.php">Remaja</a></li>
                   
                    
                  </ul>
                </div>
              </div>
	<div class="bs-component">
              <div class="jumbotron">
                <h1>SIM PPG Jakarta Pusat</h1><br>
		<p>Sistem Informasi Manajemen (SIM) PPG Jakarta Pusat adalah sebuah aplikasi database online berbasis web yang dibuat untuk membantu kinerja program PPG (Penggerak Pembina Generus) dalam mengolah data informasi seputar generasi penerus, khususnya di daerah Jakarta Pusat.</p><br>
		
                <p><a class="btn btn-primary btn-lg" href="login-user.php">Klik di sini untuk mengentri data</a> <a class="btn btn-success btn-lg" href="login.php">Klik di sini untuk login superadmin</a> </p>
              </div>
            </div>
		 <div class="navbar navbar-default">
                 <div class="navbar-header">
                <a class="Navbar-brand"><small>PPG Jakarta Pusat @ 2015</small></a>
				</div>
				 
			  </div>
    </div>




<script src="lib/bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  </div>
</body></html>
