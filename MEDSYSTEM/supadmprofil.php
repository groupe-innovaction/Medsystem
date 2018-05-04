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
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>MEDSYSTEM | PROFIL UTILISATEUR</title>
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
    <script src="js/jquery-latest.min.js" type="text/javascript"></script>
    <script src="js/script.js"></script>    
  </head>
  <body class="">

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
				   <li class='active'><a href='#'> <i class="fe fe-folder"> </i> Dossiers</a>
					  <ul>
						 <li><a href=''>Creer Dossier</a></li>
						 <li><a href=''>Voir Dossier</a></li>
					  </ul>
				   </li>
				   <li><a href='#'> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href='supadmprendrerendezvous.php'>Prendre Rendez-vous</a></li>
						 <li><a href=''>Lister Rendez-vous</a></li>
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
              <p> <a href="superadminpage.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i>  Profil </p>
            </div>
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 grid-margin">
             <div class="profilteteimprimer"> 
              <div class="card">
                <div class="">
                  <div class="align-items-center justify-content-between d-lg-flex d-xl-flex d-md-block d-block">
                    <div id="chartLegend"></div>
                    <div class="col-md-8">

                    </div>
                    
                    <div class="col-md-4">
                      <input type="radio" name="tabstete" id="tab1" checked="checked"/>
                      <input type="radio" name="tabstete" id="tab2"/>
                      <label id="impression" onclick="imprimer_page()" for="tab2"> <i class="fe fe-printer"></i> Imprimer</label>
                   <!--   <input type="radio" name="tabstete" id="tab3"/>
                      <label for="tab3"> <i class="fe fe-alert-circle"></i> Bloquer</label> -->
                    </div>
					
                  </div>
                </div>
              </div>
             </div>
            </div>
          </div>
     </div>            
            <div class="row row-cards">

<div class="container">
   <?php
include("bd/connect.php");
?>

           <?php
          if(!isset($_GET['idlogin']))
          {
          header('location:accueil');
          }
          else{
          $mon_id=intval($_GET['idlogin']);
          }
          $req=$conbd->query('SELECT * FROM logintable WHERE idlogin = "'.$mon_id.'"');

          $don=$req->fetch(); 
            if(isset($don['idlogin'])){ ?>
			
<div class="tab-wrap">
  
       <input type="radio" name="tabs" id="tab-1" checked>
    <div class="tab-label-content" id="tab1-content">
		  <label class="profiltxt" for="tab-1"><i class="fe fe-user"> </i> Profil</label>	  
		  <div class="tab-content">
		  
       <div class="row">
	      <div class="col-md-10">
		  <div class="card">
		   <div class="card-body">
            <form class="enteteprofil">
			<br><br>
			  <div class="imgenteteprofil">
				 <img src="images/LOGO2.png" width="150px;">
			  </div>
              <br><br>
             <div class="barprofil0"></div>
				  <center>
				 <h3>MEDHAITI</h3> 
			   <p>Une hopital de référence</p>
			   <h4>#10, Rue NoelGuively, Impasse toto, Port-au-prince, HAITI TEL:+509 1234567 | 1234567</h4> 
				 </center>        
             <div class="barprofil1"></div>
             <div class="barprofil2"></div>
           </div> 	
				  <br><br>
				  <div class="profilphoto">
					 <center><img src="photo/<?php echo $don['photoutilisateur'];?>"/></center>
				  </div>
          <div class="infopersonnel">
              <h4>INFORMATION PERSONNEL</h4>
              <br>
              <div class="col-md-9">
                <div class="row affprofil">
                      <div class="row nomfamille col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b> NOM :</b> <?php echo $don['nom'];?></label> 
                        </div>
                      </div>
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>PRENOM :</b> <?php echo $don['prenom'];?></label>
                        </div>
                      </div>
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>IDENTIFIANT :</b> <?php echo $don['idlogin'];?></label>
                        </div>
                      </div>
                       <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>NIF/CIN :</b> <?php echo $don['nif'];?></label>
                        </div>
                      </div>
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>SEXE :</b> <?php echo $don['sexe'];?></label>
                        </div>
                      </div>
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>STATUT MATRIMONIALE :</b> <?php echo $don['statutm'];?></label>
                        </div>
                      </div>                      
                       <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>DATE DE NAISSANCE :</b> <?php echo $don['dns'];?></label>
                        </div>
                      </div>  
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>LIEU DE NAISSANCE :</b> <?php echo $don['lns'];?></label>
                        </div>
                      </div>
                       <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>ADRESSE :</b> <?php echo $don['adresse'];?></label>
                        </div>
                      </div>                                                               
                 </div>     
             </div>
          </div>
          <div class="infopersonnel">
              <h4>AUTRES INFORMATIONS</h4>
              <br>
              <div class="col-md-12">
                <div class="row affprofil">
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>FONCTION :</b> <?php echo $don['fonction'];?></label> 
                        </div>
                      </div>
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>SITE :</b> <?php echo $don['site'];?></label>
                        </div>
                      </div>  
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>DATE D'EMBAUCHE :</b> <?php echo $don['dateins'];?></label> 
                        </div>
                      </div>
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>STATUT :</b> <?php echo $don['statut'];?></label>
                        </div>
                      </div>                                                             
                 </div>     
             </div>
          </div> 	
          <div class="infopersonnel">
              <h4>CONTACT</h4>
              <br>
              <div class="col-md-12">
                <div class="row affprofil">
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>EMAIL :</b> <?php echo $don['mail'];?></label> 
                        </div>
                      </div>
                      <div class="row col-md-6">
                        <div class="form-group">
                          <label class="form-label"><b>TELEPHONE :</b> +509 <?php echo $don['telephone1'];?>  <?php echo $don['telephone2'];?></label>
                        </div>
                      </div>                                        
                 </div>     
             </div>
          </div> 
          <br><br><br>	
				<div class="profilpieds">
				</div>	
          <br><br><br>				
			</form>
		   </div>
		 </div>  
		 
		 <div class="col-md-2">
		 <button class="btndebloquertete" type="btnsubmit" name="btnsubmit" class="btn btn-primary"> <i class="fe fe-alert-triangle"></i> </button>
		  <div class="card">
		   <div class="card-body">
		   <div class="bloquerutilisateur">
            <form method="POST" action="">
			
			  <?php
			  if(isset($_POST['btnsubmit'])){
				  if(!empty($_POST['radio1'])){
				  $radio1=htmlspecialchars($_POST['radio1']);				  
			   $req=$conbd->prepare('UPDATE logintable SET statut="'.$radio1.'" WHERE idlogin = "'.$mon_id.'"');
			   $req->execute();
                if($req){
					$btnvalider="$radio1 !!!";
				}
				 }else{
					 $btnaction="Pas d'Action";
				 }
			  }
			  
			  ?>
					  <div class="btnmessage">
						   <div class="buttonaction">
						  <?php if(isset($btnaction)){ echo $btnaction; }?>
						   </div>
						   <div class="buttonvalider">
						  <?php if(isset($btnvalider)){ echo $btnvalider; }?>
						   </div>
					  </div>	
					  
                      <div class="form-group">
                        <label class="form-label">  </label>
                        <div class="custom-controls-stacked">
                          <label class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="radio1" value="En Fonction">
                            <div class="custom-control-label">Debloquer</div>
                          </label>
                          <label class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" name="radio1" value="Bloquer">
                            <div class="custom-control-label">Bloquer</div>
                          </label>
                        </div>
						 <button class="btndebloquer" type="btnsubmit" name="btnsubmit" class="btn btn-primary">Valider</button>
                      </div>			
			</form>		   
		   </div>
		   </div>
		   </div>
		 </div>
		 
	  </div>		  
		  </div>

		  </div>
    </div>

     <div class="tab-label-content" id="tab2-content">
       <label class="profiltxt" for="tab-2"> <i class="fe fe-edit"> </i> <a href="modifierprofile.php?idlogin=<?php echo $don['idlogin'];?>"> Modifier </a> </label>
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
<script type="text/javascript">
function imprimer_page(){
  window.print();
}
</script>
    </div>
  </body>
</html>