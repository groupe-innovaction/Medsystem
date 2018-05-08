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
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>MEDSYSTEM | AJOUTER UTILISATEUR</title>
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
  <body class="">
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
                    <span class="avatar"> <img src="photo/ADM.jpg"/> </span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">Kerdely FABIEN</span>
                      <small class="text-muted d-block mt-1">Super Administrateur</small>
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
    <div class="backmenu navbar-fixed-top">
       <div class="container">
          <div id='cssmenu'>
             <ul>
           <li><a href=''> <i class="fe fe-users"> </i> Utilisateurs</a>
            <ul>
             <li><a href=''>Ajouter Utilisateur</a></li>
             <li><a href='superadminvoirutilisateurs.php'>Lister Utilisateurs</a></li>
            </ul> 
           </li>
           <li class='active'><a href='#'> <i class="fe fe-folder"> </i> Dossiers</a>
            <ul>
             <li><a href=''>Creer Dossier</a></li>
             <li><a href=''>Voir Dossier</a></li>
            </ul>
           </li>
           <li><a href='#'> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
             <ul>
             <li><a href='supadmprendrerendezvous.php'>Prendre Rendez-vous</a></li>
             <li><a href='supadmlisterrendezvous.php'>Lister Rendez-vous</a></li>
             <li><a href=''>Annuler Rendez-vous</a></li>
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
        <div class="page-content">
          <div class="container">
            <div class="positionadm">
              <p> <a href="superadminpage.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i>  Ajouter Utilisateur </p>
            </div>

<div class="row">
      <div class="col-md-10">

        <div class="messageoblogation">
          <p>Les champs marques * sont obligatoires</p>
        </div>


        <div class="ajoutermessage">
           <?php 
     include('Traitement/superadminajouterutilisateur.php');
           ?>
         <div class="formvalider">
          <p> <?php if(isset($form_ok)){ echo $form_ok;}?></p>
         </div>
        </div>  
              <form class="card" method="POST" action="" enctype="multipart/form-data">
                <div class="card-header">
                  <div class="ajttete">
                    <p>CrÉer Utilisateur</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-12">

                      <div class="form-group">
                       <center>
                        <script src="js/jquery.min.js"></script>
                         <div id="profile-container">
                           <image id="profileImage" src="images/avatar.png" />
                        </div>
                    <input id="imageUpload" type="file" name="photoutilisateur">
                      </center>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom <span class="obligatoire">*</span></label>
                        <input type="text" name="nom" class="form-control" placeholder="Enter Nom" value="<?php if(isset($nom)){ echo $nom;}?>">
                            <span class="messageerreur">
                              <?php if(isset($erreurnnom)){ echo $erreurnnom;} ?> 
                            </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Prenom <span class="obligatoire">*</span></label>
                        <input type="text" name="prenom" class="form-control" placeholder="Entrer Prenom" value="<?php if(isset($prenom)){ echo $prenom;}?>">
                            <span class="messageerreur">
                              <?php if(isset($erreurprenom)){ echo $erreurprenom;} ?> 
                            </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom D'utilisateur <span class="obligatoire">*</span></label>
                        <input type="text" name="username" class="form-control" placeholder="Entrer Nom D'utilisateur" value="<?php if(isset($username)){ echo $username;}?>">
                            <span class="messageerreur">
                              <?php if(isset($erreurusername)){ echo $erreurusername;} ?> 
                              <?php if(isset($vu)){ echo $vu;} ?> 
                            </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email <span class="obligatoire">*</span></label>
                        <input type="email" name="mail" class="form-control" placeholder="Entrer Email"
                        value="<?php if(isset($mail)){ echo $mail;}?>">
                              <span class="messageerreur">
                               <?php if(isset($erreurmail)){ echo $erreurmail;} ?> 
                               <?php if(isset($vm)){ echo $vm;} ?>
                               <?php if(isset($vuemail)){ echo $vuemail;} ?> 
                              </span>                        
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Confirmer Email <span class="obligatoire">*</span></label>
                        <input type="email" name="cmail" class="form-control" placeholder="Confirmer Email" value="<?php if(isset($cmail)){ echo $cmail;}?>">
                               <span class="messageerreur">
                                <?php if(isset($erreurcmail)){ echo $erreurcmail;} ?>
                                <?php if(isset($em)){ echo $em;} ?> 
                               </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Mot De Passe <span class="obligatoire">*</span></label>
                        <input type="password" name="password" class="form-control" placeholder="Entrer Mot De Passe" value="<?php if(isset($password)){ echo $password;}?>">
                                <span class="messageerreur">
                                  <?php if(isset($erreurpassword)){ echo $erreurpassword;} ?> 
                                  <?php if(isset($lp)){ echo $lp;} ?> 
                                </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Date De Naissance <span class="obligatoire">*</span></label>
                           <input type="date" class="form-control" name="dns" placeholder="Date De Naissance" value="<?php if(isset($dns)){ echo $dns;}?>">
                               <span class="messageerreur">
                                <?php if(isset($erreurdns)){ echo $erreurdns;} ?> 
                               </span>   
                    </div>
                    </div>                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nif/Cin <span class="obligatoire">*</span></label>
                        <input type="text" name="nif" class="form-control" placeholder="Entrer Nif" value="<?php if(isset($nif)){ echo $nif;}?>">
                              <span class="messageerreur">
                                <?php if(isset($erreurnif)){ echo $erreurnif;} ?> 
                              </span>                        
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Statut Matrimonial <span class="obligatoire">*</span></label>
                        <select name="statutm" class="form-control">
                          <option value="<?php if(isset($statutm)){ echo $statutm;}?>"><?php if(isset($statutm)){ echo $statutm;}?></option>
                          <option value="Celibataire">Celibataire</option>
                          <option value="Marié (e)">Marié (e)</option>
                          <option value="Divorcé (e)">Divorcé (e)</option>
                        </select>
                              <span class="messageerreur">
                                <?php if(isset($erreurstatutm)){ echo $erreurstatutm;} ?> 
                              </span>                        
                      </div>
                    </div>                  
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Lieu De Naissance <span class="obligatoire">*</span></label>
                        <input type="text" name="lns" class="form-control" placeholder="Entrer Lieu De Naissance" value="<?php if(isset($lns)){ echo $lns;}?>">
                              <span class="messageerreur">
                                <?php if(isset($erreurlns)){ echo $erreurlns;} ?> 
                              </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Adresse Atuelle <span class="obligatoire">*</span></label>
                        <input type="text" name="adresse" class="form-control" placeholder="Entrer Adresse" value="<?php if(isset($adresse)){ echo $adresse;}?>">
                              <span class="messageerreur">
                                <?php if(isset($erreuradresse)){ echo $erreuradresse;} ?> 
                              </span>
                      </div>
                    </div>                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Sexe <span class="obligatoire">*</span></label>
                        <select name="sexe" class="form-control">
                          <option value="<?php if(isset($sexe)){ echo $sexe;}?>"><?php if(isset($sexe)){ echo $sexe;}?></option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>
                              <span class="messageerreur">
                                <?php if(isset($erreursexe)){ echo $erreursexe;} ?> 
                              </span>                        
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Fonction <span class="obligatoire">*</span></label>
                        <select name="fonction" class="form-control">
                          <option value="<?php if(isset($fonction)){ echo $fonction;}?>"><?php if(isset($fonction)){ echo $fonction;}?></option>
                          <option value="Secretaire">Secretaire</option>
                          <option value="Infirmiere">Infirmiere</option>
                          <option value="Medecin">Medecin</option>
                          <option value="Administrateur">Administrateur</option>
                        </select>
                              <span class="messageerreur">
                                <?php if(isset($erreurfonction)){ echo $erreurfonction;} ?> 
                              </span>                         
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Site <span class="obligatoire">*</span></label>
                        <select name="site" class="form-control">
                          <option value="<?php if(isset($site)){ echo $site;}?>"><?php if(isset($site)){ echo $site;}?></option>
                          <option value="Ouest">Ouest</option>
                          <option value="Artibonite">Artibonite</option>
                          <option value="Centre">Centre</option>
                        </select>
                              <span class="messageerreur">
                                <?php if(isset($erreursite)){ echo $erreursite;} ?> 
                              </span>                         
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Telephone-1 <span class="obligatoire">*</span></label>
                        <input type="text" name="telephone1" class="form-control" placeholder="Entrer Numero Telephone" value="<?php if(isset($telephone1)){ echo $telephone1;}?>">
                              <span class="messageerreur">
                               <?php if(isset($erreurtelephone1)){ echo $erreurtelephone1;} ?> 
                              </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Telephone-2</label>
                        <input type="text" name="telephone2" class="form-control" placeholder="Entrer Numero Telephone">
                      </div>
                    </div>                    
                  </div>
                </div>
                <div class="card-footer text-right">
                  <button type="submit" name="submit" class="btn btn-primary">Créer Utilisateur</button>
                </div>
           </form>
      </div>
</div>


          </div>
        </div>
      </div>


    </div>

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
  </body>
</html>