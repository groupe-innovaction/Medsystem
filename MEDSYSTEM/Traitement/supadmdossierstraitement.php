<?php
include("bd/connect.php");
if(isset($_POST['submitdossier'])){
	
	$nomDossier=htmlspecialchars($_POST['nomDossier']);
	$prenomDossier=htmlspecialchars($_POST['prenomDossier']);
	$datedenaissanceDossier=htmlspecialchars($_POST['datedenaissanceDossier']);
	$lieudenaissanceDossier=htmlspecialchars($_POST['lieudenaissanceDossier']);
	$adresseDossier=htmlspecialchars($_POST['adresseDossier']);
	$telephoneDossier=htmlspecialchars($_POST['telephoneDossier']);
	$statutmDossier=htmlspecialchars($_POST['statutmDossier']);
	$professionDossier=htmlspecialchars($_POST['professionDossier']);
	$referenceDossier=htmlspecialchars($_POST['referenceDossier']);
	$telephonerferenceDossier=htmlspecialchars($_POST['telephonerferenceDossier']);
	$antmedicaux=htmlspecialchars($_POST['antmedicaux']);
	$antchurigicaux=htmlspecialchars($_POST['antchurigicaux']);
	$antecedentf=htmlspecialchars($_POST['antecedentf']);
	$allergies=htmlspecialchars($_POST['allergies']);
	$taille=htmlspecialchars($_POST['taille']);
	$poids=htmlspecialchars($_POST['poids']);
	$groupesanguin=htmlspecialchars($_POST['groupesanguin']);
	$indicateursbiologique=htmlspecialchars($_POST['indicateursbiologique']);
	$dateCreationDossier=date('d F Y');
	$nomAuteurDossier=$_SESSION['var4'];	
	$prenomAuteurDossier=$_SESSION['var2'];
	$idRendezVous="";
	

	
	if(!empty($_POST['nomDossier']) AND !empty($_POST['prenomDossier']) AND !empty($_POST['datedenaissanceDossier']) AND 
	!empty($_POST['lieudenaissanceDossier']) AND !empty($_POST['adresseDossier']) AND !empty($_POST['telephoneDossier']) AND 
	!empty($_POST['statutmDossier']) AND !empty($_POST['professionDossier']) AND !empty($_POST['referenceDossier']) AND 
	!empty($_POST['telephonerferenceDossier'])){
		
		 $req=$conbd->prepare("INSERT INTO dossiers(nomDossier,prenomDossier,datedenaissanceDossier,lieudenaissanceDossier,adresseDossier,telephoneDossier,statutmDossier,professionDossier,referenceDossier,telephonerferenceDossier,antmedicaux,antchurigicaux,antecedentf,allergies,taille,poids,groupesanguin,indicateursbiologique,dateCreationDossier,nomAuteurDossier,prenomAuteurDossier,idRendezVous) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
		 $req->execute(array($nomDossier,$prenomDossier,$datedenaissanceDossier,$lieudenaissanceDossier,$adresseDossier,$telephoneDossier,$statutmDossier,$professionDossier,$referenceDossier,$telephonerferenceDossier,$antmedicaux,$antchurigicaux,$antecedentf,$allergies,$taille,$poids,$groupesanguin,$indicateursbiologique,$dateCreationDossier,$nomAuteurDossier,$prenomAuteurDossier,$idRendezVous));		
		 if($req){
			 $CreationDok="Le Dossier Est Crée Avec Succès";
		 }else{
			 $CreationDNo="Creation De Dossier Echoué";
		 }
	}else{
		$DChampvide="Les Champs Marqués * sont Obligatoires Veuillez Les completer Tous";
	}		
}

?>