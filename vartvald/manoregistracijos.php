		<?php
session_start(); 
$vartotojas=$_SESSION['user'];
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
	$cancel = $_POST['checkbox'];
	
	foreach ($cancel as $id => $val) {
		//echo $id;
    $sql = "UPDATE $lentele SET busena = 'ATŠAUKTA' WHERE id=$id";
	if (!mysqli_query($conn, $sql)) die ("Klaida ištrinant:" .mysqli_error($dbc));
	}
	echo "Atšaukta";
	mysqli_close($conn);
	header('Location: manoregistracijos.php');
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
	<style>
			#paslauga {font-family: Arial; border-collapse: collapse; width: 70%;}
			#paslauga td {border: 1px solid #ddd; padding: 8px;}
			#paslauga tr:nth-child(even){background-color: #f2f2f2;}
			#paslauga tr:hover {background-color: #ddd;}
			#paslauga th {background-color: yellow;}
		</style>
<title>Page Title</title>
</head>
	<body>
		<section class="features3 cid-ssKysQzxEQ" id="features3-g">
			<div class="container">
				<div class="row justify-content-center">            
            <div class="col-12 col-lg"> 
				
		<form method='post' class="mbr-form form-with-styler" data-form-title="Form Name">
	<?php
			if(array_key_exists('laikai', $_POST)) {
				$current = $_POST['diena'];
				}
			else{
				$current = $date;
				}
			echo "<h2 class=\"title mbr-section-title mbr-fonts-style display-5\"><strong>$current Dienos registracijos</strong></h1>";
			echo "<div align=\"left\"><a href=\"index.php\">Grįžti atgal</a></div>";
			
	$sql =  "SELECT * FROM $lentele WHERE vartotojo_id = '$userid' AND darbolaikas BETWEEN '$current' AND '$current 23:59:59' ORDER BY darbolaikas";
	$result = mysqli_query($conn, $sql);
	
	echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
	
	echo "<tr><td>Meistras</td>";
	echo "<td>Registracijos laikas</td>";
	echo "<td>Kaina</td>";
	echo "<td>Busena</td>";
	echo "<td>Darbo laikas</td>";
	echo "<td>paslauga</td>";
	echo "<td>pažymėti</td>";
	echo "</tr>";
	
while($row = $result->fetch_assoc()) {
	$meistro_id = $row['meistro_id'];
	$result0 =  "SELECT username FROM $lentele2 WHERE userid = '$meistro_id' ";
	$temp0 = mysqli_query($conn, $result0);
	$row0 = $temp0->fetch_assoc();
	$meistras = $row0['username']; 
	
    echo "<tr><td>".$meistras."</td>";
	echo "<td>".$row['registracijoslaikas']."</td>";
	echo "<td>".$row['kaina']."</td>";
	echo "<td>".$row['busena']."</td>";
	echo "<td>".$row['darbolaikas']."</td>";
	echo "<td>".$row['paslaugos']."</td>";
	if($row['busena'] == "ATŠAUKTA" || $row['busena'] == "BAIGTA"){
		echo "<td></td>";
	}
	else{
	echo "<td><input  type=\"checkbox\" name=\"checkbox[".$row['id']."]\"</td>";
	}
	echo "</tr>";
}
echo "</table>";	

?>
		<input name="cancel" class="btn btn-primary display-4" type="submit" id="cancel" value="Atšaukti">
		</form><br>
			<form method='post'>
			<div align="left"><input min = ".$date."  type="date" id="diena" name="diena" ></div><br>
			<div ><input name="laikai" class="btn btn-primary display-4" type="submit"  id="laikai" value="Dienos grafikas"></div><br>
			</form>
				</div>
				</div>
				</div>
			</section>
		<section class="header1 cid-ssKyp4h2vs mbr-fullscreen" id="header1-a">
		<div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(211,10,10)"></div>
		</section>
<br>
	
</body>
</html>