<!doctype html>
<?php
if(isset($_POST['masuk'])){
session_start();
require_once "db/database.php";
$usnm=$_POST['tx_usnm'];
$pass=$_POST['tx_pas'];
$sql="SELECT * FROM `user_entry_login` WHERE `id_user`='$usnm' AND `password`='$pass'";
$query=mysql_query($sql);
$count=mysql_num_rows($query);
	
	if ($count) 
	{		
			
			$_SESSION['user']=$usnm;
			echo '<script language="javascript">';
			echo 'alert("Login sebagai User Entry")';
			echo '</script>';			
			echo "<script type='text/javascript'>window.location.href='user/index.php';</script>"; 
			
			
			
	}
	else
	{
		echo "<script>alert('Username & Password Salah');</script>";
	}
	
    

}
?>

<html lang="en"><head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="lib/font-awesome/css/font-awesome.css">

    <script src="lib/jquery-1.11.1.min.js" type="text/javascript"></script>

    

    <link rel="stylesheet" type="text/css" href="stylesheets/theme.css">
    <link rel="stylesheet" type="text/css" href="stylesheets/premium.css">

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
  

    <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <a class="" href="index.html"><span class="navbar-brand"><p>SIM PPG Jakarta Pusat</p></span></a></div>

        <div class="navbar-collapse collapse" style="height: 1px;">

        </div>
      </div>
    </div>
    

<br>
<br><br>
        <div class="dialog">
    <div class="panel panel-default">
        <center><p class="panel-heading no-collapse">Login sebagai User Entry</p></center>
        <div class="panel-body">
            <form  name="masuk_admin" method="post">
			<center><img src="images/lock.png" class="img-responsive" width="100" height="100"></center>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control span12" name="tx_usnm">
                </div>
                <div class="form-group">
                <label>Password</label>
                    <input type="password" class="form-control span12 form-control" name="tx_pas">
                </div>
				<a href="index.php" class="btn btn-warning pull-left">Kembali</a>
                <input type="submit" name="masuk" value="Masuk" class="btn btn-primary pull-right">
				
                
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
    
    
</div>



    <script src="lib/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
        $("[rel=tooltip]").tooltip();
        $(function() {
            $('.demo-cancel-click').click(function(){return false;});
        });
    </script>
    
  
</body></html>
