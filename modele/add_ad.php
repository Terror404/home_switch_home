<?php
require("../modele/fct_verif_date.php");

$originalDateB = $_POST['date_begin'];
    $arrB = explode('/', $originalDateB);
    $newDateB = $arrB[2].'/'.$arrB[1].'/'.$arrB[0];
    echo $newDateB;    
    
$originalDateE = $_POST['date_end'];
    $arrE = explode('/', $originalDateE);
    $newDateE = $arrE[2].'/'.$arrE[1].'/'.$arrE[0];
    echo $newDateE;


try 
        {
            $bdd = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } 
    catch (Exception $ex) 
        {
            die ('Erreur:'.$ex ->getMessage());
        }
        
if(isset($_POST['date_begin']) AND $_POST['date_begin']!=="" AND $_POST['date_begin']!==NULL
        AND isset($_POST['date_end']) AND $_POST['date_end']!=="" AND $_POST['date_end']!==NULL
        AND isset($_POST['title_ad']) AND $_POST['title_ad']!=="" AND $_POST['title_ad']!==NULL)
{
    if(verif_date($_POST['date_begin']) AND verif_date($_POST['date_end']))
    {
        $addA=$bdd->prepare("INSERT INTO ad (id_house,title,date_begin,date_end) VALUES(:idHouse,:title,:dateBegin,:dateEnd)");
                $addA->execute(array('idHouse'=>$_POST['id_house'],'title'=>$_POST['title_ad'],'dateBegin'=>$newDateB,'dateEnd'=>$newDateE));
        echo"L'annonce a bien été enregistrée";
    }
    else
    {
        echo"Format des dates incorrect";
    }
}
else
{
    echo"Vous n'avez pas rempli tous les champs";
}

