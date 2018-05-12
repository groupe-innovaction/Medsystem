<?php  
include("../bd/connect.php");
 if(isset($_POST["query"]))  
 {  
       $output = ''; 
      $rep = $conbd->query("SELECT * FROM logintable WHERE idlogin LIKE '".$_POST["query"]."%' OR nom LIKE '".$_POST["query"]."%' OR prenom LIKE '".$_POST["query"]."%' ORDER BY idlogin DESC LIMIT 0,5 ");
      $num_rows = $rep->fetch();
      $rep->closeCursor();
	  
      if($num_rows = $rep->rowcount() > 0)  
      {  
   
   $rep = $conbd->query("SELECT * FROM logintable WHERE idlogin LIKE '".$_POST["query"]."%' OR nom LIKE '".$_POST["query"]."%' OR prenom LIKE '".$_POST["query"]."%' ORDER BY idlogin DESC LIMIT 0,5 ");
            while($don=$rep->fetch()){
                    ?>
			<div style="padding-top:17px;">			
 <a style="" href="supadmprofil.php?idlogin=<?php echo $don['idlogin'];?>" >	
 
       <?= $don['idlogin']?> - <?= $don['nom']?> <?= $don['prenom']?> </br>
</a>	   
	         <div>
             <?php
             }
      }  
      else  
      {  
           $output .= '<p style="padding-top:10px; padding-bottom:px; color:#900;">Utilisateur non retrouver...</p>';  
      }  
      $output .= '</p>';  
      echo $output;  
 }  
 ?>  
<style>
.bb{
	
}
</style>