<?php
session_start();
require("authsecretaire.php");
if(Authsec::isLogged()){

}else{
  header('Location:../medsystemloginpage.php');
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

    <title>MEDSYSTEM | SECRETAIRE</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
   <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
          });
    </script>
    <link href="../assets/css/dashboard.css" rel="stylesheet" />
    <link href="../css/stylemenu.css" rel="stylesheet" />  
    <script src="../assets/js/dashboard.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <script src="../js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="../js/script.js"></script>
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header">
          <div class="container">
            <div class="d-flex">
              <a class="navbar-brand">
                <img src="../images/LOGO2.png" style="width:150px; height:23px;" class="navbar-brand-img">
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
                    <span class="avatar"> <img src="../photo/<?php echo $_SESSION['var1sec'] ?>"/> </span>
                    <span class="ml-2 d-none d-lg-block">

                      <span class="text-default"><?php echo $_SESSION['var2sec'] ?>  </span>
                      <span class="text-default"><?php echo $_SESSION['var3sec'] ?>  </span>
                      <small class="text-muted d-block mt-1"><span class="status-icon bg-success"></span><?php echo $_SESSION['var4sec'] ?> </small>

                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="../medsystemlogoutpage.php">Deconnecter</a>
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
				   <li><a href='index.php'> <i class="fe fe-folder"> </i> Dossiers</a>

				   </li>
				   <li><a href=''> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href='voirrendezvous.php'>Voir Rendez-vous</a></li>
					  </ul>  
				   </li>
		       </ul>
		     </div>
		  </div>
       </div>
           <?php
		   include("../bd/connect.php");
          if(!isset($_GET['idRDV']))
          {
          header('location:index.php');
          }
          else{
          $SecdRDV=intval($_GET['idRDV']);
          }
          $req=$conbd->query('SELECT * FROM rendezvous WHERE idRDV = "'.$SecdRDV.'" AND siterdv="'.$_SESSION['var6sec'].'"');

          $don=$req->fetch(); 
            if(isset($don['idRDV'])){ ?>	   
      <div class="page-content">
       <div class="container">
	   
            <div class="positionadm">
              <p> <a href="index.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i><a href="voirrendezvous.php"> Voir Rendez-vous </a><i class="fe fe-chevron-right"> </i> Annuler Rendez-vous</p>
            </div>

 <div class="row">		
		<div class="col-md-12">	
		 <div class="row">    
           <div class="col-md-4">
		     <?php include("Traitement/ModifierSEC.php"); ?>
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
                  <button type="submit" name="SecProfilesubmit" class="btn btn-primary"> <i class="fe fe-edit"> </i> Modifier</button> 
                </div>				  
                </div>
              </form>		   
		   </div> 			 
           <div class="col-md-8">

            <?php include("Traitement/AnnulerSEC.php"); ?>
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
                          <span class="custom-switch-description">Oui Je Veux Annuler Cette Demande</span>
                        </label>						  
                     </div>
					 <br>
				   </div>		
						
				<div  id="Annulerrdv" class="card-footer text-center">
                  <button type="submit" name="SECBtnannulerRDV" class="btn btn-primary"> <i class="fe fe-x-circle"> </i> Annuler la Demande</button> 
                </div>			   
		    </form>	
			
		   </div> 
		 </div> 
		</div> 
	  </div> 		
 
       </div>			
			
		</div>			
			   
	   </div>
	   	  <?php
          }else{
             header('location:index.php');
          }
          ?>
		
      </div>


    </div>	
  </body>
</html>
