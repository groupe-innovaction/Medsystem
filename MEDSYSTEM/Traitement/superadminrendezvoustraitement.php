<?php
include("bd/connect.php");
if(isset($_POST['submitrdv'])){
	
	$nomrdv=$_POST['nomrdv'];
	$prenomrdv=$_POST['prenomrdv'];
	$telephonerdv=$_POST['telephonerdv'];
	$daterdv=$_POST['daterdv'];
	$Departementrdv=$_POST['Departementrdv'];
	$mailrdv=$_POST['mailrdv'];
	$sexerdv=$_POST['sexerdv'];
	$Symptomesrdv=$_POST['Symptomesrdv'];
	$siterdv=$_POST['siterdv'];
	
	if(!empty($_POST['nomrdv']) AND !empty($_POST['prenomrdv']) AND !empty($_POST['telephonerdv']) AND 
	!empty($_POST['daterdv']) AND !empty($_POST['Departementrdv']) AND !empty($_POST['mailrdv']) AND !empty($_POST['sexerdv']) AND 
	!empty($_POST['siterdv']) AND !empty($_POST['Symptomesrdv'])){
		
		if(filter_var($mailrdv, FILTER_VALIDATE_EMAIL)){
			
			
		 $req=$conbd->prepare("INSERT INTO rendezvous(nomrdv,prenomrdv,telephonerdv,daterdv,Departementrdv,mailrdv,sexerdv,siterdv,Symptomesrdv) VALUES(?,?,?,?,?,?,?,?,?)");	
		 $req->execute(array($nomrdv,$prenomrdv,$telephonerdv,$daterdv,$Departementrdv,$mailrdv,$sexerdv,$siterdv,$Symptomesrdv));
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