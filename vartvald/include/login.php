<?php 
// login.php - tai prisijungimo forma, index.php puslapio dalis 
// formos reikšmes tikrins proclogin.php. Esant klaidų pakartotinai rodant formą rodomos klaidos
// formos laukų reikšmės ir klaidų pranešimai grįžta per sesijos kintamuosius
// taip pat iš čia išeina priminti slaptažodžio.
// perėjimas į registraciją rodomas jei nustatyta $uregister kad galima pačiam registruotis

if (!isset($_SESSION)) { header("Location: logout.php");exit;}
$_SESSION['prev'] = "login";
include("include/nustatymai.php");
?>
<html>
	    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8">
        <title>Prisijungimas</title>
    
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

	<section class="contact2 cid-ssKyCsOcpF" id="contact2-10">
		<div class="row content-wrapper justify-content-center"> 
			<div class="col-lg-7 offset-lg-1 col-12" data-form-type="formoid">
				<form action="proclogin.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">
					
        			<div class="col-lg-12 col-md-12 col-sm-12 form-heading">
                    	<h2 class="title mbr-section-title display-5"><strong>Prisijungimas<a href="index.html" class="text-primary"></a></strong></h2>
                    </div>
					
					<div align="left" class="col-lg-6 col-md-12 col-sm-12 form-group" data-for="name">
						<label for="name-contact2-10" class="form-control-label mbr-fonts-style display-4">Vartotojo vardas:</label>
                        <input type="text" name="user" placeholder="vardas" data-form-field="name" required="required" class="form-control display-7" value="<?php echo $_SESSION['name_login'];?>" id="name-contact2-10">
						<?php echo $_SESSION['name_error']; ?>
                    </div>
					
					<div align="left" class="col-lg-6 col-md-12 col-sm-12 form-group" data-for="name">
						<label for="name-contact2-10" class="form-control-label mbr-fonts-style display-4">Slaptažodis</label>
                        <input type="password" name="pass" placeholder="slaptažodis" data-form-field="name" required="required" class="form-control display-7" value="<?php echo $_SESSION['pass_login']; ?>" id="name-contact2-10">
						<?php echo $_SESSION['pass_error']; ?>
                    </div> 
					
					
					<input type="submit" name="login" class="btn btn-primary display-4" value="Prisijungti"/>&nbsp;&nbsp;   
            		<input type="submit" name="problem" class="btn btn-primary display-4" value="Pamiršote slaptažodį?"/> &nbsp;&nbsp;  
        			
					
        			<div class="col-auto" style="">
 						<?php
						if ($uregister != "admin") { echo "<a href=\"register.php\">Registracija</a>";}
						echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"guest.php\">Svečias</a>";
						?>
        			</div>
					
    				</form>
				</div>
			</div>
	</section>
		
		</body>
<html>

