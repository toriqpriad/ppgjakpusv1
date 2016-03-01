
<?php 
$host='localhost'; 
$username='root'; 
$password="evpass15"; 
$db='ppgjakpus'; 
$connect=mysql_connect($host,$username,$password); 
$database = new mysqli($host, $username, $password, $db); 
if ($connect) {
$sql=mysql_select_db($db,$connect); 
}
?>