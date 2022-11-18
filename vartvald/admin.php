<?php
// admin.php
// vartotojų įgaliojimų keitimas ir naujo vartotojo registracija, jei leidžia nustatymai
// galima keisti vartotojų roles, tame tarpe uzblokuoti ir/arba juos pašalinti
// sužymėjus pakeitimus į procadmin.php, bus dar perklausta

session_start();
include("include/nustatymai.php");
include("include/functions.php");
// cia sesijos kontrole
if (!isset($_SESSION['prev']) || ($_SESSION['ulevel'] != $user_roles[ADMIN_LEVEL]))   { header("Location: logout.php");exit;}
$_SESSION['prev']="admin";
date_default_timezone_set("Europe/Vilnius");
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
        
		<center><b><?php echo $_SESSION['message']; ?></b></center>
        <section class="features3 cid-ssKysQzxEQ" id="features3-g">
			<div class="container">
                <div class="text-wrapper">
                    <div class="main-heading">
                        <h2 class="title mbr-section-title mbr-fonts-style display-5"><strong>Vartotojų registracija, peržiūra ir įgaliojimų keitimas</strong></h2>
                    </div>
                </div>
		<form name="vartotojai" action="procadmin.php" method="post">
	    <table class="center" style=" width:75%; border-width: 0px; ">
		         <tr><td width=30%><a href="index.php">[Atgal]</a></td><td width=30%> 
	<?php
		   if ($uregister != "self") echo "<a  href=\"register.php\"><b>Registruoti naują vartotoją<b></a>";
		   else echo "</td>";
	?>
		   
			</tr></table> <br> 
<?php
    
	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
	$sql = "SELECT username,userlevel,email,timestamp "
            . "FROM " . TBL_USERS . " ORDER BY userlevel DESC,username";
	$result = mysqli_query($db, $sql);
	if (!$result || (mysqli_num_rows($result) < 1))  
			{echo "Klaida skaitant lentelę users"; exit;}
?>
    <table class="center"  border="1" cellspacing="0" cellpadding="3" id="paslauga">
    <tr><td><b>Vartotojo vardas</b></td><td><b>Rolė</b></td><td><b>E-paštas</b></td><td><b>Paskutinį kartą aktyvus</b></td><td><b>Šalinti?</b></td></tr>
<?php
        while($row = mysqli_fetch_assoc($result)) 
	{	 
	    $level=$row['userlevel']; 
	  	$user= $row['username'];
	  	$email = $row['email'];
      	$time = date("Y-m-d G:i", strtotime($row['timestamp']));
      	echo "<tr><td>".$user. "</td><td>";
    	echo "<select name=\"role_".$user."\">";
      	$yra=false;
		foreach($user_roles as $x=>$x_value)
  			{echo "<option ";
        	 if ($x_value == $level) {$yra=true;echo "selected ";}
             echo "value=\"".$x_value."\" ";
         	 echo ">".$x."</option>";
        	 }
		if (!$yra)
        {echo "<option selected value=".$level.">Neegzistuoja=".$level."</option>";}
        $UZBLOKUOTAS=UZBLOKUOTAS; echo "<option ";
        if ($level == UZBLOKUOTAS) echo "selected ";
          echo "value=".$UZBLOKUOTAS." ";
        echo ">Užblokuotas</option>";      // papildoma opcija
      echo "</select></td>";
          
      echo "<td>".$email."</td><td>".$time."</td>";
      echo "<td><input type=\"checkbox\" name=\"naikinti_".$user."\"></td>";
   }
?>
        </table>
        <br> <input type="submit" class="btn btn-primary display-4"  value="Vykdyti">
        </form>
        </div></section>
        <section class="header1 cid-ssKyp4h2vs mbr-fullscreen" id="header1-a">
		<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(211,10,10)"></div>
		</section>
    </body></html>
