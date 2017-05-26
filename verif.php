<?php
session_start();

if( $_SESSION["myusername"] == '' )
{
header('Location: login.php');
exit();
}
?>