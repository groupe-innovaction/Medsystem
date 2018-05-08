<?php
include("bd/connect.php");
if(isset($_POST['valiersubmit'])){
	
	$Confirmerdaterdv=htmlspecialchars($_POST['Confirmerdaterdv']);
	$Confirmerheurerdv=htmlspecialchars($_POST['Confirmerheurerdv']);
	$Etatrdv="Valide";
	
	if(!empty($_POST['Confirmerdaterdv']) AND !empty($_POST['Confirmerheurerdv'])){
		
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
		$repconfirmation1="Veuillez Entrer La Date et L'heure SVP Pour Confirmer le Rendez-vous";
	}	
}

?>

<?php
include("bd/connect.php");
if(isset($_POST['annulersubmit'])){
	
}

?>