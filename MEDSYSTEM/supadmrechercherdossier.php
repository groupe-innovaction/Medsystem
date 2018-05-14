
		
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
	<meta charset="utf-08">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>MEDSYSTEM | DOSSIER</title>
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
  <body>
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
				   <li><a href=''> <i class="fe fe-folder"> </i> Dossiers</a>
					  <ul>
						 <li><a href='supadmcreationdossiers.php'>Creer Dossier</a></li>
						 <li><a href='supadmrechercherdossier.php'>Rechercher Dossier</a></li>
					  </ul>
				   </li>
				   <li><a href='#'> <i class="fe fe-folder-plus"> </i> Rendez-vous</a>
					   <ul>
						 <li><a href='supadmprendrerendezvous.php'>Prendre Rendez-vous</a></li>
						 <li><a href='supadmlisterrendezvous.php'>Lister Rendez-vous</a></li>
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
	   
      <div class="">
	    <div class="container">
		    <br>
            <div class="positionadm">
              <p> <a href="superadminpage.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i> Rechercher Dossier </p>
            </div>
			<div class="rechercheDossier">
				   <div class="col-md-12">
					 <div class="col-sm-9 barecherche container">
				      <center>
				       <input type="text" name="search_text" id="search_text" placeholder="RECHERCHER DOSSIER"/>
					  </center>
					 </div>  
             
                     <div class="row">
                      <center> 					   
				        <div class="reponserecherche" id="resultRechercheDossier"></div>
					  </center>
					 </div>				  
                   </div>			
			</div>
			
	    <div class="row">

		</div>		
			
		</div> 
      </div>


    </div>
	
  </body>
 <script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"Traitement/rechercherDossiers.php",
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
</html>
 
		
