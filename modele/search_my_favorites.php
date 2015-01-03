<?php
$askFavs=$DB->prepare('SELECT id_house FROM favorites WHERE id_user=:iduser');
    $askFavs->execute(array('iduser'=>$_SESSION['userId']));
    
while($resFavs=$askFavs->fetch())
{
    $arrayFavs=explode('/',$resFavs['id_house']);
}

$nbFavs=count($arrayFavs);
$arrayInfFavHouse=array();

for($i=0;$i<$nbFavs;$i++)
{
    $askFavHouse=$DB->prepare('SELECT title,description,rating,pictures FROM house WHERE id=:idhouse');
        $askFavHouse->execute(array('idhouse'=>$arrayFavs[$i]));
    
    while($resFavHouse=$askFavHouse->fetch())
    {
            /*
                Colonne0 => id
                Colonne1 => id_house
                Colonne2 => description
                Colonne3 => title
                Colonne4 => pictures
                Colonne5 => rating
            */
            $arrayInfFavHouse[$i]=array($i,$arrayFavs[$i],$resFavHouse['description'],$resFavHouse['title'],$resFavHouse['pictures'],$resFavHouse['rating']);
    }

}

