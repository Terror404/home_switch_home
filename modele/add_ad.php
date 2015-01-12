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
        $addA=$DB->prepare("INSERT INTO ad (id_house,title,date_begin,date_end) VALUES(:idHouse,:title,:dateBegin,:dateEnd");
            $addA->execute(array('idHouse'=>$_POST['id_house'],'title'=>$_POST['title_ad'],'dateBegin'=>$newDateB,'dateEnd'=>$newDateE));        
        
            
        $askAdd=$DB->prepare('SELECT ad.id FROM ad,house,user WHERE user.id=house.id_user AND user.id=\''.$_SESSION['userId'].'\' AND house.id=ad.id_house AND ad.title=\''.$_POST['title'].'\'');
            $askAdd->execute();
            
            $askCriteria=$DB->prepare('SELECT * FROM criteria');
            $askCriteria->execute();
            
            while($resAdd=$askAdd->fetch())
            {
            while($resCriteria=$askCriteria->fetch())
            {
            
                if(isset($_POST[$resCriteria['name']]) && $_POST[$resCriteria['name']]=='on')
                {
                $addCriteria=$DB->prepare('INSERT INTO ad_criteria(id_ad,id_criteria,description) VALUES(\''.$resAdd['id'].'\',\''.$resCriteria['id'].'\',\''.$_POST['critDesc'.$resSearchBoxCriteria['name']].'\')');
                $addCriteria->execute();
                }
            }
            }
        /*$askIdAd=$DB->prepare('SELECT id FROM ad WHERE id_house=:idhouse AND date_begin=:datebegin AND date_end=:dateend');
            $askIdAd->execute(array('idhouse'=>$_POST['id_house'], 'datebegin'=>$newDateB,'dateend'=>$newDateE));
        
        while($resIdAd=$askIdAd->fetch())
        {
            $idAd=$resIdAd['id'];
        }
        
        for($i=1;$i<6;$i++)
        {
        $addCriteria=$DB->prepare('INSERT INTO ad_criteria (id_ad,id_criteria) VALUES (:idad,:idcriteria)');
            $addCriteria->execute(array('idad'=>$idAd,'idcriteria'=>$_POST['idCrit'.$i]));
        }*/
        echo"<br/>";
        echo"L'annonce a bien été enregistrée";
        ?> <input type="button" value="Retour" onclick="self.location.href='../controler/content.php?page=houseCard&id=<?phpecho$_POST['id_house']?>'"/><?php
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

