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
				   <li><a href='index.php'> <i class="fe fe-user-plus"> </i> Patient</a>
				   </li>
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
          if(!isset($_GET['idPatient']))
          {
          header('location:index.php');
          }
          else{
          $idp=intval($_GET['idPatient']);
          }
          $req=$conbd->query('SELECT * FROM patients WHERE idPatient = "'.$idp.'"');

          $don=$req->fetch(); 
            if(isset($don['idPatient'])){ ?>
			
      <div class="page-content">
       <div class="container">
	   
            <div class="positionadm">
              <p> <a href="index.php"> <i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i> Lister Patients </p>
            </div>
			
			<div class="alert alert-primary alert-dismissible">
				<button type="button" class="close" data-dismiss="alert"></button>
				 <b>Les informations et les operations auxquelles vous avez accès sont relatives uniquement pour le centre dans lequel vous travaillez.</b>
			</div>
	   <div class="">	   
			       
 				  
						  <?php
							date_default_timezone_set('America/Port-au-Prince');
							$date = date('d F Y');
						  ?>
					     
				 				  <?php /*
				            include("../bd/connect.php");
				            $totalrdv = $conbd->query('SELECT * FROM patients WHERE idPatient = "'.$idp.'"');
							$totaledemande = $totalrdv->rowcount(); */
				                ?>
					  <br>
                <div class="card">
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Telephone</th>
                          <th>Adresse</th>
                          <th>Date De Naissance</th>
                          <th>Profession</th>
						  <th>Site</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
						 <?php
						   $req=$conbd->query('SELECT * FROM patients WHERE idPatient = "'.$idp.'" AND dateCreationPatient="'.$date.'"');
						   while($don=$req->fetch()){
                        ?>			
                        <tr>
                          <td><span class="text-muted">  <span class="status-icon bg-success"></span> <?= $don['idPatient'] ?></span></td>
                          <td><a href="invoice.html" class="text-inherit"><?= $don['nomPatient'] ?></a></td>
                          <td>
                            <?= $don['prenomPatient'] ?>
                          </td>
                          <td>
                            <?= $don['telephonePatient'] ?>
                          </td>
                          <td>
                            <?= $don['adressePatient'] ?>
                          </td>
                          <td>
                            <?= $don['datedenaissancePatient'] ?>
                          </td>
                          <td>
						    <?= $don['professionPatient'] ?>
						  </td>
                          <td>
						    <?= $don['SiteCreationPatient'] ?>
						  </td>						  
                          <td class="text-right">
                            <a href="" id="btnvaliderdv" class="btn btn-secondary btn-sm"><i class="fe fe-arrow-right" data-toggle="tooltip" title="Consulter"></i></a>
                          </td>						  
                        </tr>
						 <?php 
						 } 
						 
						 ?>
                      </tbody>
                    </table>
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
