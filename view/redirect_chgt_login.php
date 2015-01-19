<?php
header ("Refresh: 2;URL=../controler/content.php?page=parameters");

if(isset($end) AND isset($_POST['whichForm']) AND $_POST['whichForm']==1)
{
    if($end==0)
    {
        ?> <p class="alert"> <?php echo"La modification a été effectuée avec succès"; ?></p>
        <?php
        
    }
    elseif($end==1)
    {
        ?> <p class="alert"> echo"Veuillez remplir le champ correctement"; ?></p>
        <?php
    }
}
?>

