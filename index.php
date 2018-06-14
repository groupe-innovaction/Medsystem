<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MEDHAÏTI</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="webcss/one-page-wonder.min.css" rel="stylesheet">
	<link href="webcss/style.css" rel="stylesheet">
	<link href="webcss/scrolling-nav.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top" id="back_menu">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger"> <img src="images/LOGO.png" style="width:150px; height:23px;" class="navbar-brand-img"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" id="menutxt" href="#about">A PROPOS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" id="menutxt" href="#services">SEVICES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" id="menutxt" href="#contact">CONTACT</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" id="menutxt" href="#Rendezvous">RENDEZ-VOUS</a>
            </li>			
          </ul>
        </div>
      </div>
    </nav>

    <header id="backheader" style="bacKground-image: url(images/bg1.jpg); background-size:cover;">
      <div class="container text-center">
        <h1>Bienvenue sur le site de MEDHAÏTI</h1>
        <p class="lead">MEDHAÏTI une hopitale de référence...</p>
      </div>
    </header>	

    <section id="about">
      <div class="container">
	   <div class="row">
        <div class="align-items-center">
          <div class="col-md-12">
              <h2 class="display-7" id="mainrdv">A Propos de MEDHAÏTI</h2>
              <p><b>Mission</b><br>
               L’hôpital a pour mission d’assurer le diagnostic, le traitement et la surveillance des malades, des blessés, 
			   des femmes enceintes en tenant compte des aspects psycho-sociaux du patient.</p>
              <p><b>Vision</b><br>
               Notre vision est de fournir des services aux standards les plus élevés conformément aux données acquises de la 
               science médicale; de fournir de la formation continue et de contribuer à la recherche.</p>
              <p><b>Nos valeurs</b><br>
			   1 - Satisfaire l’être humain conformément aux principes fondamentaux de l’éthique<br>
			   2 - Faire équipe avec les agents de santé du pays<br>
			   3 - Satisfaire les patients et le personnel</p>
              <p><b>Notre Politique de qualité</b><br>
			   Conformément aux principes éthiques, nous nous focalisons sur la satisfaction des patients et du personnel. 
			   Avec une formation continue et une technologie moderne, nous pouvons aider les acteurs de santé du Mali à 
			   améliorer la qualité de l’accomplissement de l’obligation médicale.</p>			   
          </div>
        </div>
		</div>
      </div>
    </section>

    <section id="services">
      <div class="container">
        <div class="align-items-center">
            <div class="">
              <h2 class="display-7"  id="mainrdv"><center>Services</center></h2>
              <p>Le Centre Hospitalier du Nord-Mayenne dispose d’un service d’imagerie médicale 
			  doté de trois salles de radiologie standard numérisées, d’un scanner multi-barettes de dernière génération, 
			  d’un mamographe, d’un échographe et d'une IRM 1.5 Tesla dans le cadre du GIE IRM 53.</p>
            </div>
        </div>
      </div>
    </section>

    <section id="contact">
      <div class="container">
        <div class="row align-items-center" >
    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-9">
               <h2 class="display-7"  id="mainrdv">Contactez-nous</h2>
			   <?php include("Traitement/envoyermail.php"); ?>
                <form id="contactForm" method="POST">
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Nom <span class="obligatoire">*</span></label>
                            <input type="text" class="form-control" name="nom" placeholder="Entrer Nom">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Telephone <span class="obligatoire">*</span></label>
                            <input type="tel" class="form-control" name="telephone" placeholder="Numero Telephone">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>					
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email <span class="obligatoire">*</span></label>
                            <input type="email" class="form-control" name="mail" placeholder="Addresse Email">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message <span class="obligatoire">*</span></label>
                            <textarea rows="5" class="form-control" name="message" placeholder="Message"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="">
                        <div class="form-group col-xs-12">
                            <button id="btnform" type="submit" class="btn btn-default" name="btnformmail"> Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>

    </section>
	
	
    <section id="Rendezvous">
      <div class="container">
	  				  <h2 class="display-7" id="mainrdv"><center>Demande de rendez-vous</center></h2>
                     <div class="col-sm-12 col-md-12"> 
                     <div class="messrdv">                 
						  <span>Ce formulaire vous permet de faire une demande de rendez-vous en ligne, Nous vous contacterons ensuite par Telephone ou Email dans les meilleurs delais afin de fixer definitement avec vous la date et l'heure du rendez-vous...Merci!!!</span>
						  <br>
                      </div>
                    </div> 
					 <?php include("Traitement/validerrendezvous.php"); ?>
					 <span class="messageerreur"> 
						<p><?php if(isset($rdvincorrect)){echo $rdvincorrect;}?> </p>
					 </span>
					 <span class="messageerreurrdv2">
					   <p> <?php if(isset($rdvcorrect)){echo $rdvcorrect;}?> </p>
						<?php if(isset($rdvechoue)){echo $rdvechoue;}?>
					 </span>					 					
        <div class="align-items-center">
              <form class="card" method="POST" id="formstyle" action="">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6 col-md-6 offset-6">
                      <div class="form-group">
                        <label class="form-label">Entrer votre identifiant Patient si vous en avez déjà un</label>
                        <input type="text" name="identifiantPatient" class="form-control" placeholder="Identifiant fournit par l'hopital" value="<?php if(isset($identifiantPatient)){echo $identifiantPatient;} ?>">
 					   <span class="messageerreur">
					   <?php if(isset($vuID)){echo $vuID;} ?>
					   </span>	                    
					</div>				  
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Nom <span class="obligatoire">*</span></label>
                        <input type="text" name="nomrdv" class="form-control" placeholder="Enter Nom" value="<?php if(isset($nomrdv)){echo $nomrdv;} ?>">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">prenom <span class="obligatoire">*</span></label>
                        <input type="text" name="prenomrdv" class="form-control" placeholder="Entrer Prenom" value="<?php if(isset($prenomrdv)){echo $prenomrdv;} ?>">
                      </div>
                    </div>	
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Numero Telephone <span class="obligatoire">*</span></label>
                        <input type="tel" name="telephonerdv" class="form-control" placeholder="Entrer Numero Telephone" value="<?php if(isset($telephonerdv)){echo $telephonerdv;} ?>">
                            <span class="messageerreur"></span>
                      </div>
                    </div>					
                    <div class="col-sm-6 col-md-6">
                    <div class="form-group">
                        <label class="form-label">Date De Naissance <span class="obligatoire">*</span></label>
                           <input type="date" class="form-control" name="daternaissancerdv" placeholder="Date De Naissance" value="<?php if(isset($daternaissancerdv)){echo $daternaissancerdv;} ?>">  
                    </div>
                    </div> 
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Indiquer la specialite dans laquelle vouz souhaitez consulter <span class="obligatoire">*</span></label>
                        <select name="Departementrdv" class="form-control">
						  <option value=""></option>
                          <option value="Ophtalmologie">Ophtalmologie</option>
                          <option value="Gynecologique">Gynecologique</option>
						  <option value="Pediatrie">Pediatrie</option>
                        </select>                      
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Email <span class="obligatoire">*</span></label>
                        <input type="email" name="mailrdv" class="form-control" placeholder="Entrer Email" value="<?php if(isset($mailrdv)){echo $mailrdv;} ?>">                     
 					   <span class="messageerreur">
					   <?php if(isset($emailrdvincorrect)){echo $emailrdvincorrect;} ?>
					   </span>	                    
					 </div>			  
                    </div>
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Sexe <span class="obligatoire">*</span></label>
                        <select name="sexerdv" class="form-control">
						  <option value="<?php if(isset($sexerdv)){echo $sexerdv;} ?>"><?php if(isset($sexerdv)){echo $sexerdv;} ?></option>
                          <option value="Masculin">Masculin</option>
                          <option value="Feminin">Feminin</option>
                        </select>                      
                      </div>
                    </div>		
                    <div class="col-sm-6 col-md-6">
                      <div class="form-group">
                        <label class="form-label">Site <span class="obligatoire">*</span></label>
                        <select name="siterdv" class="form-control">
                          <option value="<?php if(isset($siterdv)){echo $siterdv;} ?>"><?php if(isset($siterdv)){echo $siterdv;} ?></option>						  
                          <option value="Ouest">Ouest</option>						
                          <option value="Artibonite">Artibonite</option>
                          <option value="Centre">Centre</option>
                        </select>                      
                      </div>
                    </div>						
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Motif De la Consulatation / Symptomes <span class="obligatoire">*</span></label>                  
                         <textarea name="Symptomesrdv" class="form-control" placeholder="Soyez Bref..." rows="6" cols="47"value="<?php if(isset($Symptomesrdv)){echo $Symptomesrdv;} ?>"></textarea>
					  </div>
                    </div>  
                    <div class="col-sm-12 col-md-12">
                        <p class="form-label"><b>Utilisation de vos données personnelles</b></p>						
                         <span>Les données personnelles recueillies dans le cadre de ce formulaire font l'objet d'un traitement informatique et sont destinées aux services du Centre Hospitalier MEDHAITI en charge de traiter votre demande. Elles ne sont en aucun cas réutilisées à d'autres fins.
                            Vous disposez d’un droit d’accès et de rectification conformément à la loi informatique et libertés.</span>
                    </div> 					
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" id="btnform" name="submit" class="btn btn-default"> <i class="fe fe-check-circle"> </i> Valider La Demande</button> 
                </div>
           </form>	
        </div>
      </div>
    </section>	


    <footer class="py-5" id="piedsdepage1">

    </footer>
    <div id="piedsdepage2">
	     <br><br>
        <p>Tous droits réservés MEDSYSTEM 2018</p>
    </div>		

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>	
	
    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>	

  </body>

</html>
