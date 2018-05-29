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
				   <li><a href='index.php'> <i class="fe fe-folder"> </i> Dossiers</a>

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
	   
      <div class="page-content">
       <div class="container">
	   
            <div class="positionadm">
              <p> <a href="index.php"><i class="fe fe-home"> </i> Acceuil </a>  <i class="fe fe-chevron-right"> </i> Modifier Profile</p>
            </div>
			
			<div class="dossiertete">
			  <p>Modifier Informations Personnelles</p>
			</div>
			
            <form method="POST" enctype="multipart/form-data">
			  <div class="col-md-12">
			      <center>
			  		<?php include("Traitement/modifierProfiilesec.php"); ?>
				  </center>		
				 <div class="row">
					<div class="col-md-2"></div>
					  <div class="card col-md-8">  
					     <div class="form-group">
                           <center>
							<script src="../js/jquery.min.js"></script>
							  <br>
						  <?php $req=$conbd->query('SELECT * FROM logintable WHERE idlogin="'.$_SESSION['var5sec'].'"'); 
						        while($don=$req->fetch()){
                           ?> 							  
							 <div id="profile-container">
							   <image id="profileImage" src="../Photo/<?php echo $don['photoutilisateur']; ?>"/>
							 </div>
                             <input id="imageUpload" type="file" name="Nouveauphotoutilisateur" value="<?if(isset($photoutilisateur)){echo $photoutilisateur;}?>" >
                           </center>
                          </div>

						   <div class="form-group">
							 <label class="form-label">Username <span class="obligatoire">*</span></label>
								<input type="text" name="Nouveauusernamesec" class="form-control" placeholder="Enter Nom" value="<?php echo $don['username']; ?>">
						   </div>					  
						   <div class="form-group">
							 <label class="form-label">Password <span class="obligatoire">*</span></label>
								<input type="password" name="Nouveaupasswordsec" class="form-control" placeholder="Enter Nom" value="">
						   </div>				
						   <div class="form-group">
							 <label class="form-label">Confirmer Password <span class="obligatoire">*</span></label>
								<input type="password" name="CNouveaupasswordsec" class="form-control" placeholder="Enter Nom" value="">
						  </div>
						  <?php
							}
						  ?>
                          <br><br>						  
				   <div class="card-footer text-right">
					  <button type="submit" name="SECmodifierProfil" class="btn btn-primary"> <i class="fe fe-edit"></i> Modifier</button>
				  </div>						  
				 </div>
			   </div>
			 </div>
		   </form> 
		
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
