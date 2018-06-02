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

    <title>MEDSYSTEM | ADMINISTRATEUR</title>
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
						 <li><a href='Prenderendezvous.php'>Demande Rendez-vous</a></li>
						 <li><a href='listerRendezvous.php'>Lister Rendez-vous</a></li>
					  </ul>  
				   </li>
		       </ul>
		     </div>
		  </div>
       </div>
	   
	   <div class="container">
	       <br>
            <div class="positionadm">
              <p> <i class="fe fe-home"> </i> Acceuil  <i class="fe fe-chevron-right"> </i> Tableau De Bord </p>
            </div>
			
			   <div class="alert alert-primary alert-dismissible">
				   <button type="button" class="close" data-dismiss="alert"></button>
					<b>Les informations et les operations auxquelles vous avez accès sont relatives uniquement pour le centre dans laquel vous travaillez.</b>
			   </div>

	  <div class="page-content">
            <div class="row row-cards">
            <?php
               include("../bd/connect.php");
               $totaleutilisateurs = $conbd->query('SELECT * FROM logintable WHERE site="'.$_SESSION['var6admin'].'" AND statut != "Bloquer" ');
               $totale = $totaleutilisateurs->rowcount();
            ?>			
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0">  <i class="fe fe-user"> </i> </div>
                    <div class="text-muted mb-4"><?php echo $totale; ?>  Utilisateurs </div>
                  </div>
                </div>
              </div>
            <?php
             $totaleDossier = $conbd->query('SELECT * FROM dossiers');
             $totaleDossierCreer = $totaleDossier->rowcount();
           ?> 			  
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"> <i class="fe fe-folder"> </i> </div>
                    <div class="text-muted mb-4"> <?php echo $totaleDossierCreer; ?> Dossiers</div>
                  </div>
                </div>
              </div>
             <?php    
              $totalerdv = $conbd->query('SELECT * FROM rendezvous WHERE siterdv="'.$_SESSION['var6admin'].'"');
              $totalerendezvous = $totalerdv->rowcount();
            ?>			  
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"> <i class="fe fe-folder-plus"> </i> </div>
                    <div class="text-muted mb-4"> <?php echo $totalerendezvous; ?> Rendez-vous</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="h1 m-0"> <i class="fe fe-calendar"></i> </div>
                    <div  class="text-muted mb-4"><?php date_default_timezone_set('America/Port-au-Prince'); $date = date('d F Y'); Print("$date");?>
		           </div>
                  </div>
                </div>
              </div>			  
			</div>  		
		</div>
		
	   <div class="row">	
		<div class="col-md-12">
		 <div class="row" id="admcorps">
		 		
			<div class="col-md-8">
			 <div class="card">
			   <div class="page-content">
				  <center> <h4>Juste Pour Tester...</h4> </center>
				<center>   
				 <p> <h1>Bienvenue</h1> <h3><?php echo $_SESSION['var3admin'] ?> <?php echo $_SESSION['var2admin'] ?> </h3> </p> 
				 <h5>FONCTION: <?php echo $_SESSION['var4admin'] ?></h5>		 
				</centre>
				
			  </div>
			 </div> 
			</div>
		
			 <div class="col-md-4">
			  <div class="card">
               
                  <div class="card-body">
                    <div class="media">
                      <span class="avatar avatar-xxl mr-5" id="adminimg" style="background-image: url(../photo/<?php echo $_SESSION['var1admin'] ?>)"></span>
					  
					  <div class="media-body" id="adminfonom">				  
                        <h4 class="m-0"><?php echo $_SESSION['var2admin'] ?> <?php echo $_SESSION['var3admin'] ?></h4>
                        <p class="text-muted mb-0"> <span class="status-icon bg-success"></span> <?php echo $_SESSION['var4admin'] ?></p>
                      </div>
                    </div>
					  <br>
					 <p class="text-muted mb-0"> <i class="fe fe-user"> </i> Username : <?php echo $_SESSION['var7admin'] ?></p>
					 <p class="text-muted mb-0"> <i class="fe fe-home"> </i> Site : <?php echo $_SESSION['var6admin'] ?></p>
				     <p class="text-muted mb-0"> <i class="fe fe-tag"> </i> Fonction : <?php echo $_SESSION['var4admin'] ?></p>
					 <p class="text-muted mb-0"> <i class="fe fe-mail"> </i> Email : <?php echo $_SESSION['var8admin'] ?></p>
                  </div>
            
			  </div>
			 </div>
		 
		</div> 
	   </div>
      </div>	   
		
	   </div>
	   
    </div>
	
  </body>
</html>
