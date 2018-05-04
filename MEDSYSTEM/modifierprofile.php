<?php
session_start();
require("authsuperadmin.php");
if(Authsuperadmin::isLogged()){

}else{
  header('Location:medsystemloginpage.php');
}
?>
<!DOCTYPE html>
<html>
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
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>MEDSYSTEM | MODIFIER PROFIL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
          });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <link href="css/stylemenu.css" rel="stylesheet" />  
    <script src="./assets/js/dashboard.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
</head>
<body>
	<div class="container">
   <?php
include("bd/connect.php");
?>

           <?php
          if(!isset($_GET['idlogin']))
          {
          header('location:superadminpage.php');
          }
          else{
          $mon_idp=intval($_GET['idlogin']);
          }
          $req=$conbd->query('SELECT * FROM logintable WHERE idlogin = "'.$mon_idp.'"');

          $don=$req->fetch(); 
            if(isset($don['idlogin'])){ ?>
			
<?php include("controleur/modifierprofiletraitement.php"); ?>

	<div class="row">
		<div class="card-body col-md-10">
		<a href="supadmprofil.php?idlogin=<?php echo $don['idlogin'];?>"> <button id="btnretour" type="button" class="btn btn-primary"> <i class="fe fe-arrow-left"></i> Retour</button> </a>
         <div class="row">
         <div class="modifiermain">
              <form class="card" method="POST" action="" enctype="multipart/form-data">
                <div class="card-header">
                  <div class="ajttete">
                    <p>Modifier L'utilisateur</p>
                  </div>
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
                    <input id="imageUpload" type="file" name="nouveauphotoutilisateur">
                      </center>
                      </div>
                    </div>

                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveaunom" class="form-control" placeholder="Enter Nom" value="<?php echo $don['nom']; ?>" required>
                            <span class="messageerreur">
                              <?php if(isset($erreurnnom)){ echo $erreurnnom;} ?> 
                            </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Prenom <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveauprenom" class="form-control" placeholder="Entrer Prenom" value="<?php echo $don['prenom']; ?>" required>
                            <span class="messageerreur">
                              <?php if(isset($erreurprenom)){ echo $erreurprenom;} ?> 
                            </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom D'utilisateur <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveauusername" class="form-control" placeholder="Entrer Nom D'utilisateur" value="<?php echo $don['username']; ?>" required>
                            <span class="messageerreur">
                              <?php if(isset($erreurusername)){ echo $erreurusername;} ?> 
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
                               <?php if(isset($erreurmail)){ echo $erreurmail;} ?> 
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
                                  <?php if(isset($erreurpassword)){ echo $erreurpassword;} ?> 
                                  <?php if(isset($lp)){ echo $lp;} ?> 
                                </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Date De Naissance <span class="obligatoire">*</span></label>
                           <input type="date" class="form-control" name="nouveaudns" placeholder="Date De Naissance" value="<?php echo $don['dns']; ?>" required>
                               <span class="messageerreur">
                                <?php if(isset($erreurdns)){ echo $erreurdns;} ?> 
                               </span>   
                    </div>
                    </div>                    
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nif/Cin <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveaunif" class="form-control" placeholder="Entrer Nif" value="<?php echo $don['nif']; ?>" required>
                              <span class="messageerreur">
                                <?php if(isset($erreurnif)){ echo $erreurnif;} ?> 
                              </span>                        
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
                              <span class="messageerreur">
                                <?php if(isset($erreurstatutm)){ echo $erreurstatutm;} ?> 
                              </span>                        
                      </div>
                    </div>                  
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Lieu De Naissance <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveaulns" class="form-control" placeholder="Entrer Lieu De Naissance" value="<?php echo $don['lns']; ?>" required>
                              <span class="messageerreur">
                                <?php if(isset($erreurlns)){ echo $erreurlns;} ?> 
                              </span>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Adresse Atuelle <span class="obligatoire">*</span></label>
                        <input type="text" name="nouveauadresse" class="form-control" placeholder="Entrer Adresse" value="<?php echo $don['adresse']; ?>" required>
                              <span class="messageerreur">
                                <?php if(isset($erreuradresse)){ echo $erreuradresse;} ?> 
                              </span>
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
                              <span class="messageerreur">
                                <?php if(isset($erreursexe)){ echo $erreursexe;} ?> 
                              </span>                        
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
                              <span class="messageerreur">
                                <?php if(isset($erreurfonction)){ echo $erreurfonction;} ?> 
                              </span>                         
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Site <span class="obligatoire">*</span></label>
                        <select name="nouveausite" class="form-control">
                          <option value="<?php echo $don['site']; ?>"><?php echo $don['site']; ?></option>
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
                        <input type="text" name="nouveautelephone1" class="form-control" placeholder="Entrer Numero Telephone" value="<?php echo $don['telephone1']; ?>" required>
                              <span class="messageerreur">
                               <?php if(isset($erreurtelephone1)){ echo $erreurtelephone1;} ?> 
                              </span>
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
                  <button type="submit" name="submit" class="btn btn-primary">Modifier Utilisateur</button>
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