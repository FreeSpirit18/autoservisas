<?php
// register.php registracijos forma
// jei pats registruojasi rolė = DEFAULT_LEVEL, jei registruoja ADMIN_LEVEL vartotojas, rolę parenka
// Kaip atsiranda vartotojas: nustatymuose $uregister=
//                                         self - pats registruojasi, admin - tik ADMIN_LEVEL, both - abu atvejai galimi
// formos laukus tikrins procregister.php

session_start();
if (empty($_SESSION['prev'])) { header("Location: logout.php");exit;} // registracija galima kai nera userio arba adminas
// kitaip kai sesija expirinasi blogai, laikykim, kad prev vistik visada nustatoma
include("include/nustatymai.php");
include("include/functions.php");
if ($_SESSION['prev'] != "procregister")  inisession("part");  // pradinis bandymas registruoti

$_SESSION['prev']="register";
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
                                    <form action="procregister.php" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name">              
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-heading">
                    	                    <h2 class="title mbr-section-title display-5"><strong>Registracija<a href="index.html" class="text-primary"></a></strong></h2>
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
                                        
                                        <div align="left" class="col-lg-6 col-md-12 col-sm-12 form-group" data-for="name">
                                            <input type="radio" id="vartotojas" name="lygis" required="required" value="vartotojas" >
                                            <label for="vartotojas">Vartotojas</label>
                                        </div>
                                        
                                        <div align="left" class="col-lg-6 col-md-12 col-sm-12 form-group" data-for="name">
                                            <input type="radio" id="meistras" name="lygis" required="required" value="meistras" >
                                            <label for="meistras">Meistras</label>
                                        </div>
									<?php
										 if ($_SESSION['ulevel'] == $user_roles[ADMIN_LEVEL] )
										{echo "<p style=\"color:white;\" style=\"text-align:left;\">Rolė<br>";
										 echo "<select style=\"color:white;\" name=\"role\">";
   									   	 foreach($user_roles as $x=>$x_value)
  											{echo "<option style=\"color:white;\"";
        	 									if ($x == DEFAULT_LEVEL) echo "selected ";
             									echo "value=\"".$x_value."\" ";
         	 									echo ">".$x."</option></p>";
											}
										}
									?>
                                    <input type="submit" class="btn btn-primary display-4" value="Registruoti">&nbsp;&nbsp; 
                                    
                                    </form>
                        </div>
                </div>
            </section>
        </body>
            </section>
    </html>
   
