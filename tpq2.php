<?php if(!isset($_GET['q'])) {?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Data TPQ</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" type="text/css" href="cerulean/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="cerulean/bootstrap.min.css">
	<script type="text/javascript" src="jquery.min.js"></script>
<script src="lib/bootstrap/js/jquery-1.8.3.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
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
				  
				  <li class="active"><a href="tpq2.php">TPQ</a></li>
				  <li><a href="pengajar.php">Pengajar</a></li>
				  <li><a href="caberawit.php">Caberawit</a></li>
				  <li><a href="praremaja.php">Praremaja</a></li>
				  <li><a href="remaja.php">Remaja</a></li>
                   
                    
                  </ul>
                </div>
              </div>              
			  <div class="jumbotron">
			  <h1>TPQ</h1>
				Taman Pendidikan Al Qur’an (disingkat (TPA/TPQ)) adalah lembaga atau kelompok masyarakat yang menyelenggarakan pendidikan nonformal jenis keagamaan Islam yang bertujuan untuk memberikan pengajaran membaca Al Qur’an sejak usia dini, serta memahami dasar-dasar dinul Islam pada anak usia taman kanak-kanak, sekolah dasar dan atau madrasah ibtidaiyah (SD/MI) atau bahkan yang lebih tinggi.
				TPA/TPQ setara dengan RA dan taman kanak-kanak (TK), di mana kurikulumnya ditekankan pada pemberian dasar-dasar membaca Al Qur'an serta membantu pertumbuhan dan perkembangan rohani anak agar memiliki kesiapan dalam memasuki pendidikan lebih lanjut.
				<p>
			  
				<form name="form1" method="get" action=""> 
				<input class="input-xlarge form-control" placeholder="Tentukan ID TPQ,Nama TPQ,Desa,dll...  " id="q" type="text" name="q" required>
				</form> 
			  </div>
				
				
				
				
				
            
<br>

<div id="result" class="panel-default">
<script type="text/javascript">
	var allow = true;
	$(document).ready(function(){
		$("#q").keyup(function(e){
			if(e.which == '13'){
				e.preventDefault();
					
				loadData();
			}else if($(this).val().length >= 0){
					
				loadData();
			}
		});
	});
	function loadData(){
	var query=document.getElementById('q').value;
		if(allow){
			allow = false;
			$("#result").html('loading...');
			$.ajax({
				url:'tpq2.php?q='+query,
				success:
					function (data){
					$("#result").html(data);
					allow = true;
				}
			});
		}
	}
</script>
<?php };?>
<style>
.highlight
{
background: #CEDAEB;
}

.highlight_important
{
background: #9afa95;
}
</style>

<?php 
//Fungsi Mark Teks
function hightlight($str, $keywords = '')
{
$keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords))); // filter

$style = 'highlight';
$style_i = 'highlight_important';

/* Apply Style */

$var = '';

foreach(explode(' ', $keywords) as $keyword)
{
$replacement = "<span class='".$style."'>".$keyword."</span>";
$var .= $replacement." ";

$str = str_ireplace($keyword, $replacement, $str);
}
$str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
return $str;
}

//END Fungsi Mark Teks
if(isset($_GET['q']) && $_GET['q']){ 
 $conn = mysql_connect("localhost", "root", "evpass15"); 
 mysql_select_db("ppgjakpus"); 
 $q = $_GET['q'];
 
//Menghitung Jumlah Yang Tampil 

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$mulai_dari = $limit * ($page - 1);
$sqlCount = "select count(id_tpq) from data_tpq where id_tpq like '%$q%' or nama_tpq like '%$q%' or desa like '%$q%'";
$rsCount = mysql_fetch_array(mysql_query($sqlCount));
$banyakData = $rsCount[0];
$sql = "select * from data_tpq where id_tpq like '%$q%' or nama_tpq like '%$q%' or desa like '%$q%' order by id_tpq DESC limit $mulai_dari, $limit"; 
//Akhir Menghitung Jumlah Yang Tampil 
 $result = mysql_query($sql);
 

 if(mysql_num_rows($result) > 0){ 
 ?> 
<div class="12">
<div class="table-responsive">
 <table class="table table-hover table-bordered">
 <tr class="warning">
 <td>ID TPQ</td>
 <td>Nama TPQ</td>
 <td>Desa</td>
 <td>Aksi</td>
 </tr>
 <?php 
 while($siswa = mysql_fetch_array($result)){?> 
 <tr> 
 <td><?php echo hightlight($siswa['id_tpq'],$q);?></a></td> 
 <td><?php echo hightlight($siswa['nama_tpq'],$q);?></td> 
 <td><?php echo hightlight($siswa['desa'],$q);?></td> 
 <td><a href="?detail_tpq=<?php echo $siswa['id_tpq'];?>" class="btn btn-success" >Lihat Detail</a></td>
 	 
 </tr> 
 <?php }?> 
 </table> 
 </div>
 </div>
 <?php 
 }else{ 
 echo 'Data Tidak Ada'; 
 } 

} 


?>
  
  </div>
  <?php
  if(isset($_GET['detail_tpq']))
  {
	$id=$_GET['detail_tpq'];
	require_once "db/database.php";
	$select_data_tpq = mysql_query("SELECT * FROM data_tpq inner join user_entry_login on `data_tpq`.`id_tpq`=`user_entry_login`.`id_tpq` where data_tpq.id_tpq='$id'") or die(mysql_error());	
	$numrowslihat= mysql_num_rows($select_data_tpq);
	$getdata_tpq=mysql_fetch_object($select_data_tpq);
	$tpq_nm=$getdata_tpq->nama_tpq;
	include 'getdatacount.php';
	
	echo '			
				<div class="panel panel-default">
				<div class="panel-heading">Detail TPQ</div>
				<div class="panel-body">
					<div class="row">
					
					<div class="col-md-2">
					<br>
					<img src="images/logo_tpq/'.$getdata_tpq->logo.'" class="img-thumbnail img-responsive" width="300">
					</div>
					<div class="col-md-4">
					<br>
	
						    <p><h3><b>'.$getdata_tpq->id_tpq.' - TPQ '.$tpq_nm.'</b></h3></p>
							<p><strong><h5><i class="glyphicon glyphicon-home"></i> &nbsp;&nbsp;Alamat - '.$getdata_tpq->alamat.'</h5></strong></p>
							<p><strong><h5><i class="glyphicon glyphicon-earphone"></i> &nbsp;&nbsp;Kontak - '.$getdata_tpq->kontak.'</h5></strong></p>
							<p><strong><h5><i class="glyphicon glyphicon-envelope"></i> &nbsp;&nbsp;Email - '.$getdata_tpq->email.' </h5></strong></p>
					</div>
					
					<div class="col-md-6">
						<img src="images/foto_tpq/'.$getdata_tpq->foto.'" class="img-responsive img-thumbnail" width="600">
					</div>
					</div>
					<br>
					<div class="row">
					
					<div class="col-md-6">
						<div class="form-group">
						<label>ID TPQ</label>
						<input type="text" value="'.$getdata_tpq->id_tpq.'"class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Nama TPQ</label>
						<input type="text" value="'.$getdata_tpq->nama_tpq.'" class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Kepala TPQ</label>
						<input type="text" value="'.$getdata_tpq->kepala_tpq.'" class="form-control" disabled>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label>Pembina TPQ</label>
						<input type="text" value="'.$getdata_tpq->pembina_tpq.'" class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Desa</label>
						<input type="text" value="'.$getdata_tpq->desa.'" class="form-control" disabled>
						</div>
					
						<div class="form-group">
						<label>Jumlah Kelompok</label>
						<input type="text" value="'.$getdata_tpq->jml_kelompok.'" class="form-control" disabled>
						</div>
					</div>
					</div>
				</div>
				<div class="panel-footer">
				<div class="row">
				
				<div class="col-md-3">
					Pengajar : <b><kbd>'.$countdatapeng.' orang</kbd></b>
				</div>
				<div class="col-md-3">
					Caberawit :<b><kbd>'.$countdatacbr.' orang</kbd></b> 
				</div>
				<div class="col-md-3">
					Praremaja :<b><kbd>'.$countdatapraremaja.' orang</kbd></b> 
				</div>
				<div class="col-md-3">
					Remaja : <b><kbd>'.$countdataremaja.' orang</kbd></b>
				</div>
				</div>
				</div>
					</div>
				
				
			
			
			
'; }
?>				
			  
  
  
  
  
   