<?php
session_start();
$meistras=$_SESSION['user'];
$userid=$_SESSION['userid'];

$server="localhost";
$user="stud";
$password="stud";
$dbname="vartvald";
$lentele="paslaugos";
$lentele2="Teikia";


$conn = mysqli_connect($server, $user, $password, $dbname);
if(!$conn){ 
	die ("Negaliu prisijungti prie MySQL:".mysqli_error($conn)); 
}
mysqli_set_charset($conn,"utf8");// dėl lietuviškų raidžių

// parodyti

	if(array_key_exists('ok', $_POST)) {
 
	if($_POST !=null){
		
		$paslaugos = $_POST['checkboxInsert'];
		
		foreach ($paslaugos as $id => $val) {
			
			$takenSQL = "SELECT id FROM $lentele2 WHERE meistro_id = '$userid' AND paslaugos_id = '$id'";
			$taken = mysqli_query($conn, $takenSQL);
	
			if($taken->num_rows == 0){
				$sql1 = "INSERT INTO $lentele2 (meistro_id, paslaugos_id) VALUES ('$userid', '$id')";
				if (!mysqli_query($conn, $sql1)) die ("Klaida įrašant:" .mysqli_error($conn));
				echo "Įrašyta";
			}
			else{
			echo "Jau turite šią paslaugą";
			}
		}
		mysqli_close($conn);
		header('Location: addpaslauga.php');
		exit();
	}
}
if(array_key_exists('delete', $_POST)) {
	
	$delete = $_POST['checkbox'];
	
	foreach ($delete as $id => $val) {
		//echo $id;
    $sql = "DELETE FROM $lentele2 WHERE id=$id";
	if (!mysqli_query($conn, $sql)) die ("Klaida ištrinant:" .mysqli_error($dbc));
	}
	echo "Ištrinta";
	mysqli_close($conn);
	header('Location: addpaslauga.php');
	exit();
}
	
//echo "<a href=\"ivedimas.php\">Dar kartą</a>";
?>
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
				<div class="text-wrapper">
                    <div class="main-heading">
                        <h2 class="title mbr-section-title mbr-fonts-style display-5"><strong>Jūsų teikiamos paslaugos</strong></h2>
                    </div>
                </div>
				<div align="left">
			<a href="index.php">Grįžti atgal</a>
				</div>	
<form method="post" class="mbr-form form-with-styler" data-form-title="Form Name">
	<?php
	$sql =  "SELECT * FROM $lentele2 WHERE meistro_id = '$userid'";
	$result = mysqli_query($conn, $sql);
	
	echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
	
	echo "<tr><td>Aprašas</td>";
	echo "<td>Kaina</td>";
	echo "<td>Pasirinkti</td>";
	
	while($row = $result->fetch_assoc()) {
		$connection_id = $row['id'];
		$task_id = $row['paslaugos_id'];
		$get =  "SELECT * FROM $lentele WHERE id = '$task_id'";
		$result2 = mysqli_query($conn, $get);
		
		if($taskRow = $result2->fetch_assoc()){
			echo "<tr><td>".$taskRow['paslauga']."</td>";
			echo "<td>".$taskRow['kaina']."</td>";
			echo "<td><input  type=\"checkbox\" name=\"checkbox[".$connection_id."]\" ></td>";
			echo "</tr>";
		}
	}
	echo "</table>";	
//echo "<a href=\"ivedimas.php\">Dar kartą</a>";
?>
	<div class="form-group col-lg-2"><br>
		<input name="delete" type="submit" class="btn btn-primary display-4"  id="delete" value="Naikinti paslaugas">
	</div>
	</form>
				</div>
				</div>
				</div>
			</section>
	<br>
	
	<section class="gallery1 cid-ssKyy6HHzz" id="gallery1-t">
    <div class="container">
	<form method="post" class="mbr-form form-with-styler" data-form-title="Form Name">
		<?php
 
		echo "<div class=\"mbr-section-head\">";
    echo "<h4 class=\"mbr-section-title mbr-fonts-style align-center mb-0 display-2\"><strong>Visos paslaugos</strong></h4></div><br>";

	echo "<div>";
		$sql =  "SELECT * FROM $lentele";
		$result = mysqli_query($conn, $sql);
	
		echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
		echo "<tr><td>Aprašas</td>";
		echo "<td>Kaina</td>";
		echo "<td>Pasirinkti</td>";
	
		while($row = $result->fetch_assoc()) {
  	   	 	echo "<tr><td>".$row['paslauga']."</td>";
			echo "<td>".$row['kaina']."</td>";
			echo "<td><input  type=\"checkbox\" name=\"checkboxInsert[".$row['id']."]\" ></td>";
			echo "</tr>";
		}
		echo "</table>";
?>
	<div class="form-group col-lg-2">
			<input type='submit' name='ok' class="btn btn-primary display-4" value='siųsti' class="btnbtn-default">
		</div>
	</form>
		</div></section>
</body>
</html>