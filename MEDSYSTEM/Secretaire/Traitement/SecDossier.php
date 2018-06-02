<?php
include("../bd/connect.php");
if(isset($_POST['submitdossierSEC'])){
	
	$nomDossier=htmlspecialchars($_POST['nomDossier']);
	$prenomDossier=htmlspecialchars($_POST['prenomDossier']);
	$datedenaissanceDossier=htmlspecialchars($_POST['datedenaissanceDossier']);
	$datedenaissanceDossier=date('d F Y');
	$lieudenaissanceDossier=htmlspecialchars($_POST['lieudenaissanceDossier']);
	$adresseDossier=htmlspecialchars($_POST['adresseDossier']);
	$telephoneDossier=htmlspecialchars($_POST['telephoneDossier']);
	$statutmDossier=htmlspecialchars($_POST['statutmDossier']);
	$professionDossier=htmlspecialchars($_POST['professionDossier']);
	$referenceDossier=htmlspecialchars($_POST['referenceDossier']);
	$telephonerferenceDossier=htmlspecialchars($_POST['telephonerferenceDossier']);
	
	$antmedicaux=htmlentities($_POST['antmedicaux']);
	$antchurigicaux=htmlentities($_POST['antchurigicaux']);
	$antecedentf=htmlentities($_POST['antecedentf']);
	$allergies=htmlentities($_POST['allergies']);
	
	$services=htmlentities($_POST['services']);
	$taille=htmlentities($_POST['taille']);
	$poids=htmlentities($_POST['poids']);
	$groupesanguin=htmlentities($_POST['groupesanguin']);
	$indicateursbiologique=htmlentities($_POST['indicateursbiologique']);
	$SiteCreationDossier=$_SESSION['var6sec'];
	
    
	$dateCreationDossier=date('d F Y');
	$nomAuteurDossier=$_SESSION['var2sec'];	
	$prenomAuteurDossier=$_SESSION['var3sec'];
	$idRendezVous="";
	

	
	if(!empty($_POST['nomDossier']) AND !empty($_POST['prenomDossier']) AND !empty($_POST['datedenaissanceDossier']) AND 
	!empty($_POST['lieudenaissanceDossier']) AND !empty($_POST['adresseDossier']) AND !empty($_POST['telephoneDossier']) AND 
	!empty($_POST['statutmDossier']) AND !empty($_POST['professionDossier']) AND !empty($_POST['referenceDossier']) AND 
	!empty($_POST['telephonerferenceDossier']) AND !empty($_POST['services'])AND !empty($_POST['taille'])
	AND !empty($_POST['poids'])AND !empty($_POST['groupesanguin'])){
		
		 $req=$conbd->prepare("INSERT INTO dossiers(nomDossier,prenomDossier,datedenaissanceDossier,lieudenaissanceDossier,adresseDossier,telephoneDossier,statutmDossier,professionDossier,referenceDossier,telephonerferenceDossier,antmedicaux,antchurigicaux,antecedentf,allergies,taille,poids,groupesanguin,indicateursbiologique,services,dateCreationDossier,SiteCreationDossier,nomAuteurDossier,prenomAuteurDossier,idRendezVous) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
		 $req->execute(array($nomDossier,$prenomDossier,$datedenaissanceDossier,$lieudenaissanceDossier,$adresseDossier,$telephoneDossier,$statutmDossier,$professionDossier,$referenceDossier,$telephonerferenceDossier,$antmedicaux,$antchurigicaux,$antecedentf,$allergies,$taille,$poids,$groupesanguin,$indicateursbiologique,$services,$dateCreationDossier,$SiteCreationDossier,$nomAuteurDossier,$prenomAuteurDossier,$idRendezVous));		
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