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
						 <li><a href='superadminvoirutilisateurs.php'>Lister Utilisateurs</a></li>
					  </ul> 
				   </li>
				   <li><a href=''> <i class="fe fe-folder"> </i> Dossiers</a>
					  <ul>
						 <li><a href='supadmcreationdossiers.php'>Creer Dossier</a></li>
						 <li><a href=''>Voir Dossier</a></li>
					  </ul>
				   </li>
				   <li><a href='#'> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href='supadmprendrerendezvous.php'>Prendre Rendez-vous</a></li>
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
              <p> <a href="superadminpage.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i> Confirmer | Annuler Demande </p>
            </div>	
			
           <?php
		   include("bd/connect.php");
          if(!isset($_GET['idRDV']))
          {
          header('location:superadminpage.php');
          }
          else{
          $mon_idRDV=intval($_GET['idRDV']);
          }
          $req=$conbd->query('SELECT * FROM rendezvous WHERE idRDV = "'.$mon_idRDV.'"');

          $don=$req->fetch(); 
            if(isset($don['idRDV'])){ ?>
	   <div class="row">		
		<div class="col-md-12">	
		 <div class="row">    
           <div class="col-md-4">
		     <?php include("Traitement/etatrendezvoustraitementmodifier.php"); ?>
			 <span class="messageerreurrdv"> 
			    <?php if(isset($rdvincorrect)){echo $rdvincorrect;}?> 
			 </span>
			<span class="messageerreurrdv2">
			    <?php if(isset($rdvcorrect)){ echo $rdvcorrect; } ?>
			</span>				 
              <form class="card" method="POST">
                <div class="card-header">
                  <h3 class="card-title">Information Sur la Demande</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label class="form-label">Nom <span class="obligatoire">*</span></label>
                    <input type="text" name="modifiernomRDV" class="form-control" value="<?php echo $don['nomrdv'];?>" />
                  </div>
                  <div class="form-group">
                    <label class="form-label">Prenom <span class="obligatoire">*</span></label>
                    <input type="text" name="modifierprenomRDV" class="form-control" value="<?php echo $don['prenomrdv'];?>"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Telephone <span class="obligatoire">*</span></label>
                    <input type="tel" name="modifiertelRDV" class="form-control" value="<?php echo $don['telephonerdv'];?>"/>
                  </div>
                  <div class="form-group">
                    <label class="form-label">Email <span class="obligatoire">*</span></label>
                    <input type="text" name="modifiermailRDV" class="form-control" value="<?php echo $don['mailrdv'];?>"/>
					   <span class="messageerreur">
					   <?php if(isset($emailrdvincorrect)){echo $emailrdvincorrect;} ?>
					   </span>					
                  </div>				  
                  <div class="form-group">
                     <label class="form-label">Departement <span class="obligatoire">*</span></label>
                       <select name="modifierDepartementRDV" class="form-control">
                        <option value="<?php echo $don['Departementrdv']; ?>"><?php echo $don['Departementrdv']; ?></option>
                        <option value="Ophtalmologie">Ophtalmologie</option>
                        <option value="Gynecologique">Gynecologique</option>
						<option value="Pediatrie">Pediatrie</option>
                       </select>                       
                  </div>
                  <div class="form-group">
                     <label class="form-label">Sexe <span class="obligatoire">*</span></label>
                       <select name="modifiersexeRDV" class="form-control">
                        <option value="<?php echo $don['sexerdv']; ?>"><?php echo $don['sexerdv']; ?></option>
                        <option value="Masculin">Masculin</option>
                        <option value="Feminin">Feminin</option>
                       </select>                       
                  </div>
                  <div class="form-group">
                        <label class="form-label">Site <span class="obligatoire">*</span></label>
                        <select name="modifiersiterdv" class="form-control">
                          <option value="<?php echo $don['siterdv']; ?>"><?php echo $don['siterdv']; ?></option>
                          <option value="Ouest">Ouest</option>
                          <option value="Artibonite">Artibonite</option>
                          <option value="Centre">Centre</option>
                        </select>                        
                   </div>
                  <div class="form-group">
                    <label class="form-label">Symptomes <span class="obligatoire">*</span></label>
                     <textarea name="modifiersymptomesRDV" class="form-control" rows="6" cols="47" ><?php echo $don['Symptomesrdv'];?></textarea>
                  </div>
				<div  id="validerrdv" class="card-footer text-center">
                  <button type="submit" name="modifierrdvsubmit" class="btn btn-primary"> <i class="fe fe-edit"> </i> Modifier</button> 
                </div>				  
                </div>
              </form>		   
		   </div> 			 
           <div class="col-md-8">
            <?php
			 include("Traitement/etatrendezvoustraitement.php");
			?>		
				   <span class="messageerreurrdv">
					 <?php if(isset($repconfirmation1)){ echo $repconfirmation1; } ?>
				   </span>			  
           <span class="messageerreurrdv">
           <?php if(isset($RjouterDabord)){ echo $RjouterDabord; } ?>
           </span>            
		    <form class="card" method="POST">
				 <div class="partievaliderrdv">
					<p>Valider La Demande</p>
				 </div>				
                   <br>
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
					  <label class="form-label">Date Du Rendez-vous <span class="obligatoire">*</span></label>
					  <input type="date" class="form-control" name="Confirmerdaterdv" value="<?php if(isset($Confirmerdaterdv)) echo $Confirmerdaterdv; ?>">  
					</div>
				</div> 
				<div class="col-sm-12 col-md-12">
					<div class="form-group">
					  <label class="form-label">Heure Du Rendez-vous <span class="obligatoire">*</span></label>
					  <input type="time" class="form-control" name="Confirmerheurerdv" value="<?php if(isset($Confirmerheurerdv)) echo $Confirmerheurerdv; ?>">  
					</div>
			   </div>	
				<div  id="validerrdv" class="card-footer text-center">
                  <button type="submit" name="valiersubmit" class="btn btn-primary"> <i class="fe fe-check-circle"> </i> Valider la Demande</button> 
                </div>			   
		    </form>	
            <?php include("Traitement/etatrendezvoustraitementAnnuler.php"); ?>
			  <span class="messageerreurrdv2">
				<?php if(isset($rdvAnnuler)){ echo $rdvAnnuler; } ?>
			  </span>			
			  <span class="messageerreurrdv">
				<?php if(isset($rdvEchec)){ echo $rdvEchec; } ?>
			  </span>
			  <span class="messageerreurrdv">
				<?php if(isset($repAnnuler)){ echo $repAnnuler; } ?>
			  </span>
			  <span class="messageerreurrdv">
				<?php if(isset($repDejaAnnuler)){ echo $repDejaAnnuler; } ?>
			  </span>			  
		    <form class="card" method="POST">
				 <div class="partieannulerrdv">
					<p>Annuler une Demande </p>
				 </div>				
                   
				   <div class="radiordv">
                     <div class="custom-controls-stacked">
                        <label class="custom-switch">
                          <input type="checkbox" name="radiordv1" value="Oui" class="custom-switch-input">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Oui Je Veux Annuler Ma Demande</span>
                        </label>						  
                     </div>
					 <br>
				   </div>		
						
				<div  id="Annulerrdv" class="card-footer text-center">
                  <button type="submit" name="annulersubmit" class="btn btn-primary"> <i class="fe fe-x-circle"> </i> Annuler la Demande</button> 
                </div>			   
		    </form>	

			
            <?php include("Traitement/etatrendezvoustraitementRajouter.php"); ?>
			  <span class="messageerreurrdv2">
				<?php if(isset($rdvRajouter)){ echo $rdvRajouter; } ?>
			  </span>			
			  <span class="messageerreurrdv">
				<?php if(isset($rdvRajouterEchec)){ echo $rdvRajouterEchec; } ?>
			  </span>
			  <span class="messageerreurrdv">
				<?php if(isset($repRajouter)){ echo $repRajouter; } ?>
			  </span>
			  <span class="messageerreurrdv">
				<?php if(isset($repDejaRajouter)){ echo $repDejaRajouter; } ?>
			  </span>			
		    <form class="card" method="POST">
				 <div class="partierajouterrdv">
					<p>Rajouter une Demande </p>
				 </div>				
                   
				   <div class="radiordv">
                     <div class="custom-controls-stacked">
                        <label class="custom-switch">
                          <input type="checkbox" name="radiordv2" value="Non" class="custom-switch-input">
                          <span class="custom-switch-indicator"></span>
                          <span class="custom-switch-description">Oui Je Veux Rajouter Ma Demande</span>
                        </label>						  
                     </div>
					 <br>
				   </div>		
						
				<div  id="Rajouterrdv" class="card-footer text-center">
                  <button type="submit" name="Rajoutersubmit" class="btn btn-primary"> <i class="fe fe-plus"> </i>Rajouter la Demande</button> 
                </div>			   
		    </form>				  
		   </div> 
		 </div> 
		</div> 
	  </div> 
	      <?php
          }else{
             header('location:superadminpage.php');
          }
          ?>
		</div> 
      </div>


    </div>
	
  </body>
</html>
