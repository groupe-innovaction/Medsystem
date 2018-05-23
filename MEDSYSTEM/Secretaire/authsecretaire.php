<?php

class Authsec{
	static function isLogged(){
		if(isset($_SESSION['Authsec']) && isset($_SESSION['Authsec']['username']) && isset($_SESSION['Authsec']['password'])){
			extract($_SESSION['Authsec']);
			include("../bd/connect.php");
    $requsersecretaire = $conbd->prepare(" SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='secretaire'"); 
            $requsersecretaire->execute(array($username,$password));
            $userexistsecretaire = $requsersecretaire->rowCount();
            if($userexistsecretaire == 1){
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