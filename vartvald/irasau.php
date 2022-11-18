<?php
$server="localhost";
$user="stud";
$password="stud";
$dbname="stud";
$lentele="pratyboms";
session_start();
$conn = new mysqli($server, $user, $password, $dbname);
   if ($conn->connect_error) die("Negaliu prisijungti: " . $conn->connect_error);
mysqli_set_charset($conn,"utf8");// dėl lietuviškų raidžių

if($_POST !=null){
       //$LLLL = $_POST['siuntejas'];
		$LLLL =  $_SESSION['user']; 
       $MMMM =$_POST['gavejes'];
       $NNNN = htmlspecialchars($_POST['IIII']);

      $sql = "INSERT INTO $lentele (siuntejas, gavejes, zinute) 
             VALUES ('$LLLL', '$MMMM','$NNNN')";
      if (!$result = $conn->query($sql)) die("Negaliu įrašyti: " . $conn->error);
      //echo "Įrašyta";	
	{header("Location:skaitau.php");exit;}
}

$conn->close();
?>