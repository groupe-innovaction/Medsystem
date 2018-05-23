<?php

class Authinf{
	static function isLogged(){
		if(isset($_SESSION['Authinf']) && isset($_SESSION['Authinf']['username']) && isset($_SESSION['Authinf']['password'])){
			extract($_SESSION['Authinf']);
			include("../bd/connect.php");
    $requserinf = $conbd->prepare(" SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='infirmiere'"); 
            $requserinf->execute(array($username,$password));
            $userexistinf = $requserinf->rowCount();
            if($userexistinf == 1){
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