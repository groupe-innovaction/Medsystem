<?php

class Authadmin{
	static function isLogged(){
		if(isset($_SESSION['Authadmin']) && isset($_SESSION['Authadmin']['username']) && isset($_SESSION['Authadmin']['password'])){
			extract($_SESSION['Authadmin']);
			include("bd/connect.php");
    $requseradmin = $conbd->prepare(" SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='administrateur'"); 
            $requseradmin->execute(array($username,$password));
            $userexistadmin = $requseradmin->rowCount();
            if($userexistadmin == 1){
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