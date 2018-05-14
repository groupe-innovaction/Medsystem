<?php
session_start();
require("authsuperadmin.php");
if(Authsuperadmin::isLogged()){

}else{
  header('Location:medsystemloginpage.php');
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
	<meta charset="utf-08">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>MEDSYSTEM | RENDEZ-VOUS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
          });
    </script>
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <link href="css/stylemenu.css" rel="stylesheet" />  
    <script src="./assets/js/dashboard.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>  
  </head>
  <body class="bodycouleur">
    <div class="page">
      <div class="page-main">
        <div class="header">
          <div class="container">
            <div class="d-flex">
              <a class="navbar-brand" href="./index.html">
                <img src="images/LOGO2.png" style="width:150px; height:23px;" class="navbar-brand-img" alt="tabler.io">
              </a>
              <div class="ml-auto d-flex order-lg-2">
                <div class="dropdown d-none d-md-flex">
						<script>
						function date_heure(id)
						{
								date = new Date;
								h = date.getHours();
								if(h<10)
								{
										h = "0"+h;
								}
								m = date.getMinutes();
								if(m<10)
								{
										m = "0"+m;
								}
								s = date.getSeconds();
								if(s<10)
								{
										s = "0"+s;
								}
								resultathres = ''+h+':'+m+':'+s;
								document.getElementById(id).innerHTML = resultathres;
								setTimeout('date_heure("'+id+'");','1000');
								return true;
						}
						</script>
						 <span id="date_heure"></span>
                         <script type="text/javascript">window.onload = date_heure('date_heure');</script>
                </div>
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0" data-toggle="dropdown">
                    <span class="avatar"> <img src="photo/<?php echo $_SESSION['var1'] ?>"/> </span>
                    <span class="ml-2 d-none d-lg-block">

                      <span class="text-default"><?php echo $_SESSION['var2'] ?>  </span>
                      <small class="text-muted d-block mt-1"> <?php echo $_SESSION['var3'] ?> </small>

                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="medsystemlogoutpage.php">Deconnecter</a>
                  </div>
                </div>
              </div>
            </div>
          </div>		  
        </div>
		<div class="backmenu">
		   <div class="container">
		      <div id='cssmenu'>
		         <ul>
				   <li><a href=''> <i class="fe fe-users"> </i> Utilisateurs</a>
					  <ul>
						 <li><a href='superadminajouterutilisateurs.php'>Ajouter Utilisateur</a></li>
						 <li><a href=''>Lister Utilisateurs</a></li>
					  </ul> 
				   </li>
				   <li><a href=''> <i class="fe fe-folder"> </i> Dossiers</a>
					  <ul>
						 <li><a href='supadmcreationdossiers.php'>Creer Dossier</a></li>
						 <li><a href='supadmrechercherdossier.php'>Rechercher Dossier</a></li>
					  </ul>
				   </li>
				   <li><a href='#'> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href=''>Prendre Rendez-vous</a></li>
						 <li><a href='supadmlisterrendezvous.php'>Lister Rendez-vous</a></li>
					  </ul>  
				   </li>
				   <li><a href=''> <i class="fe fe-layers"> </i> Pages Web</a>
					  <ul>
						 <li><a href=''>Ajouter Contenu</a></li>
						 <li><a href=''>Modifier Contenu</a></li>
					  </ul>    
				   </li>
		       </ul>
		     </div>
		  </div>
       </div>
	   
      <div class="page-contentrdv">
	    <div class="container">
		    <br>
            <div class="positionadm">
              <p> <a href="superadminpage.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i>  Demande De Rendez-vous </p>
            </div>			
			<?php
			include("Traitement/superadminrendezvoustraitement.php");
			?>
			 <span class="messageerreurrdv"> 
			    <p><?php if(isset($rdvincorrect)){echo $rdvincorrect;}?> </p>
			 </span>
			 <span class="messageerreurrdv2">
			   <p> <?php if(isset($rdvcorrect)){echo $rdvcorrect;}?> </p>
			    <?php if(isset($rdvechoue)){echo $rdvechoue;}?>
			 </span>
			 
	     <div class="col-md-12">
		  <div class="row">
		   <div class="mainrdv">
		     <p>Demande De Rendez-vous</p>      
              <form class="card" method="POST" action="">
                <div class="card-body">
                  <div class="row">
                     <div class="col-sm-12 col-md-12"> 
                     <div class="messrdv">                 
<span>Ce formulaire vous permet de demander un rendez-vous en ligne, Nous vous contacterons ensuite par Telephone ou Email dans les meilleurs delais afin de fixer definitement avec vous la date et l'heure du rendez-vous...Merci!!!</span>
<br>
                      </div>
                    </div> 

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom <span class="obligatoire">*</span></label>
                        <input type="text" name="nomrdv" class="form-control" placeholder="Enter Nom" value="<?php if(isset($nomrdv)){echo $nomrdv;} ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">prenom <span class="obligatoire">*</span></label>
                        <input type="text" name="prenomrdv" class="form-control" placeholder="Entrer Prenom" value="<?php if(isset($prenomrdv)){echo $prenomrdv;} ?>">
                      </div>
                    </div>	
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Numero Telephone <span class="obligatoire">*</span></label>
                        <input type="tel" name="telephonerdv" class="form-control" placeholder="Entrer Numero Telephone" value="<?php if(isset($telephonerdv)){echo $telephonerdv;} ?>">
                            <span class="messageerreur"></span>
                      </div>
                    </div>					
                    <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Date De Naissance <span class="obligatoire">*</span></label>
                           <input type="date" class="form-control" name="daternaissancerdv" placeholder="Date De Naissance" value="<?php if(isset($daternaissancerdv)){echo $daternaissancerdv;} ?>">  
                    </div>
                    </div> 
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Indiquer la specialite dans laquelle vouz souhaitez consulter <span class="obligatoire">*</span></label>
                        <select name="Departementrdv" class="form-control">
						              <option value=""></option>
                          <option value="Ophtalmologie">Ophtalmologie</option>
                          <option value="Gynecologique">Gynecologique</option>
						  <option value="Pediatrie">Pediatrie</option>
                        </select>                      
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email <span class="obligatoire">*</span></label>
                        <input type="email" name="mailrdv" class="form-control" placeholder="Entrer Email" value="<?php if(isset($mailrdv)){echo $mailrdv;} ?>">                     
 					   <span class="messageerreur">
					   <?php if(isset($emailrdvincorrect)){echo $emailrdvincorrect;} ?>
					   </span>	                    
					 </div>			  
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Sexe <span class="obligatoire">*</span></label>
                        <select name="sexerdv" class="form-control">
						  <option value="<?php if(isset($sexerdv)){echo $sexerdv;} ?>"><?php if(isset($sexerdv)){echo $sexerdv;} ?></option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>                      
                      </div>
                    </div>		
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Site <span class="obligatoire">*</span></label>
                        <select name="siterdv" class="form-control">
						              <option value=""></option>
                          <option value="Ouest">Ouest</option>
                          <option value="Artibonite">Artibonite</option>
						  <option value="Centre">Centre</option>
                        </select>                      
                      </div>
                    </div>						
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Motif De la Consulatation / Symptomes <span class="obligatoire">*</span></label>                  
                         <textarea name="Symptomesrdv" class="form-control" placeholder="Soyez Bref..." rows="6" cols="47"value="<?php if(isset($Symptomesrdv)){echo $Symptomesrdv;} ?>"></textarea>
					  </div>
                    </div>  
                    <div class="col-sm-12 col-md-12">
                        <label class="form-label">Utilisation de vos données personnelles</label>                  
                         <span>Les données personnelles recueillies dans le cadre de ce formulaire font l'objet d'un traitement informatique et sont destinées aux services du Centre Hospitalier MEDHAITI en charge de traiter votre demande. Elles ne sont en aucun cas réutilisées à d'autres fins.
                            Vous disposez d’un droit d’accès et de rectification conformément à la loi informatique et libertés.</span>
                    </div> 					
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" name="submitrdv" class="btn btn-primary"> <i class="fe fe-check-circle"> </i> Valider La Demande</button> 
                </div>
           </form>			 
		   </div>
		  </div>
		 </div>
		</div> 
      </div>


    </div>
	
  </body>
</html>
