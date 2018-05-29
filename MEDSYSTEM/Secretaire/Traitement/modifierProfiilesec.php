<?php
include("../bd/connect.php");
if(isset($_POST['SECmodifierProfil'])){
	
	$Nouveauphotoutilisateur="";
	$Nouveauphotoutilisateur=$_FILES['Nouveauphotoutilisateur']['name'];
	$Nouveauusernamesec=$_POST['Nouveauusernamesec'];
	$Nouveaupasswordsec=$_POST['Nouveaupasswordsec'];
	$CNouveaupasswordsec=$_POST['CNouveaupasswordsec'];
	
	if(!empty($_POST['Nouveauusernamesec']) AND !empty($_POST['Nouveaupasswordsec']) AND !empty($_POST['CNouveaupasswordsec'])){
      $req=$conbd->query("SELECT * FROM logintable WHERE username='$Nouveauusernamesec'");         
       $valeurUsername=$req->rowcount(); 
        if($valeurUsername == 0){
             $longeurpass = strlen($Nouveaupasswordsec);
              if($longeurpass >= 8){
				if($Nouveaupasswordsec == $CNouveaupasswordsec){
					
		            $Adresse_Poster = basename($_FILES['Nouveauphotoutilisateur']['name']);
                    $destination_Poster = "../photo/".$Adresse_Poster;
                     move_uploaded_file($_FILES['Nouveauphotoutilisateur']['tmp_name'], $destination_Poster);			
					
	$req=$conbd->prepare('UPDATE logintable SET photoutilisateur="'.$Nouveauphotoutilisateur.'" WHERE idlogin="'.$_SESSION['var5sec'].'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE logintable SET username="'.$Nouveauusernamesec.'" WHERE idlogin="'.$_SESSION['var5sec'].'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE logintable SET password="'.$Nouveaupasswordsec.'" WHERE idlogin="'.$_SESSION['var5sec'].'"');
	$req->execute();	

       if($req){
		   echo"Ok";
	   }else{
		   echo"No";
	   }	
					
				}else{
					echo"Les Mots de passe sont differents";
				} 			  
			  }else{
				  echo"Le mot de passe doit avoir au moins 8 charatères";
			  }						
		}else{
			echo"Username Invalide";
		}		
	}else{
	echo"Tous les champs sont obligatoires";
	}
}

?>