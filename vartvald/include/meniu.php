<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Pagrindinis meniu</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    
		<link rel="stylesheet" href="include/mobirise2.css">
        <link rel="stylesheet" href="include/tether.min.css">
        <link rel="stylesheet" href="include/bootstrap.min.css">
        <link rel="stylesheet" href="include/bootstrap-grid.min.css">
        <link rel="stylesheet" href="include/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="include/style.css">
        <link rel="stylesheet" href="include/styles.css">
        <link rel="stylesheet" href="include/style2.css">
		<link rel="stylesheet" href="include/google.css">
        <link rel="stylesheet" href="include/mbr-additional.css" type="text/css">
  
	
	</head>
	<body>
		<section class="article1 cid-ssKyo8HxOy" id="article1-9">
    <div class="mbr-overlay" style="opacity: 0.9; background-image: url('include/header.jpg'); background-color: rgb(63, 66, 78);"></div>

    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <h3 class="mbr-section-title mbr-fonts-style display-1" style="color:black;"><strong>Autoservisas (Karolis Jurkus)</strong></h3>                
                
            </div>
        </div>
    </div>
</section>
	 <section id="header1-a">
    
<?php
if (!isset($_SESSION)) { header("Location: logout.php");exit;}
include("include/nustatymai.php");
$user=$_SESSION['user'];
$userlevel=$_SESSION['ulevel'];
$_SESSION['filtras'] = "VISOS";
$role="";
{foreach($user_roles as $x=>$x_value)
			      {if ($x_value == $userlevel) $role=$x;}
} 
        echo "Prisijungęs vartotojas: <b>".$user."</b>     Rolė: <b>".$role."</b> <br>";
        if ($_SESSION['user'] != "guest")echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='useredit.php';\" value=\"Redaguoti paskyrą\" />&nbsp;&nbsp;";
			
     //Trečia operacija tik rodoma pasirinktu kategoriju vartotojams, pvz.:
        if ($userlevel == $user_roles["Dalyvis"]) {
			
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='meistrai.php';\" value=\"Meistrai\" />&nbsp;&nbsp;";
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='manoregistracijos.php';\" value=\"Mano registracijos\" />&nbsp;&nbsp;";
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='Vertinimas.php';\" value=\"Rašyti vertinimą\" />&nbsp;&nbsp;";
			
       		}  
		if ($userlevel == $user_roles["Meistras"]) {
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='addpaslauga.php';\" value=\"Redaguoti paslaugas\" />&nbsp;&nbsp;";
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='dienos_darbai.php';\" value=\"Dienos darbai\" />&nbsp;&nbsp;";

       		}  
        //Administratoriaus sąsaja rodoma tik administratoriui
        if ($userlevel == $user_roles[ADMIN_LEVEL] ) {
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='admin.php';\" value=\"Administratoriaus sąsaja\" />&nbsp;&nbsp;";
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='skaitau.php';\" value=\"Visi vartotojai\" />&nbsp;&nbsp;";
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='creatpaslauga.php';\" value=\"Paslaugos\" />&nbsp;&nbsp;";
		
        }
		if ($_SESSION['user'] == "guest"){
			echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='sveciomeistrai.php';\" value=\"Meistrai\" />&nbsp;&nbsp;";

		}
		echo "<input type=\"button\" class=\"btn btn-primary display-4\" onclick=\"location.href='logout.php';\" value=\"Atsijungti\" />&nbsp;&nbsp;";
?>
	</section>
	<section class="header1 cid-ssKyp4h2vs mbr-fullscreen" id="header1-a">
		<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(211,10,10)"></div>
		</section>
		</body>
</html>    
 