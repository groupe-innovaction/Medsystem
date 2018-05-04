<?php

class Authmedecin{
	static function isLogged(){
		if(isset($_SESSION['Authmedecin']) && isset($_SESSION['Authmedecin']['username']) && isset($_SESSION['Authmedecin']['password'])){
			extract($_SESSION['Authmedecin']);
			include("bd/connect.php");
    $requsermedecin = $conbd->prepare(" SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='medecin'"); 
            $requsermedecin->execute(array($username,$password));
            $userexistmedecin = $requsermedecin->rowCount();
            if($userexistmedecin == 1){
            	return true;
            }else{
            	return false;
            } 
		}else{
			return false;
		}
	}
}

?>