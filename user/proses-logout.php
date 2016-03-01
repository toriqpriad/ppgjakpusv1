<?php

session_start();

// menghapus session username
unset($_SESSION['user']);
echo "<script type='text/javascript'>window.location.href='../login-user.php';alert('Anda berhasil keluar');</script>";

?>