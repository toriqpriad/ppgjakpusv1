<?php
session_start();
if (empty($_SESSION['adm'])) {
    //echo '<meta http-equiv="refresh" content="0;url=../admin/masuk_admin.php">';
	header("location: ../login.php");
}
else {
    require_once "../db/database.php";
}
function antiinjection($data) {
    $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES))));
    return $filter_sql;
}

?>