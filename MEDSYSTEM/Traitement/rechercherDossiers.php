<?php  
include("../bd/connect.php");
 if(isset($_POST["query"]))  
 {  
       $output = ''; 
      $rep = $conbd->query("SELECT * FROM dossiers WHERE idDossier LIKE '".$_POST["query"]."%' OR nomDossier LIKE '".$_POST["query"]."%' OR prenomDossier LIKE '".$_POST["query"]."%' ORDER BY idDossier DESC LIMIT 0,5 ");
      $num_rows = $rep->fetch();
      $rep->closeCursor();
	  
      if($num_rows = $rep->rowcount() > 0)  
      {  
   
   $rep = $conbd->query("SELECT * FROM dossiers WHERE idDossier LIKE '".$_POST["query"]."%' OR nomDossier LIKE '".$_POST["query"]."%' OR prenomDossier LIKE '".$_POST["query"]."%' ORDER BY idDossier DESC LIMIT 0,5 ");
            while($don=$rep->fetch()){
                    ?>
			<div style="padding-top:17px;">			
 <a style="" href="" >	
 
       <?= $don['idDossier']?> - <?= $don['nomDossier']?> <?= $don['prenomDossier']?> </br>
</a>	   
	         <div>
             <?php
             }
      }  
      else  
      {  
           $output .= '<p style="padding-top:10px; padding-bottom:px; color:#900;">Dossier non retrouver...</p>';  
      }  
      $output .= '</p>';  
      echo $output;  
 }  
 ?>  
<style>
.bb{
	
}
</style>