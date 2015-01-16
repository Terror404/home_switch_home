<?php
$askFavs=$DB->prepare('SELECT id_house FROM favorites WHERE id_user=:iduser');
    $askFavs->execute(array('iduser'=>$_SESSION['userId']));

$j=0;
$arrayId=array();
while($resFavs=$askFavs->fetch())
{
    $arrayId[$j]=$resFavs['id_house'];
    $j++;
}

$nbId=count($arrayId);
$arrayInfFavs=array();
for($k=0;$k<$nbId;$k++)
{
    $askInfFavs=$DB->prepare('SELECT title,description,rating,pictures FROM house WHERE id=:idhouse');
        $askInfFavs->execute(array('idhouse'=>$arrayId[$k]));
        

    while($resInfFavs=$askInfFavs->fetch())
    {  
        /*
            Colonne0 => id
            Colonne1 => id_house
            Colonne2 => description
            Colonne3 => title
            Colonne4 => pictures
            Colonne5 => rating
        */
        $arrayInfFavs[$k][0]=$k;
        $arrayInfFavs[$k][1]= $resFavs['id_house'];
        $arrayInfFavs[$k][2]=$resInfFavs['description'];
        $arrayInfFavs[$k][3]=$resInfFavs['title'];
        $arrayInfFavs[$k][4]=$resInfFavs['pictures'];
        $arrayInfFavs[$k][5]=$resInfFavs['rating'];
    }
}

