<?php 
// useredit.php 
// vartotojas gali pasikeisti slaptažodį ar email
// formos reikšmes tikrins procuseredit.php. Esant klaidų pakartotinai rodant formą rodomos ir klaidos

session_start();
// sesijos kontrole
if (!isset($_SESSION['prev']) || (($_SESSION['prev'] != "index") && ($_SESSION['prev'] != "procuseredit")  && ($_SESSION['prev'] != "useredit")))
{header("Location: logout.php");exit;
}
if ($_SESSION['prev'] == "index")								  
	{$_SESSION['mail_login'] = $_SESSION['umail'];
	$_SESSION['passn_error'] = "";      // papildomi kintamieji naujam password įsiminti
	$_SESSION['passn_login'] = ""; }  //visos kitos turetų būti tuščios
$_SESSION['prev'] = "useredit"; 
?>

 <html>
	 <section class="contact2 cid-ssKyCsOcpF" id="contact2-10">
        <head>  
            <meta http-equiv="X-UA-Compatible" content="IE=9; text/html; charset=utf-8"> 
            <title>Registracija</title>
            
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
			
			
            <section align="center" class="contact2 cid-ssKyCsOcpF" id="contact2-10">
		<div class="row content-wrapper justify-content-center"> 
			<div align="center" class="col-lg-7 offset-lg-1 col-12" data-form-type="formoid">
                <div align="left" >
					<a style="color:white;" href="index.php">[Atgal į Pradžia]</a>
                </div>   
				
				<font size="4" color="#ff0000"><?php echo $_SESSION['message']; ?><br></font>  
					
				<form action="procregister.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">      
					
					<div class="col-lg-12 col-md-12 col-sm-12 form-heading">
                    	<h2 class="title mbr-section-title display-5"><strong>Paskyros redagavimas<a href="index.html" class="text-primary"></a></strong></h2>
                    </div>
					
					<div class="col-lg-12 col-md-12 col-sm-12 form-heading">
                    	<h3 class="title mbr-section-title display-5"><strong>Vartotojas: <?php echo $_SESSION['user'];  ?><a href="index.html" class="text-primary"></a></strong></h3>
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
                                        
                     <div align="left" class="col-lg-6 col-md-12 col-sm-12 form-group" data-for="name">
						 <label for="name-contact2-10" class="form-control-label mbr-fonts-style display-4">E-paštas:</label>
                         <input type="email" name="email" placeholder="email" data-form-field="name" required="required" class="form-control display-7" value="<?php echo $_SESSION['mail_login']; ?>" id="name-contact2-10">
						 <?php echo $_SESSION['mail_error']; ?>
                     </div>
			
        			
            		<input type="submit" class="btn btn-primary display-4" name="login" value="Atnaujinti"/>     
        			
					
        		</form>
  			</div>
			</div>
				 </section>
 			</body>
		 </section>
</html>
	


