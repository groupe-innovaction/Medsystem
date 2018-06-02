<?php
include("../bd/connect.php");
if(isset($_POST['completerDossier'])){

$taille=htmlentities($_POST['taille']);
$poids=htmlentities($_POST['poids']);
$tensionArt=htmlentities($_POST['tensionArt']);
$pouls=htmlentities($_POST['pouls']);
$motifConsultation=htmlentities($_POST['motifConsultation']);
$observation=htmlentities($_POST['observation']);
$dateConsultation=date("d F Y H:i:s");
$consulterParnom=$_SESSION['var2inf'];
$consulterParprenom=$_SESSION['var3inf'];

$siteDuConsulation=$_SESSION['var6inf'];
$id_duPatient=$don['idPatient'];


if(!empty($_POST['taille']) AND !empty($_POST['poids']) AND !empty($_POST['tensionArt']) AND !empty($_POST['pouls'])
AND !empty($_POST['motifConsultation'])) {
	
		 $req=$conbd->prepare("INSERT INTO Dossiers(taille,poids,tensionArt,pouls,motifConsultation,observation,dateConsultation,consulterParnom,consulterParprenom,siteDuConsulation,id_duPatient) VALUES(?,?,?,?,?,?,?,?,?,?,?)");	
		 $req->execute(array($taille,$poids,$tensionArt,$pouls,$motifConsultation,$observation,$dateConsultation,$consulterParnom,$consulterParprenom,$siteDuConsulation,$id_duPatient));		
		
		if($req){
			 $CDok="Le Dossier Completé Avec Succès";
		 }else{
			 $CDNo="Dossier non Completé";
		 }	
	
}else{
	 
	 $erreurCDossier= "Veuillez Completer Les champs obligatoires";
	
}

	
}

?>