<?php

class Authsuperadmin{
	static function isLogged(){
		if(isset($_SESSION['Authsuperadmin']) && isset($_SESSION['Authsuperadmin']['username']) && isset($_SESSION['Authsuperadmin']['password'])){
			extract($_SESSION['Authsuperadmin']);
			$conbd=new PDO("mysql:host=127.0.0.1;dbname=bdmedsystem;charset=utf-8","root","");
    $requser = $conbd->prepare(" SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='super-administrateur'"); 
            $requser->execute(array($username,$password));
            $userexist = $requser->rowCount();
            if($userexist == 1){
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