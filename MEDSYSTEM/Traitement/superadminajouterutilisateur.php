<?php
include('bd/connect.php');
if(isset($_POST['submit'])){
  
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $username=$_POST['username'];
  $mail=$_POST['mail'];
  $cmail=$_POST['cmail'];
  $lns=$_POST['lns'];
  $dns=$_POST['dns'];   
  $dns=date("d F Y");
  $nif=$_POST['nif'];  
  $sexe=$_POST['sexe'];
  $statutm="";
  $statutm=$_POST['statutm'];
  $fonction=$_POST['fonction'];
  $site="";
  $site=$_POST['site'];
  $statut="En Fonction";  
  $dateins=date("d F Y");
  $adresse=$_POST['adresse'];
  $password=$_POST['password'];
  $telephone1=$_POST['telephone1'];
  $telephone2=$_POST['telephone2'];
  $photoutilisateur="";
  $photoutilisateur   =$_FILES['photoutilisateur']['name'];

  if(!empty($_POST['nom'])){
    if(!empty($_POST['prenom'])){
      if(!empty($_POST['username'])){
        if(!empty($_POST['mail'])){
          if(!empty($_POST['cmail'])){
            if(!empty($_POST['password'])){
              if(!empty($_POST['dns'])){
                if(!empty($_POST['nif'])){
                  if(!empty($_POST['statutm'])){
                  if(!empty($_POST['lns'])){
                    if(!empty($_POST['adresse'])){
                      if(!empty($_POST['sexe'])){
                        if(!empty($_POST['fonction'])){
                          if(!empty($_POST['site'])){
                            if(!empty($_POST['telephone1'])){

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

                      $req=$conbd->prepare("INSERT INTO logintable(nom,prenom,username,statut,mail,cmail,nif,statutm,lns,dns,sexe,fonction,site,adresse,password,telephone1,telephone2,dateins,photoutilisateur)
                       VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
                      $req->execute(array($nom,$prenom,$username,$statut,$mail,$cmail,$nif,$statutm,$lns,$dns,$sexe,$fonction,$site,$adresse,$password,$telephone1,$telephone2,$dateins,$photoutilisateur));
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
                             $erreurtelephone1="SVP Entrer le telephone";
                            }
                          }else{
                           $erreursite="SVP Entrer le site";
                          }
                        }else{
                         $erreurfonction="SVP Entrer Fonction";
                        }
                      }else{
                       $erreursexe="SVP Entrer le sexe";
                      }
                      }else{
                       $erreuradresse="SVP Entrer l'adresse";
                        }
                   }else{
                   $erreurlns="SVP Entrer le lieu de naissance";
                    }
                  }else{
                    $erreurstatutm="SVP Entrer le statut matrimonial";
                     }
                  }else{
                   $erreurnif="SVP Entrer le nif";
                    }
                }else{
                   $erreurdns="SVP Entrer la date de naissance";
                  }
              }else{
               $erreurpassword="SVP Entrer le mot de passe";
                   }
          }else{
           $erreurcmail="SVP Confirmer l'email";
               }
        }else{
         $erreurmail="SVP Entrer l'email";
            }
      }else{
       $erreurusername="SVP Entrer le username";     
           }
    }else{
     $erreurprenom="SVP Entrer le prenom";
         }
  }else{
   $erreurnnom="SVP Entrer le nom</span>";
       }

}

?>