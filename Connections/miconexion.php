<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_miconexion = "10.201.227.3";
$database_miconexion = "baseprueba";
$username_miconexion = "root";
$password_miconexion = "ngqvgI6P9FkMyEDk";
$miconexion = new mysqli($hostname_miconexion, $username_miconexion, $password_miconexion, $database_miconexion) or trigger_error(mysqli_connect_error(),E_USER_ERROR);
?>