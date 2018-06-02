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
				   <li><a href=''> <i class="fe fe-user-plus"> </i> Patient</a>
				   </li>
				   </li>
				   <li><a href=''> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href='voirrendezvous.php'>Voir Rendez-vous</a></li>
					  </ul>  
				   </li>
		       </ul>
			 </div>   
              <div class="col-4 offset-8">
                <form class="input-icon">
                  <input style="margin-top:10px;" type="text" name="search_text" id="search_text" class="form-control header-search" placeholder="Rechercher Patient" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div>
                    <center>			  
                      <div class="col-md-12"> 					   
				        <div class="reponserecherche" id="resultRechercheDossier"></div>
					  </div>	
					 </center>					 
			 
		  </div>
       </div>

           <?php
		   include("../bd/connect.php");
          if(!isset($_GET['idRDV']))
          {
          header('location:index.php');
          }
          else{
          $idprdv=intval($_GET['idRDV']);
          }
          $req=$conbd->query('SELECT * FROM rendezvous WHERE idRDV = "'.$idprdv.'"');

          $don=$req->fetch(); 
            if(isset($don['idRDV'])){ ?>
			
      <div class="page-content">
       <div class="container">
	   
            <div class="positionadm">
              <p> <i class="fe fe-user-plus"> </i> Nouveau Patient</p>
            </div>
			
			<div class="alert alert-primary alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"></button>
				 <b>Les informations et les operations auxquelles vous avez accès sont relatives uniquement pour le centre dans lequel vous travaillez.</b>
			</div>
	   <div class="row">	   
		<div class="col-md-12">  
		   <div class="SECmessage">
			 <?php include("Traitement/SecPatientRDV.php"); ?>
			  <div class="DvaliderSEC">
               <?php if(isset($CreationDok)){ echo $CreationDok;}?>
              </div>
			  <div class="messageerreurSEC">
                <?php if(isset($DChampvide)){ echo $DChampvide;} ?>
                <?php if(isset($CreationDNo)){ echo $CreationDNo;} ?>				
              </div> 
			</div>  
		 <div class="row">
			<div class="col-md-8">
                       <form method="POST">
						   <div class="card">
							<div class="card-header">
							  <div class="dossiertete">
								<p>Informations Personnelles</p> 
							  </div>
							</div>
							<div class="card-body">
							  <div class="row">
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Nom <span class="obligatoire">*</span></label>
									<input type="text" name="nomPatient" class="form-control" placeholder="Enter Nom" value="">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Prenom <span class="obligatoire">*</span></label>
									<input type="text" name="prenomPatient" class="form-control" placeholder="Entrer Prenom" value="">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Date De Naissance <span class="obligatoire">*</span></label>
									<input type="date" name="datedenaissancePatient" class="form-control" placeholder="Entrer Date De Naissance" value="">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Lieu De Naissance <span class="obligatoire">*</span></label>
									<input type="text" name="lieudenaissancePatient" class="form-control" placeholder="Entrer Lieu De Naissance"
									value="">                      
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Adresse <span class="obligatoire">*</span></label>
									<input type="text" name="adressePatient" class="form-control" placeholder="Entrer Adresse" value="">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Telephone <span class="obligatoire">*</span></label>
									<input type="tel" name="telephonePatient" class="form-control" placeholder="Entrer Telephone" value="">
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Situation Familiale <span class="obligatoire">*</span></label>
									<select name="statutmPatient" class="form-control">
									  <option value=""></option>
									  <option value="Celibataire">Celibataire</option>
									  <option value="Marié (e)">Marié (e)</option>
									  <option value="Divorcé (e)">Divorcé (e)</option>
									</select>                     
								  </div>
								</div>                   
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Profession / Occupation<span class="obligatoire">*</span></label>
									<input type="text" name="professionPatient" class="form-control" placeholder="Entrer Profession" value="">                       
								  </div>
								</div>
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Personne De Reference<span class="obligatoire">*</span></label>
									<input type="text" name="referencePatient" class="form-control" placeholder="Entrer Nom Complet Reference" value="">

								  </div>
								</div>                    
								<div class="col-sm-6 col-md-6">
								  <div class="form-group">
									<label class="form-label">Numero Telephone <span class="obligatoire">*</span></label>
									<input type="tel" name="telephonerferencePatient" class="form-control" placeholder="Entrer Numero De La Personne Référence" value="">
								  </div>
								</div>                   
							  </div>
							</div>
						  </div>	            

         <div class="card">
                <div class="card-header">
                  <div class="dossiertete">
                    <p>Antécédents</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Antécédents Médicaux</label>
                        <input type="text" name="antmedicauxPatient" class="form-control" placeholder="Enter Antécédents Médicaux" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Antécédents Churigicaux</label>
                        <input type="text" name="antchurigicauxPatient" class="form-control" placeholder="Entrer Antécédents Churigicaux" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Antécédents Familiaux</label>
                        <input type="text" name="antecedentfPatient" class="form-control" placeholder="Entrer Antécédents Familiaux" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Allergies Et Intolérence</label>
                        <input type="text" name="allergiesPatient" class="form-control" placeholder="Entrer Allergies Et Intolérence"
                        value="">                      
                      </div>
                    </div>                 
                  </div>
                </div>
        </div>

         <div class="card">
                <div class="card-header">
                  <div class="dossiertete">
                    <p>Biométrie</p>
                  </div>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Taille <span class="obligatoire">*</span></label>
                        <input type="text" name="taillePatient" class="form-control" placeholder="Enter Taille" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Poids <span class="obligatoire">*</span></label>
                        <input type="text" name="poidsPatient" class="form-control" placeholder="Entrer Poids" value="">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Groupe Sanguin <span class="obligatoire">*</span></label>
                        <select name="groupesanguin" class="form-control">
                          <option value=""></option>
                          <option value="A+">A+</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
                        </select>                     
                      </div>
                    </div>          
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Indicateurs Biologique</label>
                        <input type="text" name="indicateursbiologique" class="form-control" placeholder="Entrer Indicateurs Biologique"
                        value="">    
                      </div>
                    </div>                 
                  </div>
                </div>
        </div>        

				            <div id="btndossier">
                              <button type="submit" name="submitPatientSEC" class="btn btn-primary"> <i class="fe fe-plus-circle"></i> Ajouter Patient</button>
                              <br><br>               
			                </div>
                           <br>							
					   </form> 
			</div>
		
			 <div class="col-md-4">
			  <div class="card">
				 <div class="card-body p-3 text-center">
					<div class="h1 m-0"> <i class="fe fe-calendar"></i> </div>
					  <div  class="text-muted mb-4"><?php date_default_timezone_set('America/Port-au-Prince'); $date = date('d F Y'); Print("$date");?>
					  </div>
					</div>		  
			  </div> 
			  <div class="card">
               
                  <div class="card-body">
                    <div class="media">
                      <span class="avatar avatar-xxl mr-5" id="adminimg" style="background-image: url(../photo/<?php echo $_SESSION['var1sec'] ?>)"></span>
					  
					  <div class="media-body" id="adminfonom">				  
                        <h4 class="m-0"><?php echo $_SESSION['var2sec'] ?> <?php echo $_SESSION['var3sec'] ?></h4>
                        <p class="text-muted mb-0"> <span class="status-icon bg-success"></span> <?php echo $_SESSION['var4sec'] ?></p>
                      </div>
                    </div>
					  <br>
					 <p class="text-muted mb-0"> <i class="fe fe-user"> </i> Username : <?php echo $_SESSION['var7sec'] ?></p>
					 <p class="text-muted mb-0"> <i class="fe fe-home"> </i> Site : <?php echo $_SESSION['var6sec'] ?></p>
				     <p class="text-muted mb-0"> <i class="fe fe-tag"> </i> Fonction : <?php echo $_SESSION['var4sec'] ?></p>
					 <p class="text-muted mb-0"> <i class="fe fe-mail"> </i> Email : <?php echo $_SESSION['var8sec'] ?></p>
					  <br>
					 <center> <p class="text-muted mb-0"><a href="modifierProfile.php"> <i class="fe fe-edit" > </i> Modifier </a></p> </center>
                  </div>
            
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
 <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"Traitement/rechercherPatients.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#resultRechercheDossier').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>	
  </body>
</html>
