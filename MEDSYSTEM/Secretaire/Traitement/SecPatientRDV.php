<?php
include("../bd/connect.php");
if(isset($_POST['submitPatientSEC'])){
	
	$nomPatient=htmlspecialchars($_POST['nomPatient']);
	$prenomPatient=htmlspecialchars($_POST['prenomPatient']);
	$datedenaissancePatient=htmlspecialchars($_POST['datedenaissancePatient']);
	/*$datedenaissancePatient=date('d F Y');*/
	$lieudenaissancePatient=htmlspecialchars($_POST['lieudenaissancePatient']);
	$adressePatient=htmlspecialchars($_POST['adressePatient']);
	$telephonePatient=htmlspecialchars($_POST['telephonePatient']);
	$statutmPatient=htmlspecialchars($_POST['statutmPatient']);
	$professionPatient=htmlspecialchars($_POST['professionPatient']);
	$referencePatient=htmlspecialchars($_POST['referencePatient']);
	$telephonerferencePatient=htmlspecialchars($_POST['telephonerferencePatient']);
	
	$antmedicauxPatient=htmlentities($_POST['antmedicauxPatient']);
	$antchurigicauxPatient=htmlentities($_POST['antchurigicauxPatient']);
	$antecedentfPatient=htmlentities($_POST['antecedentfPatient']);
	$allergiesPatient=htmlentities($_POST['allergiesPatient']);
	
	$taillePatient=htmlentities($_POST['taillePatient']);
	$poidsPatient=htmlentities($_POST['poidsPatient']);
	$groupesanguin=htmlentities($_POST['groupesanguin']);
	$indicateursbiologique=htmlentities($_POST['indicateursbiologique']);
	$SiteCreationPatient=$_SESSION['var6sec'];
	   
	$dateCreationPatient=date('d F Y');
	$nomAuteurPatient=$_SESSION['var2sec'];	
	$prenomAuteurPatient=$_SESSION['var3sec'];
	$idRendezVous=$don['idRDV'];
	
	
	if(!empty($_POST['nomPatient']) AND !empty($_POST['prenomPatient']) AND !empty($_POST['datedenaissancePatient']) AND 
	!empty($_POST['lieudenaissancePatient']) AND !empty($_POST['adressePatient']) AND !empty($_POST['telephonePatient']) AND 
	!empty($_POST['statutmPatient']) AND !empty($_POST['professionPatient']) AND !empty($_POST['referencePatient']) AND 
	!empty($_POST['telephonerferencePatient']) AND !empty($_POST['taillePatient'])
	AND !empty($_POST['poidsPatient'])AND !empty($_POST['groupesanguin'])){
		
		 $req=$conbd->prepare("INSERT INTO patients(nomPatient,prenomPatient,datedenaissancePatient,lieudenaissancePatient,adressePatient,telephonePatient,
		 statutmPatient,professionPatient,referencePatient,telephonerferencePatient,antmedicauxPatient,antchurigicauxPatient,antecedentfPatient,
		 allergiesPatient,taillePatient,poidsPatient,groupesanguin,indicateursbiologique,dateCreationPatient,SiteCreationPatient,nomAuteurPatient,
		 prenomAuteurPatient,idRendezVous) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");	
		 $req->execute(array($nomPatient,$prenomPatient,$datedenaissancePatient,$lieudenaissancePatient,$adressePatient,$telephonePatient,
		 $statutmPatient,$professionPatient,$referencePatient,$telephonerferencePatient,$antmedicauxPatient,$antchurigicauxPatient,$antecedentfPatient,
		 $allergiesPatient,$taillePatient,$poidsPatient,$groupesanguin,$indicateursbiologique,$dateCreationPatient,$SiteCreationPatient,$nomAuteurPatient,
		 $prenomAuteurPatient,$idRendezVous));		
		 if($req){
			 $CreationDok="Le Patient Ajouté Avec Succès";
		 }else{
			 $CreationDNo="Ajout De Patient Echoué";
		 }
	}else{
		$DChampvide="Les Champs Marqués * sont Obligatoires Veuillez Les completer Tous";
	}		
}

?>