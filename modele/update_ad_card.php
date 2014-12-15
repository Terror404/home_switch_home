<?php
    try
        {
            $bdd= new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));            
        } 
    catch (Exception $ex) 
        {
            die('Erreur'.$ex->getMessage());
        }
?>

<?php
    if (isset($_POST['modif_dateB']) AND $_POST['modif_dateB']!="")
        {
            $mod_dateB=$bdd->prepare('UPDATE ad SET date_begin=:dateB WHERE id=:idad');
                $mod_dateB->execute(array('dateB'=>$_POST['modif_dateB'],'idad'=>$_GET['id']));
        }
    else
        {
            echo"Le champ n'est pas rempli correctement";
        }
?>

<?php
    if (isset($_POST['modif_dateE']) AND $_POST['modif_dateE']!="")
        {
            $mod_dateE=$bdd->prepare('UPDATE ad SET date_end:dateE WHERE id=:idad');
                $mod_dateE->execute(array('dateE'=>$_POST['modif_dateE'],'idad'=>$_GET['id']));
        }
    else
        {
            echo"Le champ n'est pas rempli correctement";
        }
?>