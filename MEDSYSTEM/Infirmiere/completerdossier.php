<?php
session_start();
require("authinfirmiere.php");
if(Authinf::isLogged()){

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

    <title>MEDSYSTEM | INFIRMIERE</title>
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
                    <span class="avatar"> <img src="../photo/<?php echo $_SESSION['var1inf'] ?>"/> </span>
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default"><?php echo $_SESSION['var2inf'] ?>  </span>
                      <span class="text-default"><?php echo $_SESSION['var3inf'] ?>  </span>
                      <small class="text-muted d-block mt-1"> <span class="status-icon bg-success"></span> <?php echo $_SESSION['var4inf'] ?> </small>

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
				   <li><a href='#'> <i class="fe fe-folder"> </i> Dossiers</a>
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
          if(!isset($_GET['idPatient']))
          {
          header('location:index.php');
          }
          else{
          $InfidDossier=intval($_GET['idPatient']);
          }
          $req=$conbd->query('SELECT * FROM patients WHERE idPatient = "'.$InfidDossier.'" AND SiteCreationpatient="'.$_SESSION['var6inf'].'"');

          $don=$req->fetch(); 
            if(isset($don['idPatient'])){ ?>
			
       <div class="page-content">  
       <div class="container">
	   
            <div class="positionadm">
              <p> <a href="index.php"><i class="fe fe-home"> </i> Acceuil </a>  <i class="fe fe-chevron-right"> </i> Completer Dossier </p>
            </div>
			
			<div id="completerD">
			  <h2><?php echo $don['nomPatient'] ?> <?php echo $don['prenomPatient'] ?> - <?php echo $don['idPatient'] ?></h2>
	    	</div>
			<?php
			 include("Controleur/completerD.php");
			?>
			 <span class="messageerreurrdv"> 
			    <?php if(isset($erreurCDossier)){echo $erreurCDossier;}?> 
			    <?php if(isset($CDNo)){echo $CDNo;}?> 				
			 </span>
			 <span class="formvalider">
			   <?php if(isset($CDok)){ echo $CDok;}?>
			 </span>			 
	   <div class="row">	   
		<div class="col-md-12"> 
		 <div class="row">
		 
             <form method="POST" class="col-md-8">
			 
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
                        <input type="text" name="taille" class="form-control" placeholder="Enter Taille" value="<?php if(isset($taille)){echo $taille; }?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Poids <span class="obligatoire">*</span></label>
                        <input type="text" name="poids" class="form-control" placeholder="Entrer Poids" value="<?php if(isset($poids)){echo $poids; }?>">
                      </div>
                    </div> 
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Tension Arterielle <span class="obligatoire">*</span></label>
                        <input type="text" name="tensionArt" class="form-control" placeholder="Entrer Tension Arterielle"
                        value="<?php if(isset($tensionArt)){echo $tensionArt; }?>">    
                      </div>
                    </div> 	
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Pouls <span class="obligatoire">*</span></label>
                        <input type="text" name="pouls" class="form-control" placeholder="Entrer Tension Cardiaque"
                        value="<?php if(isset($pouls)){echo $pouls; }?>">    
                      </div>
                    </div> 					
                  </div>
                </div>
			  </div>

             <div class="card">
			        <br>
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Motif De la Consultation <span class="obligatoire">*</span></label>
                        <input type="text" name="motifConsultation" class="form-control" placeholder="Entrer Le Motif De Votre Consultation"
                        value="<?php if(isset($motifConsultation)){echo $motifConsultation; }?>">    
                      </div>
                    </div> 					
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Observation</label>                  
                         <textarea name="observation" class="form-control" placeholder="Commenter Ce Dossier..." rows="6" cols="47"value=""></textarea>
					  </div>
                    </div>			 			 
			 </div>				  
					<div class="text-right">
					 <button type="submit" name="completerDossier" class="btn btn-primary"> <i class="fe fe-check"> </i> Valider </button>
					</div>
                   <br><br>
		</form>		
		
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
                      <span class="avatar avatar-xxl mr-5" id="adminimg" style="background-image: url(../photo/<?php echo $_SESSION['var1inf'] ?>)"></span>
					  
					  <div class="media-body" id="adminfonom">				  
                        <h4 class="m-0"><?php echo $_SESSION['var2inf'] ?> <?php echo $_SESSION['var3inf'] ?></h4>
                        <p class="text-muted mb-0"> <span class="status-icon bg-success"></span> <?php echo $_SESSION['var4inf'] ?></p>
                      </div>
                    </div>
					  <br>
					 <p class="text-muted mb-0"> <i class="fe fe-user"> </i> Username : <?php echo $_SESSION['var7inf'] ?></p>
					 <p class="text-muted mb-0"> <i class="fe fe-home"> </i> Site : <?php echo $_SESSION['var6inf'] ?></p>
				     <p class="text-muted mb-0"> <i class="fe fe-tag"> </i> Fonction : <?php echo $_SESSION['var4inf'] ?></p>
					 <p class="text-muted mb-0"> <i class="fe fe-mail"> </i> Email : <?php echo $_SESSION['var8inf'] ?></p>
					  <br>
					 <center> <p class="text-muted mb-0"><a href=""> <i class="fe fe-edit" > </i> Modifier </a></p> </center>
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
   url:"Controleur/rechercherPatients.php",
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
