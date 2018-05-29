
<?php
include("../bd/connect.php");
if(isset($_POST['BtnannulerRDV'])){
	if(!empty($_POST['radiordv1'])){
	$radiordv1=$_POST['radiordv1'];
	
    $a="Oui";
	$b="Demande";

	    $req=$conbd->query('SELECT * FROM rendezvous WHERE Annulerrdv="'.$a.'" AND Etatrdv="'.$b.'" AND idRDV = "'.$AdmidRDV.'"');         
        $valeurUsername=$req->rowcount();   
		if($valeurUsername == 0){
			
	$rep=$conbd->prepare('UPDATE rendezvous SET Annulerrdv="'.$radiordv1.'" WHERE idRDV = "'.$AdmidRDV.'"');
	$rep->execute();
	
	  	  if($rep){
		  $rdvAnnuler="Demande Annuler Avec succès";
	  }else{
		  $rdvEchec="Echec";
	  }	
	  
		}else{
		 $repDejaAnnuler = "Cette Demande à  été dejà  annulée"; 	
		}

	}else{
		$repAnnuler="Aucune Action";
	}
}
?>



