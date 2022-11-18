		<?php
session_start(); 
$meistras=$_SESSION['user'];
$userid=$_SESSION['userid'];

$server="localhost";
$user="stud";
$password="stud";
$dbname="vartvald";
$lentele="registracijos";
$lentele2="users";

$date = date("Y-m-d");

$conn = mysqli_connect($server, $user, $password, $dbname);
if(!$conn){ 
	die ("Negaliu prisijungti prie MySQL:".mysqli_error($conn)); 
}
mysqli_set_charset($conn,"utf8");// dėl lietuviškų raidžių
// parodyti
if(array_key_exists('cancel', $_POST)) 
{
	if(is_null($_POST['checkbox'])){
		echo "Nepasirinkote registracijos";
	}else{
	$cancel = $_POST['checkbox'];
	
	foreach ($cancel as $id => $val) {
		//echo $id;
    $sql = "UPDATE $lentele SET busena = 'ATŠAUKTA' WHERE id=$id";
	if (!mysqli_query($conn, $sql)) die ("Klaida ištrinant:" .mysqli_error($dbc));
	}
	echo "Atšaukta";
	mysqli_close($conn);
	header('Location: dienos_darbai.php');
	exit();
	}
}

if(array_key_exists('finish', $_POST)) 
{
	if(is_null($_POST['checkbox'])){
		echo "Nepasirinkote registracijos";
	}else{
	$cancel = $_POST['checkbox'];
	
	foreach ($cancel as $id => $val) {
		//echo $id;
    $sql = "UPDATE $lentele SET busena = 'BAIGTA' WHERE id=$id";
	if (!mysqli_query($conn, $sql)) die ("Klaida ištrinant:" .mysqli_error($dbc));
	}
	echo "Atšaukta";
	mysqli_close($conn);
	header('Location: dienos_darbai.php');
	exit();
	}
}

if(array_key_exists('close', $_POST)) 
{
	$data = $_POST['data'];
	$time = $_POST['Laikas'];
	$combinedDT = date('Y-m-d H:i:s', strtotime("$data $time"));
	$takenSQL = "SELECT id FROM $lentele2 WHERE meistro_id = '$userid' AND paslaugos_id = '$id'";
	$taken = mysqli_query($conn, $takenSQL);
	
	$takenSQL = "SELECT id FROM $lentele WHERE meistro_id = '$userid' AND darbolaikas = '$combinedDT' AND (busena = 'PATVIRTINTA' OR 'UŽDARYTA' OR 'BAIGTA')";
	$taken = mysqli_query($conn, $takenSQL);
	
	if($taken->num_rows == 0){
		$sql = "INSERT INTO $lentele (vartotojo_id, meistro_id, registracijoslaikas, kaina, busena, darbolaikas, paslaugos ) VALUES ('$userid', '$userid', NOW() , '0', 'UŽDARYTA', '$combinedDT', '-')";
		if (!mysqli_query($conn, $sql)) die ("Klaida ištrinant:" .mysqli_error($dbc));
		echo "Uždaryta";
	}
	else{
		echo "Užimtas laikas";
	}
	mysqli_close($conn);
	header('Location: dienos_darbai.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
		</script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
		</script>
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
<title>Page Title</title>
</head>
	
	<body>
		<section class="features3 cid-ssKysQzxEQ" id="features3-g">
			<div class="container">
				<div class="row justify-content-center">            
            <div class="col-12 col-lg"> 
		<form method='post'>
	<?php
				
			if(array_key_exists('laikai', $_POST)) {$current = $_POST['diena'];}
			else{$current = $date;}
			
			echo "<div class=\"text-wrapper\">";
            echo "<div class=\"main-heading\">";
            echo "<h2 class=\"title mbr-section-title mbr-fonts-style display-5\"><strong>$current Dienos grafikas</strong></h2>";
            echo "</div></div>";
				
			echo "<div align=\"left\"><a href=\"index.php\"><b>Grįžti atgal</b></a></div>";
			echo "<div><form method='post'></div>";
			echo "<div><input min = ".$date." type=\"date\" id=\"diena\" name=\"diena\" ></div>";
			echo "<div><input name=\"laikai\" class=\"btn btn-primary display-4\"  type=\"submit\"  id=\"laikai\" value=\"Dienos grafikas\"><div>";
			echo "</form>";
				
			$sql =  "SELECT * FROM $lentele WHERE meistro_id = '$userid' AND (busena = 'PATVIRTINTA' OR busena = 'UŽDARYTA') 
																			 AND darbolaikas BETWEEN '$current' AND '$current 23:59:59' ORDER BY darbolaikas";
			$result = mysqli_query($conn, $sql);
	
			echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
	
			echo "<tr><td>Nuo</td>";
			echo "<td>Registracijos laikas</td>";
			echo "<td>Kaina</td>";
			echo "<td>Busena</td>";
			echo "<td>Darbo laikas</td>";
			echo "<td>paslauga</td>";
			echo "<td>pažymėti</td>";
			echo "</tr>";
	
			while($row = $result->fetch_assoc()) {
				
				if(($row['busena'] == "PATVIRTINTA") or ($row['busena'] == "UŽDARYTA")){
					$vartotojo_id = $row['vartotojo_id'];
					$result0 =  "SELECT username FROM $lentele2 WHERE userid = '$vartotojo_id'";
					$temp0 = mysqli_query($conn, $result0);
					$row0 = $temp0->fetch_assoc();
					$vartotojas = $row0['username']; 
	
					if($row['busena'] == "UŽDARYTA"){
						echo "<tr><td></td>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td>Laisvas laikas</td>";
						
					}else{
						echo "<tr><td>".$vartotojas."</td>";
						echo "<td>".$row['registracijoslaikas']."</td>";
						echo "<td>".$row['kaina']."</td>";
						echo "<td>Susitikimas su klientu</td>";
					}
					echo "<td>".$row['darbolaikas']."</td>";
					echo "<td>".$row['paslaugos']."</td>";
	
					if($row['busena'] == "UŽDARYTA"){
						echo "<td></td>";
					}
					else{
						echo "<td><input  type=\"checkbox\" name=\"checkbox[".$row['id']."]\" ></td>";
					}
					echo "</tr>";
				}
			}
			echo "</table>";	
?>
			
			<div>
			<input name="cancel" class="btn btn-primary display-4"  type="submit" id="cancel" value="Atšaukti">&nbsp;&nbsp;
			<input name="finish" class="btn btn-primary display-4"  type="submit" id="finish" value="Baigta">&nbsp;&nbsp;
		</div>
				</form>
				</div>
				</div>
				</div>
			</section>
<br>
		<!--<h2>Uždaryti valandas</h2>-->
		<section class="gallery1 cid-ssKyy6HHzz" id="gallery1-t">
    <div class="container">
	<form method='post'>
	<?php
		echo "<div class=\"mbr-section-head\">";
    echo "<h4 class=\"mbr-section-title mbr-fonts-style align-center mb-0 display-2\"><strong>Uždaryti valandas</strong></h4></div><br>";

	echo "<div>";
	$date = date("Y-m-d");
	echo "<input min = ".$date." type=\"date\" id=\"data\" name=\"data\" required>";
		?>
		<select name="Laikas">
			<option value="09:00">09.00-11:00</option>
			<option value="11:00">11.00-13:00</option>
			<option value="13:00">13:00-15:00</option>
			<option value="15:00">15:00-17:00</option>
		</select>
		<div>
			<input name="close" class="btn btn-primary display-4" type="submit" id="close" value="Uždaryti">
		</div>
	</form>
		</div></section>
</body>
</html>