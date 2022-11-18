		<?php
session_start(); 
$vartotojas=$_SESSION['user'];
$userid=$_SESSION['userid'];

$server="localhost";
$user="stud";
$password="stud";
$dbname="vartvald";
$lentele="registracijos";
$lentele2="vertinimai";
$lentele3="users";

//echo $meistras;
//echo $current;

$conn = mysqli_connect($server, $user, $password, $dbname);
if(!$conn){ 
	die ("Negaliu prisijungti prie MySQL:".mysqli_error($conn)); 
}
mysqli_set_charset($conn,"utf8");// dėl lietuviškų raidžių
// parodyti
if(array_key_exists('submit', $_POST)) 
{
	$vertinimas = $_POST['stars'];
	$komentaras = $_POST['komentaras'];
	
	$registracija = $_POST['radio'];
	$result =  "SELECT meistro_id FROM $lentele WHERE id = '$registracija'";
	
	$temp = mysqli_query($conn, $result);
	$row = $temp->fetch_assoc();
	$meistro_id = $row['meistro_id']; 
	
	
	//echo $vertinimas;
	//echo $komentaras;
	//echo $meistras;
	
    $sql = "INSERT INTO $lentele2 (vartotojo_id, meistro_id, vertinimas, komentaras) VALUES ('$userid', '$meistro_id', '$vertinimas' , '$komentaras')";
	if (!mysqli_query($conn, $sql)) die ("Klaida ištrinant:" .mysqli_error($conn));
	
	echo "Komentaras paliktas";
	mysqli_close($conn);
	header('Location: Vertinimas.php');
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
<title>Vertinimo puslapis</title>
</head>
<body>
	
	<section class="features3 cid-ssKysQzxEQ" id="features3-g">
			<div class="container">
				<div class="row justify-content-center">            
            <div class="col-12 col-lg"> 
				<div class="text-wrapper">
                    <div class="main-heading">
                        <h2 class="title mbr-section-title mbr-fonts-style display-5"><strong>Įvykę susitikimai:</strong></h2>
                    </div>
                </div>
				<div align="left">
			<a href="index.php">Grįžti atgal</a>
				</div>
<form method='post' class="mbr-form form-with-styler" data-form-title="Form Name">
		<?php
 
$sql =  "SELECT * FROM $lentele WHERE vartotojo_id = '$userid' AND busena = 'BAIGTA'";
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
	$result0 =  "SELECT username FROM $lentele3 WHERE userid = '$meistro_id'";
	$temp0 = mysqli_query($conn, $result0);
	$row0 = $temp0->fetch_assoc();
	$meistras = $row0['username']; 
	
    echo "<tr><td>".$meistras."</td>";
	echo "<td>".$row['registracijoslaikas']."</td>";
	echo "<td>".$row['kaina']."</td>";
	echo "<td>".$row['busena']."</td>";
	echo "<td>".$row['darbolaikas']."</td>";
	echo "<td>".$row['paslaugos']."</td>";
	echo "<td><input type=\"radio\" name=\"radio\" value=\"".$row['id']."\" /></td>";
	echo "</tr>";
}
echo "</table>";	
//echo "<a href=\"ivedimas.php\">Dar kartą</a>";
?><br>
 				<div class="dropdown" align="left">
 					<label for="stars">Vertinimas:</label>

					<select name="stars" id="stars">
  					<option value="1">1 žvaigždutės</option>
  					<option value="2">2 žvaigždutės</option>
  					<option value="3">3 žvaigždutės</option>
  					<option value="4">4 žvaigždutės</option>
					<option value="5">5 žvaigždutės</option>
					</select>
 				</div>
 				<div class="form-group col-lg-12" align="left">
 					<label for="komentaras" class="control-label">Komentaras:</label>
 					<textarea name='komentaras' class="form-control input-sm"></textarea>
 				</div>
 				<div class="form-group col-lg-2">
					<input type='submit' class="btn btn-primary display-4" name='submit' value='siųsti' class="btnbtn-default">
		    	</div>
	
	<br>
	
	</form>
	</div>
				</div>
				</div>
			</section>
	
	<section class="gallery1 cid-ssKyy6HHzz" id="gallery1-t">
    <div class="container">
		<?php
 echo "<div class=\"mbr-section-head\">";
    echo "<h4 class=\"mbr-section-title mbr-fonts-style align-center mb-0 display-2\"><strong>Jūsų parašyti vertinimai:</strong></h4></div><br>";

	echo "<div>";
$sql =  "SELECT * FROM $lentele2 WHERE vartotojo_id = '$userid'";
$result = mysqli_query($conn, $sql);
	
echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
	
	echo "<tr>";
	echo "<td>meistras</td>";
	echo "<td>vertinimas</td>";
	echo "<td>komentaras</td>";
	echo "</tr>";
	
while($row = $result->fetch_assoc()) {
	$meistro_id = $row['meistro_id'];
	$result0 =  "SELECT username FROM $lentele3 WHERE userid = '$meistro_id'";
	$temp0 = mysqli_query($conn, $result0);
	$row0 = $temp0->fetch_assoc();
	$meistras = $row0['username']; 
	
    echo "<tr><td>".$meistras."</td>";
	echo "<td>".$row['vertinimas']."</td>";
	echo "<td>".$row['komentaras']."</td>";
	echo "</tr>";
}
echo "</table>";	
		echo "</div>";
//echo "<a href=\"ivedimas.php\">Dar kartą</a>";
?>
		</div>
		</section>
</body>
</html>