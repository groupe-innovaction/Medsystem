<?php
include("bd/connect.php");
if(isset($_POST['submitrdv'])){
	
	$identifiant=htmlspecialchars($_POST['identifiant']);
	$nomrdv=htmlspecialchars($_POST['nomrdv']);
	$prenomrdv=htmlspecialchars($_POST['prenomrdv']);
	$telephonerdv=htmlspecialchars($_POST['telephonerdv']);
	$daternaissancerdv=htmlspecialchars($_POST['daternaissancerdv']);
	$Departementrdv=htmlspecialchars($_POST['Departementrdv']);
	
	$Etatrdv="Demande";
	$Annulerrdv="Non";
	$mailrdv=htmlspecialchars($_POST['mailrdv']);
	$sexerdv=htmlspecialchars($_POST['sexerdv']);
	$Symptomesrdv=htmlspecialchars($_POST['Symptomesrdv']);
	$siterdv=htmlspecialchars($_POST['siterdv']);
	
	if(!empty($_POST['nomrdv']) AND !empty($_POST['prenomrdv']) AND !empty($_POST['telephonerdv']) AND 
	!empty($_POST['daternaissancerdv']) AND !empty($_POST['Departementrdv']) AND !empty($_POST['mailrdv']) AND !empty($_POST['sexerdv']) AND 
	!empty($_POST['siterdv']) AND !empty($_POST['Symptomesrdv'])){
		
		if(filter_var($mailrdv, FILTER_VALIDATE_EMAIL)){
			
			
		 $req=$conbd->prepare("INSERT INTO rendezvous(nomrdv,prenomrdv,telephonerdv,daternaissancerdv,Annulerrdv,Departementrdv,Etatrdv,mailrdv,sexerdv,siterdv,Symptomesrdv,identifiant) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");	
		 $req->execute(array($nomrdv,$prenomrdv,$telephonerdv,$daternaissancerdv,$Annulerrdv,$Departementrdv,$Etatrdv,$mailrdv,$sexerdv,$siterdv,$Symptomesrdv,$identifiantPatient));
		 if($req){
			 $rdvcorrect="Demande De Rendez-vous Valide Nous Vous Contacterons Sous Peu...";
		 }else{
			 $rdvechoue="Demande De Rendez-vous Echouee";
		 }
			
		}else{
		 $emailrdvincorrect="Addresse Email Incorrect";	
		}		
	}else{
		 $rdvincorrect="Tous Les Champs Marques * Sont Obligatoires Veuillez les completer Tous...";
	}
	
}
?>