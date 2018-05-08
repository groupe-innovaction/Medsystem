
<?php

if(isset($_POST['annulersubmit'])){
	if(!empty($_POST['radiordv1'])){
	$radiordv1=$_POST['radiordv1'];	
	$req=$conbd->prepare('UPDATE rendezvous SET Annulerrdv="'.$radiordv1.'" WHERE idRDV = "'.$mon_idRDV.'"');
	$req->execute();
	
	  if($req){
		  $rdvAnnuler="Operation Effectuée";
	  }else{
		  $rdvEchec="Echec";
	  }
	  
	  
	}else{
		$repAnnuler="Aucune Action";
	}

}

?>