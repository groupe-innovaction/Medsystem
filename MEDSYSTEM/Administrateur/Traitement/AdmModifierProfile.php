<?php
include('../bd/connect.php');
if(isset($_POST['AdmProfilesubmit'])){
  
  $nouveaunom=htmlspecialchars($_POST['nouveaunom']);
  $nouveauprenom=htmlspecialchars($_POST['nouveauprenom']);
  $nouveauusername=htmlspecialchars($_POST['nouveauusername']);
  $nouveaumail=htmlspecialchars($_POST['nouveaumail']);
  $nouveaulns=htmlspecialchars($_POST['nouveaulns']);
  $nouveaudns=htmlspecialchars($_POST['nouveaudns']);
  $nouveaunif=htmlspecialchars($_POST['nouveaunif']);  
  $nouveausexe=htmlspecialchars($_POST['nouveausexe']);
  $nouveaustatutm="";
  $nouveaustatutm=htmlspecialchars($_POST['nouveaustatutm']);
  $nouveaufonction=htmlspecialchars($_POST['nouveaufonction']);
  $site="";
  $nouveausite=htmlspecialchars($_POST['nouveausite']);
  $nouveaudateins=date("d F Y");
  $nouveauadresse=htmlspecialchars($_POST['nouveauadresse']);
  $nouveaupassword=htmlspecialchars($_POST['nouveaupassword']);
  $nouveautelephone1=htmlspecialchars($_POST['nouveautelephone1']);
  $nouveautelephone2=htmlspecialchars($_POST['nouveautelephone2']);
  $nouveauphotoutilisateur="";
  $nouveauphotoutilisateur   =$_FILES['nouveauphotoutilisateur']['name'];
  
  


                   $req=$conbd->query('SELECT * FROM logintable WHERE username="'.$nouveauusername.'" AND idlogin != "'.$MonIdAdmin.'"');         
                   $valeurUsername=$req->rowcount(); 
                       if($valeurUsername == 0){

                   $req=$conbd->query('SELECT * FROM logintable WHERE mail="'.$nouveaumail.'" AND idlogin != "'.$MonIdAdmin.'"');         
                   $valeurEmail=$req->rowcount(); 
                       if($valeurEmail == 0){                        

                        if(filter_var($nouveaumail, FILTER_VALIDATE_EMAIL)){
                         $longeurpass = strlen($nouveaupassword);
                         if($longeurpass >= 8){

                        $Adresse_Poster = basename($_FILES['nouveauphotoutilisateur']['name']);
                        $destination_Poster = "photo/".$Adresse_Poster;
                        move_uploaded_file($_FILES['nouveauphotoutilisateur']['tmp_name'], $destination_Poster);
						
							$req=$conbd->prepare('UPDATE logintable SET photoutilisateur="'.$nouveauphotoutilisateur.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();						
							$req=$conbd->prepare('UPDATE logintable SET nom="'.$nouveaunom.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();						
							$req=$conbd->prepare('UPDATE logintable SET prenom="'.$nouveauprenom.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET username="'.$nouveauusername.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET mail="'.$nouveaumail.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET lns="'.$nouveaulns.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET dns="'.$nouveaudns.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET nif="'.$nouveaunif.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET sexe="'.$nouveausexe.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET statutm="'.$nouveaustatutm.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET fonction="'.$nouveaufonction.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET site="'.$nouveausite.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET adresse="'.$nouveauadresse.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET password="'.$nouveaupassword.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET telephone1="'.$nouveautelephone1.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();
							$req=$conbd->prepare('UPDATE logintable SET telephone2="'.$nouveautelephone2.'" WHERE idlogin = "'.$MonIdAdmin.'"');
							$req->execute();							
							
                            if($req){
                             header('Location:modifierProfil.php?idlogin=idlogin');						  
                                }else{
                                 echo "echec";
                              }
                              }else{
                                $lp="Le mot de passe doit avoir au moins 8 charatères";
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
                           
}

?>


