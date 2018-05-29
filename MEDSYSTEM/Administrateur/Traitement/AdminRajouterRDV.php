
<?php
include("../bd/connect.php");
if(isset($_POST['AdminRajouter'])){
	if(!empty($_POST['radiordv2'])){
	$radiordv2=$_POST['radiordv2'];	
	
   $c="Non";
   $d="Demande";

    
	    $reqq=$conbd->query('SELECT * FROM rendezvous WHERE Annulerrdv="'.$c.'" AND Etatrdv="'.$d.'" AND idRDV = "'.$AdmidRDV.'"');         
        $valeurUsername=$reqq->rowcount();   
		if($valeurUsername == 0){
			
		$req=$conbd->prepare('UPDATE rendezvous SET Annulerrdv="'.$radiordv2.'" WHERE idRDV = "'.$AdmidRDV.'"');
		$req->execute();
			  if($req){
		  $rdvRajouter="Demande Rajoutée avec Succès";
	  }else{
		  $rdvRajouterEchec="Echec";
	  }	
		
		}else{
		 $repDejaRajouter="Elle fait dejà partie des Demandes"; 	
		}		
	}else{
		$repRajouter="Aucune Action";
	}

}

?>

