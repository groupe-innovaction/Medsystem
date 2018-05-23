	
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
	   
      <div class="">
	    <div class="container">
		    <br>
            <div class="positionadm">
              <p> <a href="superadminpage.php"><i class="fe fe-home"> </i> Acceuil </a> <i class="fe fe-chevron-right"> </i> Voir Dossier </p>
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
			 <div class="dossierImprimer">
		       <span onclick="myFunction()"> <i class="fe fe-printer"></i> Imprimer </span> <span> <i class="fe fe-edit"></i> Modifier  </span>
		     </div>	
           <?php
		   include("bd/connect.php");
          if(!isset($_GET['idDossier']))
          {
          header('location:superadminpage.php');
          }
          else{
          $id_dossier=intval($_GET['idDossier']);
          }
          $req=$conbd->query('SELECT * FROM dossiers WHERE idDossier = "'.$id_dossier.'"');

          $don=$req->fetch(); 
            if(isset($don['idDossier'])){ ?>	
			
			 <div class="Cprescription">
			 	<?php include("Traitement/validerprescription.php") ?>
			 </div>	
			 
	    <div class="row">
		  <div id="dossiercomplet" class="col-md-12">
		   <div class="card">
				   <div class="card-body" style="background-color:#dee1f9;">
					<div class="enteteprofil">
					<br>
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
				   </div> 	   
		      <div class="dossierinfo1">
			   <p> <i class="fe fe-folder"></i> Dossier Médicale De <?php echo $don['prenomDossier'];?> <?php echo $don['nomDossier'];?> </p>
			  </div> 
		      <div class="dossierinfo2">
			   <p> Créer Le <?php echo $don['dateCreationDossier'];?> </p>
			  </div> 			  

                  <div id="ttrDossier">
                    <span> INFORMATIONS PERSONNELLES </span>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead id="styletable">
                        <tr>
                          <th>No.</th>
						  <td><?= $don['idDossier'] ?></td>
						</tr>  
						<tr>
                          <th>Nom</th>
						  <td><?= $don['nomDossier'] ?></a></td>
						</tr> 
						<tr>
                          <th>Prenom</th>
						  <td><?= $don['prenomDossier'] ?></td>
						</tr> 
						<tr>
                          <th>Date De Naissance</th>
						  <td><?= $don['datedenaissanceDossier'] ?></td> 
                        </tr>
						<tr>
                          <th>Lieu De Naissance</th>
						  <td><?= $don['lieudenaissanceDossier'] ?></td> 
                        </tr>
						<tr>
                          <th>Adresse</th>
						  <td><?= $don['adresseDossier'] ?></td> 
                        </tr>
						<tr>
                          <th>Telephone</th>
						  <td><?= $don['telephoneDossier'] ?></td> 
                        </tr>
						<tr>
                          <th>Statut Matrimoniale</th>
						  <td><?= $don['statutmDossier'] ?></td> 
                        </tr>
						<tr>
                          <th>Profession</th>
						  <td><?= $don['professionDossier'] ?></td> 
                        </tr>
						<tr>
                          <th>Personne De Reference</th>
						  <td><?= $don['referenceDossier'] ?></td> 
                        </tr>
						<tr>
                          <th>Numero Telephone</th>
						  <td style="border-bottom:1px solid #DDD;"><?= $don['telephonerferenceDossier'] ?></td> 
                        </tr>						
                      </thead>
                    </table>
                </div>			  
                      </br>				
                  <div id="ttrDossier">
                    <span> Antécédents</span>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table text-nowrap">
                      <thead id="styletable"> 
						<tr>
                          <th>Antécédents Médicaux</th>
						  <td><?= $don['antmedicaux'] ?></td> 
                        </tr>
						<tr>
                          <th>Antécédents Churigicaux</th>
						  <td><?= $don['antchurigicaux'] ?></td> 
                        </tr>
						<tr>
                          <th>Antécédents Familiaux</th>
						  <td><?= $don['antecedentf'] ?></td> 
                        </tr>
						<tr>
                          <th>Allergies Et Intolérence</th>
						  <td style="border-bottom:1px solid #DDD;"><?= $don['allergies'] ?></td> 
                        </tr>						
                      </thead>
                    </table>
                </div>
                      </br>				
                  <div id="ttrDossier">
                    <span> Biometrie</span>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table text-nowrap">
                      <thead id="styletable"> 
						<tr>
                          <th>Taille</th>
						  <td><?= $don['taille'] ?></td> 
                        </tr>
						<tr>
                          <th>Poids</th>
						  <td><?= $don['poids'] ?></td> 
                        </tr>
						<tr>
                          <th>Groupe Sanguin</th>
						  <td><?= $don['groupesanguin'] ?></td> 
                        </tr>
						<tr>
                          <th>Indicateurs Biologique</th>
						  <td style="border-bottom:1px solid #DDD;"><?= $don['indicateursbiologique'] ?></td> 
                        </tr>						
                      </thead>
                    </table>
                </div>	
                      </br>							
                  <div id="ttrDossier">
                    <span> Ordonnances</span>
                  </div>
                  <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                      <thead>
                        <tr>
                          <th>Date Du Prescription</th>
                          <th>Prescription</th>
                          <th>Prescrit Par</th>
                        </tr>
                      </thead>
                      <tbody>
				  <?php 
				     $req=$conbd->query('SELECT * FROM prescriptions WHERE id_Dossier = "'.$don['idDossier'].'"');
                     while($don=$req->fetch()){?>			
                        <tr>
                          <td>
                            <?= $don['dateDuPrescription'] ?>
                          </td>
                          <td>
                            <?= $don['prescription'] ?>
                          </td>
                          <td>
                            Dr <?= $don['PrenomAuteurPrescription'] ?> <?= $don['NomAuteurPrescription'] ?>
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
	
          <?php
          }else{
             header('location:superadminpage.php');
          }
          ?>
		  
			<div id="fixe">
			  <div id="myBtnModal"> <i class="fe fe-edit-3"> </i> </div>
			</div>	
			<div id="myModal" class="Mainmodal">

			  <!-- Modal content -->
			  <div class="contentmodal">
				<span class="closeModal">&times;</span>
				</br>
				<p id="ContenuModal">Faire Une Prescription</p>
				</br>
				<form method="POST">
                    <div class="col-sm-12 col-md-12">
                      <div class="form-group">
                        <label class="form-label">Prescription<span class="obligatoire">*</span></label>                  
                         <textarea name="prescription" class="form-control" placeholder="Notez Les Medicaments et leurs posologie..." rows="6" cols="47"value=""></textarea>
					  </div>
                    </div>	
					<div class="text-center">
					 <button type="submit" name="submitprescription" class="btn btn-primary"/> <i class="fe fe-check"> </i> Valider La Prescription  </button>
					</div>					
				</form>
			  </div>

			</div>			
		</div> 
      </div>
    </div>	
  </body>
 <script>
function myFunction() {
    window.print();
}
</script> 
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
<script>
var modal = document.getElementById('myModal');

var btn = document.getElementById("myBtnModal");

var span = document.getElementsByClassName("closeModal")[0];
btn.onclick = function() {
    modal.style.display = "block";
}
span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>
 
		
