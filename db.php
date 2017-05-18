<?php  //                       toc clos
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$hostname_conexion_orange = "localhost";
$database_conexion_orange = "pfe";
$username_conexion_orange = "root";
$password_conexion_orange = "";
$conexion_orange = mysql_pconnect($hostname_conexion_orange, $username_conexion_orange, $password_conexion_orange) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_select_db($database_conexion_orange, $conexion_orange);
?>