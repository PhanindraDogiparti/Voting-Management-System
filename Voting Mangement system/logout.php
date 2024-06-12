<?php
session_start();
$_SESSION = array();
header("Location: Login.php");
?>