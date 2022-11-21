<html>
	<head>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
		</script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
		</script>
		<style>
			#paslauga {font-family: Arial; border-collapse: collapse; width: 70%;}
			#paslauga td {border: 1px solid #ddd; padding: 8px;}
			#paslauga tr:nth-child(even){background-color: #f2f2f2;}
			#paslauga tr:hover {background-color: #ddd;}
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
				<div class="row justify-content-center">            
            <div class="col-12 col-lg"> 
				
				<div align="left">
			<a href="index.php">Grįžti į meniu</a>
				</div>
		<?php
		$server="localhost";
		$user="stud";
		$password="stud";
		$dbname="vartvald";
		$lentele="users";

		session_start(); 

		$conn = new mysqli($server, $user, $password, $dbname);
   		if ($conn->connect_error) die("Negaliu prisijungti: " . $conn->connect_error);
		mysqli_set_charset($conn,"utf8");// dėl lietuviškų raidžių


		if ($_SESSION['filtras'] == "VISOS") 
       	$sql =  "SELECT * FROM $lentele";
		else if ($_SESSION['filtras'] == "MEISTRAI" or $_SESSION['filtras'] == "SVECIAS") {
        $meistras = 3; 
        $sql =  "SELECT * FROM $lentele WHERE userlevel = '$meistras'";}
		else die ("Bloga filtro reikšmė:".$_SESSION['filtras']);


		if (!$result = $conn->query($sql)) die("Negaliu nuskaityti: " . $conn->error);
		// parodyti
		echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
		while($row = $result->fetch_assoc()) {
    		echo "<tr><td>".$row['username']."</td>";
			echo "<td>".$row['email']."</td>";
			if ($_SESSION['filtras'] == "MEISTRAI"){
			//$_SESSION['meistras']=$row['username'];
		
				echo "<td><form method=\"get\" action=\"meistras.php\">";
    			echo "<input type=\"hidden\" name=\"varname\" value=".$row['username'].">";
    			echo "<input type=\"submit\" class=\"btn btn-primary display-4\" name =\"meistras\" value =\"meistras\"></form></td>";
			}
	
			echo "</tr>";
			}
		echo "</table>";
		//echo "<a href=\"ivedimas.php\">Dar kartą</a>";
		$conn->close();
		?>


				</div>
				</div>
				</div>
			</section>
	<section class="header1 cid-ssKyp4h2vs mbr-fullscreen" id="header1-a">
		<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(211,10,10)"></div>
		</section>
	</body>
</html>