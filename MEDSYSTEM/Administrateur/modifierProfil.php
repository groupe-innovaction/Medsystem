<?php
session_start();
require("authadmin.php");
if(Authadmin::isLogged()){

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

    <title>MEDSYSTEM | MODIFIER UTILISATEURS</title>
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
                    <span class="avatar"> <img src="../photo/<?php echo $_SESSION['var1admin'] ?>"/> </span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo $_SESSION['var2admin'] ?>  </span>
                      <span class="text-default"><?php echo $_SESSION['var3admin'] ?>  </span>
                      <small class="text-muted d-block mt-1"> <?php echo $_SESSION['var4admin'] ?> </small>

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
				   <li><a href=''> <i class="fe fe-users"> </i> Utilisateurs</a>
					  <ul>
						 <li><a href='ajouterutilisateurs.php'>Ajouter Utilisateur</a></li>
						 <li><a href='listerutilisateurs.php'>Lister Utilisateurs</a></li>
					  </ul> 
				   </li>
				   <li><a href='#'> <i class="fe fe-folder"> </i> Dossiers</a>
					  <ul>
						 <li><a href=''>Creer Dossier</a></li>
						 <li><a href=''>Voir Dossier</a></li>
					  </ul>
				   </li>
				   <li><a href='#'> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href='Prenderendezvous.php'>Prendre Rendez-vous</a></li>
						 <li><a href='listerRendezvous.php'>Lister Rendez-vous</a></li>
					  </ul>  
				   </li>
		       </ul>
		     </div>
		  </div>
       </div>
           <?php
			  include("../bd/connect.php"); 
			  if(!isset($_GET['idlogin']))
			  {
			  header('location:index.php');
			  }
			  else{
			  $MonIdAdmin=intval($_GET['idlogin']);
			  }
			  $req=$conbd->query('SELECT * FROM logintable WHERE idlogin = "'.$MonIdAdmin.'"');

			  $don=$req->fetch(); 
				if(isset($don['idlogin'])){ 
			?>	   
	   <div class="container">
	       <br>
         <div class="positionadm">
          <p> <a href="index.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i> Profile <i class="fe fe-chevron-right"> </i> Modifier Utilisateurs</p>
         </div>	
       <h3>Modifier Le Profile De <?php echo $don['nom']; ?> <?php echo $don['prenom']; ?> </h3>
	       <?php include("Traitement/AdmModifierProfile.php"); ?>
	<div class="row">
		<div class="card-body col-md-10">
		<a href="profil.php?idlogin=<?php echo $don['idlogin'];?>"> <button id="btnretour" type="button" class="btn btn-primary"> <i class="fe fe-arrow-left"></i> Retour</button> </a>
         <div class="row">
         <div class="modifiermain">
              <form class="card" method="POST" action="" enctype="multipart/form-data">
                <div class="card-header">

                </div>
                  <div class="row container">

                    <div class="col-sm-12">
                       <br><br>
                      <div class="form-group">
                       <center>
                        <script src="js/jquery.min.js"></script>
                         <div id="profile-container">
                           <image id="profileImage" src="photo/<?php echo $don['photoutilisateur']; ?>" />
                        </div>
                    <input id="imageUpload" type="file" name="nouveauphotoutilisateur" src="photo/<?php echo $don['photoutilisateur']; ?>"/>
                      </center>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveaunom" class="form-control" placeholder="Enter Nom" value="<?php echo $don['nom']; ?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Prenom <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveauprenom" class="form-control" placeholder="Entrer Prenom" value="<?php echo $don['prenom']; ?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom D'utilisateur <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveauusername" class="form-control" placeholder="Entrer Nom D'utilisateur" value="<?php echo $don['username']; ?>" required>
                            <span class="messageerreur">
                              <?php if(isset($vu)){ echo $vu;} ?> 
                            </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email <span class="obligatoire">*</span></label>
                        <input type="email" name="nouveaumail" class="form-control" placeholder="Entrer Email"
                        value="<?php echo $don['mail']; ?>" required>
                              <span class="messageerreur">
                               <?php if(isset($vm)){ echo $vm;} ?>
                               <?php if(isset($vuemail)){ echo $vuemail;} ?> 
                              </span>                        
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Mot De Passe <span class="obligatoire">*</span></label>
                        <input type="" name="nouveaupassword" class="form-control" placeholder="Entrer Mot De Passe" value="<?php echo $don['password']; ?>" required>
                                <span class="messageerreur">
                                  <?php if(isset($lp)){ echo $lp;} ?> 
                                </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Date De Naissance <span class="obligatoire">*</span></label>
                           <input type="date" class="form-control" name="nouveaudns" placeholder="Date De Naissance" value="<?php echo $don['dns']; ?>" required>
                    </div>
                    </div>                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nif/Cin <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveaunif" class="form-control" placeholder="Entrer Nif" value="<?php echo $don['nif']; ?>" required>                       
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Statut Matrimonial <span class="obligatoire">*</span></label>
                        <select name="nouveaustatutm" class="form-control">
                          <option value="<?php echo $don['statutm']; ?>"><?php echo $don['statutm']; ?></option>
                          <option value="Celibataire">Celibataire</option>
                          <option value="Marié (e)">Marié (e)</option>
                          <option value="Divorcé (e)">Divorcé (e)</option>
                        </select>                       
                      </div>
                    </div>                  
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Lieu De Naissance <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveaulns" class="form-control" placeholder="Entrer Lieu De Naissance" value="<?php echo $don['lns']; ?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Adresse Atuelle <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveauadresse" class="form-control" placeholder="Entrer Adresse" value="<?php echo $don['adresse']; ?>" required>
                      </div>
                    </div>                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Sexe <span class="obligatoire">*</span></label>
                        <select name="nouveausexe" class="form-control">
                          <option value="<?php echo $don['sexe']; ?>"><?php echo $don['sexe']; ?></option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>                       
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Fonction <span class="obligatoire">*</span></label>
                        <select name="nouveaufonction" class="form-control">
                          <option value="<?php echo $don['fonction']; ?>"><?php echo $don['fonction']; ?></option>
                          <option value="Secretaire">Secretaire</option>
                          <option value="Infirmiere">Infirmiere</option>
                          <option value="Medecin">Medecin</option>
                          <option value="Administrateur">Administrateur</option>
                        </select>                        
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Site <span class="obligatoire">*</span></label>
                        <select name="nouveausite" class="form-control">
                          <option value="<?php echo $_SESSION['var6admin']; ?>"><?php echo $_SESSION['var6admin']; ?></option>
                        </select>                       
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Telephone-1 <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveautelephone1" class="form-control" placeholder="Entrer Numero Telephone" value="<?php echo $don['telephone1']; ?>" required>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Telephone-2</label>
                        <input type="text" name="nouveautelephone2" class="form-control" placeholder="Entrer Numero Telephone" value="<?php echo $don['telephone2']; ?>">
                      </div>
                    </div>                    
                  </div>
                <div class="card-footer text-right">
                  <button type="submit" name="AdmProfilesubmit" class="btn btn-primary"> <i class="fe fe-edit"></i> Modifier Utilisateur</button>
                </div>
           </form>          
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
 
  </body>
     <script type="text/javascript">
$("#profileImage").click(function(e) {
    $("#imageUpload").click();
});

function fasterPreview( uploader ) {
    if ( uploader.files && uploader.files[0] ){
          $('#profileImage').attr('src', 
             window.URL.createObjectURL(uploader.files[0]) );
    }
}

$("#imageUpload").change(function(){
    fasterPreview( this );
});
  </script> 
</html>
