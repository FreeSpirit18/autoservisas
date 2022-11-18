<?php
session_start();
$_SESSION['filtras'] = "MEISTRAI";
header("Location: skaitau.php");exit;
?>