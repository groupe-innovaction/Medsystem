<?php
include("bd/connect.php");
if(isset($_POST['valiersubmit'])){
	
	$Confirmerdaterdv=htmlspecialchars($_POST['Confirmerdaterdv']);
	$Confirmerheurerdv=htmlspecialchars($_POST['Confirmerheurerdv']);
	$Etatrdv="Valide";
	$e="Demande";
	$f="Oui";
	if(!empty($_POST['Confirmerdaterdv']) AND !empty($_POST['Confirmerheurerdv'])){
	
	    $req=$conbd->query('SELECT * FROM rendezvous WHERE Annulerrdv = "'.$f.'" AND Etatrdv="'.$e.'" AND idRDV = "'.$mon_idRDV.'"');         
        $valeurUsername=$req->rowcount();   
		if($valeurUsername == 0){
			
	  $req=$conbd->prepare('UPDATE rendezvous SET Confirmerdaterdv="'.$Confirmerdaterdv.'" WHERE idRDV = "'.$mon_idRDV.'"');
	  $req->execute();
	  $req=$conbd->prepare('UPDATE rendezvous SET Confirmerheurerdv="'.$Confirmerheurerdv.'" WHERE idRDV = "'.$mon_idRDV.'"');
	  $req->execute();	
	  $req=$conbd->prepare('UPDATE rendezvous SET Etatrdv="'.$Etatrdv.'" WHERE idRDV = "'.$mon_idRDV.'"');
	  $req->execute();	
      if($req){
		 header('location:supadmlisterrendezvous.php');
	  }else{
		 $repconfirmation1="Confirmation De Rendez-vous Echouée";
	  } 			
			
		}else{
			$RjouterDabord="Vous Demande d'abord Rajouter cette demande";
		}		
		}else{
		$repconfirmation1="Veuillez Entrer La Date et L'heure SVP Pour Confirmer le Rendez-vous";
	}	
}

?>



			
			
			
