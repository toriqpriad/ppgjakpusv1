<?php
if(!isset($_SESSION))
{
session_start();

if(empty($_SESSION['user'])){
echo "<script type='text/javascript'>window.location.href='../login-user.php';</script>";
} 

}
$usnm=$_SESSION['user'];






?>