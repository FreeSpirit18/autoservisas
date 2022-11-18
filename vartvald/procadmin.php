<?php
// procadmin.php  kai adminas keičia vartotojų įgaliojimus ir padaro atžymas lentelėje per admin.php
// ji suformuoja numatytų pakeitimų aiškią lentelę ir prašo patvirtinimo, toliau į procadmindb, kuri įrašys į DB

session_start();
// cia sesijos kontrole
if (!isset($_SESSION['prev']) || (($_SESSION['prev'] != "admin") && ($_SESSION['prev'] != "procadmin")))
{ header("Location: logout.php");exit;}

include("include/nustatymai.php");
include("include/functions.php");
$_SESSION['prev'] = "procadmin";

$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$sql = "SELECT username,userlevel,email,timestamp "
            . "FROM " . TBL_USERS . " ORDER BY userlevel DESC,username";
	$result = mysqli_query($db, $sql);
	if (!$result || (mysqli_num_rows($result) < 1))  
			{echo "Klaida skaitant lentelę users"; exit;}
?>
<html>
    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Administratoriaus sąsaja</title>
        <link href="include/styles.css" rel="stylesheet" type="text/css" >
    <style>
			#paslauga {font-family: Arial; border-collapse: collapse; width: 70%;}
			#paslauga td {border: 1px solid #ddd; padding: 8px; background-color: white;}
			#paslauga tr:nth-child(even){background-color: #f2f2f2; background-color: white;}
			#paslauga tr:hover {background-color: #ddd;}
			#paslauga td:hover {background-color: #ddd;}
			#paslauga th {background-color: yellow;}
		</style>
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
		<section class="features3 cid-ssKysQzxEQ" id="features3-g">
			<div class="container">
        <div class="text-wrapper">
                    <div class="main-heading">
                        <h2 class="title mbr-section-title mbr-fonts-style display-5"><strong>Vartotojų įgaliojimų pakeitimas</strong></h2>
                    </div>
                </div>
		<form name="vartotojai"  action="procadmindb.php" method="post">
		<table class="center" style=" border-width: 0px; border-style: dotted;"><tr><td width="30%" >
           [<a href="admin.php">Atgal</a>]</td>
			<td width="30%">Patikrinkite ar teisingi pakeitimai</td><td align ="right" width="30%"> <input class="btn btn-primary display-4" type="submit" value="Atlikti"></td></tr></table> <br> 
		
    <table class="center" border="1" cellspacing="0" cellpadding="3">
    <tr><td><b>Vartotojo vardas</b></td><td><b>Buvusi rolė</b></td><td><b>Nauja rolė</b></td></tr>
<?php
		$naikpoz=false;   // ar bus naikinamu vartotoju
        while($row = mysqli_fetch_assoc($result)) 
	{	 
	    $level=$row['userlevel']; 
	  	$user= $row['username'];
		$nlevel=$_POST['role_'.$user];
		$naikinti=(isset($_POST['naikinti_'.$user]));
		if ($naikinti || ($nlevel != $level)) 
		{ 	$keisti[]=$user;                    // cia isiminti kuriuos keiciam, ka keiciam bus irasyta i $pakeitimai
      		echo "<tr><td>".$user. "</td><td>";    // rodyti sia eilute patvirtinimui
 			if ($level == UZBLOKUOTAS) echo "Užblokuotas";
			else
				{foreach($user_roles as $x=>$x_value)
			      {if ($x_value == $level) echo $x;}
				} 
			echo "</td><td>";
      		if ($naikinti)
			    {      echo "<font color=red>PAŠALINTI</color>";
				       $pakeitimai[]=-1; // ir isiminti  kad salinam
				       $naikpoz=true;
			} else 
				{      $pakeitimai[]=$nlevel;    // isiminti i kokia role
				if ($nlevel == UZBLOKUOTAS) echo "UŽBLOKUOTAS";
				else
					{foreach($user_roles as $x=>$x_value)
			      		{if ($x_value == $nlevel) echo $x;}
        			}
				}
				
				echo "</td></tr>";
		}
  }
  if ($naikpoz) {echo "<br>Dėmesio! Bus šalinami tik įrašai iš lentelės 'users'.<br>";
  				 echo "Kitose lentelėse gali likti susietų įrašų.";
				}
// pakeitimus irasysim i sesija 
	if (empty($keisti)){header("Location:index.php");exit;}  //nieko nekeicia
		
   $_SESSION['ka_keisti']=$keisti; $_SESSION['pakeitimai']=$pakeitimai;
?>
	  </table>
    </form>
		</div></section>
		<section class="header1 cid-ssKyp4h2vs mbr-fullscreen" id="header1-a">
		<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(211,10,10)"></div>
		</section>
  </body></html>
