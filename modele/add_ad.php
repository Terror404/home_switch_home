<?php
require("../modele/fct_verif_date.php");

$originalDateB = $_POST['date_begin'];
    $arrB = explode('/', $originalDateB);
    $newDateB = $arrB[2].'/'.$arrB[0].'/'.$arrB[1];
    echo $newDateB;    
    
$originalDateE = $_POST['date_end'];
    $arrE = explode('/', $originalDateE);
    $newDateE = $arrE[2].'/'.$arrE[0].'/'.$arrE[1];
    echo $newDateE;


if(isset($_POST['date_begin']) AND $_POST['date_begin']!=="" AND $_POST['date_begin']!==NULL
        AND isset($_POST['date_end']) AND $_POST['date_end']!=="" AND $_POST['date_end']!==NULL
        AND isset($_POST['title_ad']) AND $_POST['title_ad']!=="" AND $_POST['title_ad']!==NULL)
{
    if(verif_date($_POST['date_begin']) AND verif_date($_POST['date_end']))
    {
        //Create the entry in the database in the "ad" table
        $addA=$DB->prepare("INSERT INTO ad (id_house,title,date_begin,date_end,criteria_1,criteria_2,criteria_3,criteria_4,criteria_5) VALUES(:idHouse,:title,:dateBegin,:dateEnd,:criteria1,:criteria2,:criteria3,:criteria4,:criteria5)");
            $addA->execute(array('idHouse'=>$_POST['id_house'],'title'=>$_POST['title_ad'],'dateBegin'=>$newDateB,'dateEnd'=>$newDateE,'criteria1'=>$_POST['critDesc1'],'criteria2'=>$_POST['critDesc2'],'criteria3'=>$_POST['critDesc3'],'criteria4'=>$_POST['critDesc4'],'criteria5'=>$_POST['critDesc5']));        
        
        $askIdAd=$DB->prepare('SELECT id FROM ad WHERE id_house=:idhouse AND date_begin=:datebegin AND date_end=:dateend');
            $askIdAd->execute(array('idhouse'=>$_POST['id_house'], 'datebegin'=>$newDateB,'dateend'=>$newDateE));
        
        while($resIdAd=$askIdAd->fetch())
        {
            $idAd=$resIdAd['id'];
        }
        
        for($i=1;$i<6;$i++)
        {
        $addCriteria=$DB->prepare('INSERT INTO ad_criteria (id_ad,id_criteria) VALUES (:idad,:idcriteria)');
            $addCriteria->execute(array('idad'=>$idAd,'idcriteria'=>$_POST['idCrit'.$i]));
        }
        echo"L'annonce a bien été enregistrée";
        ?> <input type="button" value="Retour" onclick="self.location.href='../controler/content.php?page=houseCard&id=<?phpecho$_POST['id_house'?>'"/><?php
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

