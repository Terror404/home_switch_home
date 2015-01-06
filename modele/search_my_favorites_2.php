<?php
$askFavs=$DB->prepare('SELECT id_house FROM favorites WHERE id_user=:iduser');
    $askFavs->execute(array('iduser'=>$_SESSION['userId']));
    
while($resFavs=$askFavs->fetch())
{
    $arrayFavs=explode('/',$resFavs['id_house']);
}

$nbFavs=count($arrayFavs);
$arrayInfFavHouse=array();

foreach ($arrayFavs as $value) {
    $verif=$DB->prepare('SELECT EXISTS (SELECT id FROM house WHERE id=:value) AS id_exists');
        $verif->execute(array('value'=>$value));
    
    while($result=$verif->fetch())
    {
        if($result['id_exists']==true)
        {
                $askFavHouse=$DB->prepare('SELECT title,description,rating,pictures FROM house WHERE id=:idhouse');
            $askFavHouse->execute(array('idhouse'=>$value));
        
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
                $arrayInfFavHouse[$value]=array($value,$arrayFavs[$value],$resFavHouse['description'],$resFavHouse['title'],$resFavHouse['pictures'],$resFavHouse['rating']);
            }
        }
        else
        {
            $key_id=array_search($value,$arrayFavs);
            unset($arrayFavs[$key_id]);
            $arrayFavs=array_values(array_filter($arrayFavs));
            $stringFavs=implode('/',$arrayFavs);
            $addFavs=$DB->prepare('UPDATE favorites SET id_house=:stringFavs WHERE id_user=:iduser');
                $addFavs->execute(array('stringFavs'=>$stringFavs,'iduser'=>$_SESSION['userId']));
        }
    }
}


