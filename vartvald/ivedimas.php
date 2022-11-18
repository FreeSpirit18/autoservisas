
<!DOCTYPE html>
<html>
<head>
<title>Prat</title>
	<meta http-equiv="Content-Type" content ="text/html; charset=UTF-8">
</head>
<body>

<form method='post' action='irasau.php'>
     <!-- Kam:<input name='gavejes' type='text'><br><br> -->
	<?php
	include("include/nustatymai.php");
	$db=mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$sql = "SELECT  username,userlevel,email "
            . "  FROM  " . TBL_USERS . " ORDER BY userlevel DESC,username";
 $result = mysqli_query($db, $sql);
 if (!$result || (mysqli_num_rows($result) < 1))  	
 {echo "Klaida skaitant lentelę users"; exit;}
	echo "<select name=\"gavejes\">";
while ($row = mysqli_fetch_assoc($result)) 
 {$user= $row['username'];
      echo "<option value=".$user.">".$user."</option>";
     }
echo "</select>";
	?>
     Žinutė: <textarea name='IIII'> </textarea><br><br>
    <input type='submit' name='ok' value='patvirtinti'>
</form>

</body>
</html>