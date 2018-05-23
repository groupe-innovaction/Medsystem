<?php
include('../bd/connect.php');
if(isset($_POST['submit'])){
  
  $nom=htmlspecialchars($_POST['nom']);
  $prenom=htmlspecialchars($_POST['prenom']);
  $username=htmlspecialchars($_POST['username']);
  $mail=htmlspecialchars($_POST['mail']);
  $cmail=htmlspecialchars($_POST['cmail']);
  $lns=htmlspecialchars($_POST['lns']);
  $dns=$_POST['dns']=date("d F Y");   
  $nif=htmlspecialchars($_POST['nif']);  
  $sexe=htmlspecialchars($_POST['sexe']);
  $statutm="";
  $statutm=htmlspecialchars($_POST['statutm']);
  $fonction=htmlspecialchars($_POST['fonction']);
  $site="";
  $site=htmlspecialchars($_POST['site']);
  $statut="En Fonction";  
  $dateins=date("d F Y");
  $adresse=htmlspecialchars($_POST['adresse']);
  $password=htmlspecialchars($_POST['password']);
  $telephone1=htmlspecialchars($_POST['telephone1']);
  $telephone2=htmlspecialchars($_POST['telephone2']);
  $photoutilisateur="";
  $photoutilisateur   =$_FILES['photoutilisateur']['name'];

  if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['mail']) AND !empty($_POST['cmail'])
  AND !empty($_POST['password']) AND !empty($_POST['dns']) AND !empty($_POST['nif']) AND !empty($_POST['statutm']) AND !empty($_POST['lns'])
  AND !empty($_POST['adresse']) AND !empty($_POST['sexe']) AND !empty($_POST['fonction']) AND !empty($_POST['site']) AND !empty($_POST['telephone1']) ){
  

                   $req=$conbd->query("SELECT * FROM logintable WHERE username='$username'");         
                   $valeurUsername=$req->rowcount(); 
                       if($valeurUsername == 0){

                   $req=$conbd->query("SELECT * FROM logintable WHERE mail='$mail'");         
                   $valeurEmail=$req->rowcount(); 
                       if($valeurEmail == 0){                        

                        if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                           if($mail == $cmail){
                         $longeurpass = strlen($password);
                         if($longeurpass >= 8){

                        $Adresse_Poster = basename($_FILES['photoutilisateur']['name']);
                        $destination_Poster = "photo/".$Adresse_Poster;
                        move_uploaded_file($_FILES['photoutilisateur']['tmp_name'], $destination_Poster);

                      $req=$conbd->prepare("INSERT INTO logintable(nom,prenom,username,statut,mail,nif,statutm,lns,dns,sexe,fonction,site,adresse,password,telephone1,telephone2,dateins,photoutilisateur)
                       VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                      $req->execute(array($nom,$prenom,$username,$statut,$mail,$nif,$statutm,$lns,$dns,$sexe,$fonction,$site,$adresse,$password,$telephone1,$telephone2,$dateins,$photoutilisateur));
                            if($req){
                              $form_ok="L'utilisateur est ajouté avec succèss";                             
                                }else{
                                 echo "echec";
                              }
                              }else{
                                $lp="Le mot de passe doit avoir au moins 8 charatères";
                                }
                               }else{
                              $em="Les adresse email sont differents...";
                               }
                              }else{
                               $vm="Adresse email incorrect";
                               }
                             }else{
                              $vuemail="Adresse email invalide";
                              }
                             }else{
                              $vu="Nom d'utilisateur invalide";
                              }                         							
							
							
							}else{
                             $erreurchmaps="Veuillez Completer Tous Les Champs Obligatoires";
                            }
	   

}

?>