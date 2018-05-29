
<?php
include("../bd/connect.php");
if(isset($_POST['SecProfilesubmit'])){
	
	$modifiernomRDV=htmlspecialchars($_POST['modifiernomRDV']);
	$modifierprenomRDV=htmlspecialchars($_POST['modifierprenomRDV']);
	$modifiertelRDV=htmlspecialchars($_POST['modifiertelRDV']);
	$modifiermailRDV=htmlspecialchars($_POST['modifiermailRDV']);
	$modifierDepartementRDV=htmlspecialchars($_POST['modifierDepartementRDV']);
	$modifiersexeRDV=htmlspecialchars($_POST['modifiersexeRDV']);
	$modifiersiterdv=htmlspecialchars($_POST['modifiersiterdv']);
	$modifiersymptomesRDV=htmlspecialchars($_POST['modifiersymptomesRDV']);
	
		if(!empty($_POST['modifiernomRDV']) AND !empty($_POST['modifierprenomRDV']) AND !empty($_POST['modifiertelRDV']) AND 
	!empty($_POST['modifiermailRDV']) AND !empty($_POST['modifiermailRDV']) AND !empty($_POST['modifierDepartementRDV']) AND !empty($_POST['modifiersexeRDV']) AND 
	!empty($_POST['modifiersiterdv']) AND !empty($_POST['modifiersymptomesRDV']) ){
		
		if(filter_var($modifiermailRDV, FILTER_VALIDATE_EMAIL)){
		
	$req=$conbd->prepare('UPDATE rendezvous SET nomRDV="'.$modifiernomRDV.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE rendezvous SET prenomRDV="'.$modifierprenomRDV.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE rendezvous SET telephoneRDV="'.$modifiertelRDV.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE rendezvous SET mailRDV="'.$modifiermailRDV.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE rendezvous SET DepartementRDV="'.$modifierDepartementRDV.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE rendezvous SET sexeRDV="'.$modifiersexeRDV.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE rendezvous SET siterdv="'.$modifiersiterdv.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();
	$req=$conbd->prepare('UPDATE rendezvous SET SymptomesRDV="'.$modifiersymptomesRDV.'" WHERE idRDV = "'.$SecdRDV.'"');
	$req->execute();	
		
		if($req){
			$rdvcorrect="Modification Effectuée";
		}else{
			$rdvechoue="Modification Echouée";
		}
		
		}else{
		 $emailrdvincorrect="Addresse Email Incorrect";	
		}		
	}else{
		 $rdvincorrect="Tous Les Champs Sont Obligatoires";
	}
	
}

?>
