<?php
session_start();
 if(isset($_POST['submit'])){
if(!empty($_POST['username']) && !empty($_POST['password'])){ 
   extract($_POST);
   // $password = sha1($password);
    include("bd/connect.php");

    $requser = $conbd->prepare("SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='super-administrateur'"); 
            $requser->execute(array($username,$password));
            $userexist = $requser->rowCount();
            
            if($userexist == 1){
            $_SESSION['Authsuperadmin'] = array(
             'username' => $username,
             'password' => $password
              );
         header('Location:superadminpage.php');
      $username=$_POST['username'];
      $password=$_POST['password'];
        $req=$conbd->query('SELECT * FROM logintable WHERE username = "'.$username.'" AND password="'.$password.'" AND fonction="super-administrateur"');
              while($don=$req->fetch()){
                    
                    $photosupadm=$don['photoutilisateur'];
                    $prenomsupadm=$don['prenom'];
                    $fonctionsupadm=$don['fonction'];
                    $nomsupadm=$don['nom'];

               $_SESSION['var1']=$photosupadm;
               $_SESSION['var2']=$prenomsupadm;
               $_SESSION['var3']=$fonctionsupadm;
               $_SESSION['var4']=$nomsupadm;
           }
      }   
	    $requser = $conbd->prepare("SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='infirmiere' AND statut !='Bloquer'"); 
            $requser->execute(array($username,$password));
            $userexist = $requser->rowCount();
            
            if($userexist == 1){
            $_SESSION['Authinf'] = array(
             'username' => $username,
             'password' => $password
              );
         header('Location:infirmiere.php');
      $username=$_POST['username'];
      $password=$_POST['password'];
        $req=$conbd->query('SELECT * FROM logintable WHERE username = "'.$username.'" AND password="'.$password.'" AND fonction="infirmiere"');
              while($don=$req->fetch()){
                    
                    $photoinf=$don['photoutilisateur'];
					$nominf=$don['nom'];
                    $prenominf=$don['prenom'];
                    $fonctioninf=$don['fonction'];

               $_SESSION['var1inf']=$photoinf;
			   $_SESSION['var2inf']=$nominf;
               $_SESSION['var3inf']=$prenominf;
               $_SESSION['var4inf']=$fonctioninf;
			   
           }
		   
      }

	$requser = $conbd->prepare("SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='administrateur'"); 
            $requser->execute(array($username,$password));
            $userexist = $requser->rowCount();
            
            if($userexist == 1){
            $_SESSION['Authadmin'] = array(
             'username' => $username,
             'password' => $password
              );
         header('Location:administrateur.php');
      $username=$_POST['username'];
      $password=$_POST['password'];
        $req=$conbd->query('SELECT * FROM logintable WHERE username = "'.$username.'" AND password="'.$password.'" AND fonction="administrateur"');
              while($don=$req->fetch()){
                    
                    $photoadmin=$don['photoutilisateur'];
					$nomadmin=$don['nom'];
                    $prenomadmin=$don['prenom'];
                    $fonctionadmin=$don['fonction'];

               $_SESSION['var1admin']=$photoadmin;
			   $_SESSION['var2admin']=$nomadmin;
               $_SESSION['var3admin']=$prenomadmin;
               $_SESSION['var4admin']=$fonctionadmin;
			   
           }
      }
	  	$requser = $conbd->prepare("SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='medecin'"); 
            $requser->execute(array($username,$password));
            $userexist = $requser->rowCount();
            
            if($userexist == 1){
            $_SESSION['Authmedecin'] = array(
             'username' => $username,
             'password' => $password
              );
         header('Location:medecin.php');
      $username=$_POST['username'];
      $password=$_POST['password'];
        $req=$conbd->query('SELECT * FROM logintable WHERE username = "'.$username.'" AND password="'.$password.'" AND fonction="medecin"');
              while($don=$req->fetch()){
                    
                    $photomedecin=$don['photoutilisateur'];
					$nommedecin=$don['nom'];
                    $prenommedecin=$don['prenom'];
                    $fonctionmedecin=$don['fonction'];

               $_SESSION['var1medecin']=$photomedecin;
			   $_SESSION['var2medecin']=$nommedecin;
               $_SESSION['var3medecin']=$prenommedecin;
               $_SESSION['var4medecin']=$fonctionmedecin;
			   
           }
      }
  $requser = $conbd->prepare("SELECT * FROM logintable WHERE  username= ? AND password= ? AND fonction='secretaire'"); 
            $requser->execute(array($username,$password));
            $userexist = $requser->rowCount();
            
            if($userexist == 1){
            $_SESSION['Authsec'] = array(
             'username' => $username,
             'password' => $password
              );
         header('Location:secretaire.php');
      $username=$_POST['username'];
      $password=$_POST['password'];
        $req=$conbd->query('SELECT * FROM logintable WHERE username = "'.$username.'" AND password="'.$password.'" AND fonction="secretaire"');
              while($don=$req->fetch()){
                    
                    $photosec=$don['photoutilisateur'];
					$nomsec=$don['nom'];
                    $prenomsec=$don['prenom'];
                    $fonctionsec=$don['fonction'];

               $_SESSION['var1sec']=$photosec;
			   $_SESSION['var2sec']=$nomsec;
               $_SESSION['var3sec']=$prenomsec;
               $_SESSION['var4sec']=$fonctionsec;
			   
           }
      }
      else{
     $message="<center>Username Ou Password Incorrect</center>";

    }
  }else{
       $message="<center>Veuillez Completer Tous Les Champs</center>";
      }
  }    
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
	<meta charset="utf-08">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <title>LOGIN | LOGIN MEDSYSTEM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
      requirejs.config({
          baseUrl: '.'
      		});
    </script>
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <script src="./assets/plugins/input-mask/plugin.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body class="loginbackimg">
    <div class="page">
      <div class="page-single">
        <div class="container">
          <div class="row">
            <div class="col col-login mx-auto">
              <div class="text-center mb-6">
                <img src="images/LOGO.png" class="h-6" alt="">
              </div>
              <form class="card" action="" method="post">
                <div class="card-body p-6">
                  <div class="card-title"> <center> <b> AUTHENTIFICATION </b> </center> </div>
			      <div class="messageerreur">
                   <p> <?php if(isset($message)){ echo $message;} ?> </p>
                  </div>				  
                  <div class="form-group">
                    <label class="form-label"> <i class="fe fe-user"> </i> Nom D'utilisateur</label>
                    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrer Nom D'utilisateur" value="<?php if(isset($username)){ echo $username;}?>">
                  </div>
                  
                  <div class="form-group">
                    <label class="form-label"> <i class="fe fe-lock"> </i> Mot De Passe</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Entrer Mot De Passe">
                  </div>
                  <div class="form-footer">
                    <div class="loginsystembtn">
                    <button type="submit" name="submit" class="btn btn-block"> <i class="fe fe-check-circle"> </i> CONNECTEZ</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>