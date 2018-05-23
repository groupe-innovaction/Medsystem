<?php
include("bd/connect.php");
if(isset($_POST['submitprescription'])){
	$prescription=htmlspecialchars($_POST['prescription']);

   $req=$conbd->query('SELECT * FROM dossiers WHERE idDossier = "'.$id_dossier.'"');
   while($don=$req->fetch()){ 
                       
   $NumDossier= $don['idDossier']; 
   $Nom_P =$don['nomAuteurDossier'];
   $Prenom_P =$don['prenomAuteurDossier'];
   $dateDuPrescription=date("d F Y");
   
   	 $req=$conbd->prepare("INSERT INTO prescriptions(prescription,NomAuteurPrescription,PrenomAuteurPrescription,dateDuPrescription,id_Dossier) VALUES(?,?,?,?,?)");	
	 $req->execute(array($prescription,$Nom_P,$Prenom_P,$dateDuPrescription,$NumDossier));
	 if($req){
		 
		 echo"Oooooook";
		 
	 }else{
		 
		 echo"Nooooooo";
		 
	 }
	 

}
 }
 ?>

