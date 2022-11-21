		<?php
session_start(); 
$current=$_SESSION['user'];
$userid=$_SESSION['userid'];
$userlevel=$_SESSION['ulevel'];
if($_GET !=null){
	if(array_key_exists('meistras', $_GET)){
	$meistras = $_GET['varname'];
	$_SESSION['dabartinisMeistras']	= $meistras;
	}
}
else{
$meistras = $_SESSION['dabartinisMeistras'];
}



$server="localhost";
$user="stud";
$password="stud";
$dbname="vartvald";
$lentele="paslaugos";
$lentele2="registracijos";
$lentele3="users";
$lentele4="Teikia";
$lentele5="vertinimai";


$conn = mysqli_connect($server, $user, $password, $dbname);
if(!$conn){ 
	die ("Negaliu prisijungti prie MySQL:".mysqli_error($conn)); 
}
mysqli_set_charset($conn,"utf8");// dėl lietuviškų raidžių
// parodyti

$result0 =  "SELECT userid FROM $lentele3 WHERE username = '$meistras'";
$temp0 = mysqli_query($conn, $result0);
$row0 = $temp0->fetch_assoc();
$meistro_id = $row0['userid'];

$date = date("Y-m-d");

if(array_key_exists('registruotis', $_POST)) {
	
	$paslaugos = $_POST['radio'];
	/*$data = $_POST['data'];
	$time = $_POST['Laikas'];
	$combinedDT = date('Y-m-d H:i:s', strtotime("$data $time"));*/
	$combinedDT = $_POST['vieta'];
	
	$result =  "SELECT paslauga,kaina FROM $lentele WHERE id = '$paslaugos'";
	$temp = mysqli_query($conn, $result);
	$row = $temp->fetch_assoc();
	$paslauga = $row['paslauga']; 
	$kaina = $row['kaina']; 
	
	$takenSQL = "SELECT id FROM $lentele2 WHERE meistro_id = '$meistro_id' AND darbolaikas = '$combinedDT' AND (busena = 'PATVIRTINTA' OR 'UŽDARYTA' OR 'BAIGTA')";
	$taken = mysqli_query($conn, $takenSQL);
	
	if($taken->num_rows == 0){
		$sql1 = "INSERT INTO $lentele2 (vartotojo_id, meistro_id, registracijoslaikas, kaina, busena, darbolaikas, paslaugos ) VALUES ('$userid', '$meistro_id', NOW() , '$kaina', 'PATVIRTINTA', '$combinedDT', '$paslauga')";
	
		if (!mysqli_query($conn, $sql1)) die ("Klaida rezervuojant:" .mysqli_error($conn));
		echo "Įrašyta";
		echo "Priregistruota";
		mysqli_close($conn);
		header('Location: meistras.php');
		exit();
		echo "Įrašyta";
		echo "Priregistruota";
	}
	else{
		echo "Laikas užimtas";
	}
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
<title><?php echo $meistras ?> puslapis</title>
</head>
<body>
	<div class="text-wrapper">
                    <div class="main-heading">
                        <h2 class="title mbr-section-title mbr-fonts-style display-5"><strong>Meistras: <?php echo $meistras ?></strong></h2>
                    </div>
                </div>
	<section class="features3 cid-ssKysQzxEQ" id="features3-g">
			<div class="container">
				<div class="row justify-content-center">            
            <div class="col-12 col-lg"> 
				<div class="text-wrapper">
                    <div class="main-heading">
                        <h2 class="title mbr-section-title mbr-fonts-style display-5"><strong>Registracijos forma</strong></h2>
                    </div>
                </div>
				<div align="left">
			<a href="skaitau.php">Grįžti sąrašą</a>
				</div>
				<form method='post' class="mbr-form form-with-styler" data-form-title="Form Name">
			<?php echo "<div align=\"left\"><input min = ".$date." type=\"date\" id=\"diena\" name=\"diena\" required></div><br>";?>
	<input name="laikai" type="submit" class="btn btn-primary display-4" id="laikai" value="Rodyti dieną">
		
		</form>
	<form method='post'  class="mbr-form form-with-styler" data-form-title="Form Name">
		<!--<div align="left">
	<?php
	//echo "<input min = ".$date." type=\"date\" id=\"data\" name=\"data\" required>";
		?>
		<select name="Laikas">
			<option value="09:00">09.00-11:00</option>
			<option value="11:00">11.00-13:00</option>
			<option value="13:00">13:00-15:00</option>
			<option value="15:00">15:00-17:00</option>
		</select>
</div>--><br>
		<?php	
		
		$sql =  "SELECT * FROM $lentele4 WHERE meistro_id = '$meistro_id'";
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
			echo "<td><input type=\"radio\" name=\"radio\" value=\"".$taskRow['id']."\" required /></td>";
			echo "</tr>";
		}
	}
	echo "</table>";	
?>
			<?php 		
		if(array_key_exists('laikai', $_POST)) 
		{
			$current = $_POST['diena'];
		}
		else
		{
			$current = $date;
		}
		//$combinedDT = date('Y-m-d H:i:s', strtotime("$current $time"));
	echo "<div class=\"mbr-section-head\">";
    echo "<br><h4 class=\"mbr-section-title mbr-fonts-style align-center mb-0 display-2\"><strong>$current Dienos laisvi laikai</strong></h4></div><br>";

	//echo "<div align=\"left\"><input min = ".$date." type=\"date\" id=\"diena\" name=\"diena\" required></div><br>";
		$sql =  "SELECT * FROM $lentele2 WHERE meistro_id = '$meistro_id' AND 
									darbolaikas BETWEEN '$current' AND '$current 23:59:59' ORDER BY darbolaikas";
	
		$result = mysqli_query($conn, $sql);
		
		$mark9 = 0;
		$mark11 = 0;
		$mark13 = 0;
		$mark15 = 0;
		
		echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
		echo "<tr><td>Laisvi laikai</td>";
		echo "<td>Pasirinkite</td>";
		echo "</tr>";
	
	while($row = $result->fetch_assoc()) {
	if(($row['busena'] == "PATVIRTINTA") or ($row['busena'] == "UŽDARYTA")){
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 09:00"))){$mark9 = 1;}
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 11:00"))){$mark11 = 1;}
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 13:00"))){$mark13 = 1;}
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 15:00"))){$mark15 = 1;}
		/*echo "<tr><td>".$row['darbolaikas']."</td>";
		echo "</tr>";*/
				}
	}
		if($mark9 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 09:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 09:00"))."\" required /></td>";
			echo "</tr>";
		}
		if($mark11 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 11:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 11:00"))."\" required /></td>";
			echo "</tr>";
		}
		if($mark13 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 13:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 13:00"))."\" required /></td>";
			echo "</tr>";
		}
		if($mark15 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 15:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 15:00"))."\" required /></td>";
			echo "</tr>";
		}
	echo "</table>";	
?>
		<input name="registruotis" type="submit" class="btn btn-primary display-4"  id="registruotis" value="registruotis">
	
		</form>
	</div>
				</div>
				</div>
			</section>
<section class="gallery1 cid-ssKyy6HHzz" id="gallery1-t">
    <div class="container">
		<?php 		/*
		if(array_key_exists('laikai', $_POST)) 
		{
			$current = $_POST['diena'];
		}
		else
		{
			$current = $date;
		}
		//$combinedDT = date('Y-m-d H:i:s', strtotime("$current $time"));
	echo "<div class=\"mbr-section-head\">";
    echo "<h4 class=\"mbr-section-title mbr-fonts-style align-center mb-0 display-2\"><strong>$current Dienos užimti laikai</strong></h4></div>";

	//echo "<div align=\"left\"><input min = ".$date." type=\"date\" id=\"diena\" name=\"diena\" required></div><br>";
		$sql =  "SELECT * FROM $lentele2 WHERE meistro_id = '$meistro_id' AND 
									darbolaikas BETWEEN '$current' AND '$current 23:59:59' ORDER BY darbolaikas";
	
		$result = mysqli_query($conn, $sql);
		
		$mark9 = 0;
		$mark11 = 0;
		$mark13 = 0;
		$mark15 = 0;
		
		echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
		echo "<tr><td>Užimtas laikas</td>";
		echo "<td>Pasirinkite</td>";
		echo "</tr>";
	
	while($row = $result->fetch_assoc()) {
	if(($row['busena'] == "PATVIRTINTA") or ($row['busena'] == "UŽDARYTA")){
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 09:00"))){$mark9 = 1;}
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 11:00"))){$mark11 = 1;}
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 13:00"))){$mark13 = 1;}
		if($row['darbolaikas'] == date('Y-m-d H:i:s', strtotime("$current 15:00"))){$mark15 = 1;}
		
				}
	}
		if($mark9 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 09:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 09:00"))."\" required /></td>";
			echo "</tr>";
		}
		if($mark11 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 11:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 11:00"))."\" required /></td>";
			echo "</tr>";
		}
		if($mark13 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 13:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 13:00"))."\" required /></td>";
			echo "</tr>";
		}
		if($mark15 != 1){
			echo "<tr><td>".date('Y-m-d H:i:s', strtotime("$current 15:00"))."</td>";
			echo "<td><input type=\"radio\" name=\"vieta\" value=\"".date('Y-m-d H:i:s', strtotime("$current 15:00"))."\" required /></td>";
			echo "</tr>";
		}
	echo "</table>";	*/
?>
		<!--<form method='post' class="mbr-form form-with-styler" data-form-title="Form Name">
			<?php //echo "<div align=\"left\"><input min = ".$date." type=\"date\" id=\"diena\" name=\"diena\" required></div><br>";?>
	<input name="laikai" type="submit" class="btn btn-primary display-4" id="laikai" value="Rodyti dieną">
		
		</form>-->
		</div>
		</section>
	<section class="features1 cid-ssKyskJGgO mbr-fullscreen" id="features1-e">
		<div class="container">
			<div class="row">
				<div class="text-wrapper">
                    <div class="main-heading">
                        <h2 class="title mbr-section-title mbr-fonts-style display-5"><strong>Meistro vertinimai:</strong></h2>
                    </div>
                </div>
				<?php
				$sql =  "SELECT * FROM $lentele5 WHERE meistro_id = '$meistro_id'";
				$result = mysqli_query($conn, $sql);
				
				echo "<table style=\"margin: 0px auto;\" id=\"paslauga\">";
				echo "<tr><td>Autorius</td>";
				echo "<td>Vertinimas</td>";
				echo "<td>Komentaras</td>";
	
				while($row = $result->fetch_assoc()) {
					
					$vertinimas = $row['vertinimas'];
					$komentaras = $row['komentaras'];
					$vartotojo_id = $row['vartotojo_id'];
					
					$get =  "SELECT * FROM $lentele3 WHERE userid = '$vartotojo_id'";
					$temp2 = mysqli_query($conn, $get);
					$row2 = $temp2->fetch_assoc();
					$vartotojas = $row2['username'];
		
					
					echo "<tr><td>$vartotojas</td>";
					echo "<td>$vertinimas</td>";
					echo "<td>$komentaras</td>";
					echo "</tr>";
						
	}
	echo "</table>";
				?>
				</div>
			</div>
		</section>
</body>
</html>

