<?php
session_start();
$_SESSION['filtras'] = "SVECIAS";
header("Location: skaitau.php");exit;
?>