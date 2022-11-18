<?php
// index.php
// jei vartotojas prisijungęs rodomas demonstracinis meniu pagal jo rolę
// jei neprisijungęs - prisijungimo forma per include("login.php");
// toje formoje daugiau galimybių...

session_start();
include("include/functions.php");
?>

<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Autoservisas</title>
        

        <link rel="stylesheet" href="include/mobirise2.css">
        <link rel="stylesheet" href="include/tether.min.css">
        <link rel="stylesheet" href="include/bootstrap.min.css">
        <link rel="stylesheet" href="include/bootstrap-grid.min.css">
        <link rel="stylesheet" href="include/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="include/style.css">
        <link rel="stylesheet" href="include/styles.css">
        <link rel="stylesheet" href="include/style2.css">
		<link rel="stylesheet" href="include/google.css">
        <link rel="stylesheet" href="include/mbr-additional.css">
    </head>
    <body>
        
<?php
           
    if (!empty($_SESSION['user']))     //Jei vartotojas prisijungęs, valom logino kintamuosius ir rodom meniu
    {                                  // Sesijoje nustatyti kintamieji su reiksmemis is DB
                                       // $_SESSION['user'],$_SESSION['ulevel'],$_SESSION['userid'],$_SESSION['umail']
		
		inisession("part");   //   pavalom prisijungimo etapo kintamuosius
		$_SESSION['prev']="index"; 
        
        include("include/meniu.php"); //įterpiamas meniu pagal vartotojo rolę
?>
                <div style="text-align: center;color:green">
                    <br><br>
                    <h1></h1>
                </div><br>
      <?php
          }                
          else {   			 
              
              if (!isset($_SESSION['prev'])) inisession("full");             // nustatom sesijos kintamuju pradines reiksmes 
              else {if ($_SESSION['prev'] != "proclogin") inisession("part"); // nustatom pradines reiksmes formoms
                   }  
   			  // jei ankstesnis puslapis perdavė $_SESSION['message']
                echo "<section class=\"contact2 cid-ssKyCsOcpF\" id=\"contact2-10\">";
				echo "<div align=\"center\">";echo "<font size=\"4\" color=\"#ff0000\">".$_SESSION['message'] . "<br></font>";          
                include("include/login.php");                    // prisijungimo forma
                echo "</div><br>";
                echo "</section>";
		  }
?>
            </body>
</html>
