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

    <title>MEDSYSTEM | LISTER RENDEZ-VOUS</title>
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
						 <li><a href=''>Lister Rendez-vous</a></li>
					  </ul>  
				   </li>
		       </ul>
		     </div>
		  </div>
       </div>  
	   <div class="container">
	       <br>
         <div class="positionadm">
          <p> <a href="index.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i> Lister Rendez-vous</p>
         </div>	
        <?php include("../bd/connect.php"); ?>
		
			<div class="listerdvtab1">
			   <ul class="tab">
				  <li><a href="#" class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Valide</a></li>
				  <li><a href="#" class="tablinks" onclick="openCity(event, 'Paris')">Demande</a></li>
			   </ul>

				<div id="London" class="tabcontent">
				  <h4 style="text-transform:uppercase;">
				  <?php
        date_default_timezone_set('America/Port-au-Prince');
		$date = date('d F Y');
		Print("$date");
				  ?>
				  </h4>
				 <div class="row">
				 				  <?php
				            $totalrdv = $conbd->query("SELECT * FROM rendezvous WHERE Etatrdv='Valide' AND Annulerrdv='Non' AND siterdv='".$_SESSION['var6admin']."'");
							$totaledemande = $totalrdv->rowcount();
				                ?>	
                <div class="card">
                  <div class="card-header">
                    <h3 id="tiredemande1" class="card-title"><b> <?php echo $totaledemande; ?></b> Rendez-vous</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Departement</th>
                          <th>Site</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
						 <?php
						   $req=$conbd->query("SELECT * FROM rendezvous WHERE Etatrdv='Valide' AND Annulerrdv='Non' AND siterdv='".$_SESSION['var6admin']."' ORDER BY idRDV DESC");
						   while($don=$req->fetch()){
                        ?>			
                        <tr>
                          <td><span class="text-muted">  <span class="status-icon bg-success"></span> <?= $don['idRDV'] ?></span></td>
                          <td><a href="invoice.html" class="text-inherit"><?= $don['nomrdv'] ?></a></td>
                          <td>
                            <?= $don['prenomrdv'] ?>
                          </td>
                          <td>
                            <?= $don['telephonerdv'] ?>
                          </td>
                          <td>
                            <?= $don['mailrdv'] ?>
                          </td>
                          <td>
                            <?= $don['Departementrdv'] ?>
                          </td>
                          <td><?= $don['siterdv'] ?></td>
                          <td class="text-right">
                            <a href="" id="btnvaliderdv" class="btn btn-secondary btn-sm">Créer Dossier</a>
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

				<div id="Paris" class="tabcontent">
			<div class="row">
				 				  <?php
				            $totalrdv = $conbd->query("SELECT * FROM rendezvous WHERE Etatrdv='Demande' AND Annulerrdv ='Non' AND siterdv='".$_SESSION['var6admin']."' ORDER BY idRDV ASC");
							$totaledemande = $totalrdv->rowcount();
				                ?>	
                <div class="card">
                  <div class="card-header">
                    <h3 id="tiredemande2" class="card-title"><b> <?php echo $totaledemande; ?></b> Demande(s) De Rendez-vous</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Departement</th>
                          <th>Site</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
						 <?php
						   $req=$conbd->query("SELECT * FROM rendezvous WHERE Etatrdv='Demande' AND Annulerrdv ='Non' AND siterdv='".$_SESSION['var6admin']."' ORDER BY idRDV ASC");
						   while($don=$req->fetch()){
                        ?>			
                        <tr>
                          <td><span class="text-muted">  <span class="status-icon bg-warning"></span> <?= $don['idRDV'] ?></span></td>
                          <td><a href="invoice.html" class="text-inherit"><?= $don['nomrdv'] ?></a></td>
                          <td>
                            <?= $don['prenomrdv'] ?>
                          </td>
                          <td>
                            <?= $don['telephonerdv'] ?>
                          </td>
                          <td>
                            <?= $don['mailrdv'] ?>
                          </td>
                          <td>
                            <?= $don['Departementrdv'] ?>
                          </td>
                          <td><?= $don['siterdv'] ?></td>
                          <td class="text-right">
                            <a href="EtatRendezvous.php?idRDV=<?php echo $don['idRDV']; ?>" id="btnvaliderdv" class="btn btn-secondary btn-sm">Validé</a>
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
			   
			   <br>
			   
			<div class="row">
				 				  <?php
				            $totalrdv = $conbd->query("SELECT * FROM rendezvous WHERE Annulerrdv = 'Oui' AND siterdv='".$_SESSION['var6admin']."' ORDER BY idRDV ASC");
							$totaledemande = $totalrdv->rowcount();
				                ?>	
                <form class="card" method="POST">
                  <div class="card-header">
                    <h3 id="tiredemande3" class="card-title"><b> <?php echo $totaledemande; ?></b> Demande(s) Annuler</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th class="w-1">No.</th>
                          <th>Nom</th>
                          <th>Prenom</th>
                          <th>Telephone</th>
                          <th>Email</th>
                          <th>Departement</th>
                          <th>Site</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
						 <?php
						   $req=$conbd->query("SELECT * FROM rendezvous WHERE Annulerrdv = 'Oui' AND siterdv='".$_SESSION['var6admin']."' ORDER BY idRDV ASC");
						   while($don=$req->fetch()){
                        ?>			
                        <tr>
                          <td><span class="text-muted">  <span class="status-icon bg-danger"></span> <?= $don['idRDV'] ?></span></td>
                          <td><a href="invoice.html" class="text-inherit"><?= $don['nomrdv'] ?></a></td>
                          <td>
                            <?= $don['prenomrdv'] ?>
                          </td>
                          <td>
                            <?= $don['telephonerdv'] ?>
                          </td>
                          <td>
                            <?= $don['mailrdv'] ?>
                          </td>
                          <td>
                            <?= $don['Departementrdv'] ?>
                          </td>
                          <td><?= $don['siterdv'] ?></td>
                          <td class="text-right">
						  <a href="EtatRendezvous.php?idRDV=<?php echo $don['idRDV']; ?>" id="btnvaliderdv2" class="btn btn-secondary btn-sm">Rajoutée</a>
                          </td>
                        </tr>
						 <?php 
						 } 
						 
						 ?>
                      </tbody>
                    </table>
                  </div>				  
                </form>
			   </div> 			   
			</div>
			</div>		
 
       </div>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
	}
	
    document.getElementById("defaultOpen").click();	
</script>		   
  </body> 
</html>
