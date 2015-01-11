<?php
header ("Refresh: 2;URL=../controler/content.php?page=parameters");
echo"<br/>";
echo"<br/>";
if(isset($end) AND isset($_POST['whichForm']) AND $_POST['whichForm']==1)
{
    if($end==0)
    {
        echo"La modification a été effectuée avec succès";
        
    }
    elseif($end==1)
    {
        echo"Veuillez remplir le champ correctement";
    }
}
?>

