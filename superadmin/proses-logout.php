<?php

session_start();

// menghapus session username
unset($_SESSION['adm']);
echo "<script type='text/javascript'>window.location.href='../login.php';alert('Anda berhasil keluar');</script>";

?>