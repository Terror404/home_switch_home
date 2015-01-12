<?php

$keywords = $_POST['keyWords'];

$explodedKeywords=  explode(' ', $keywords);                         //converts the keywords into an array
$nbrRows=count($explodedKeywords);
$likeDude='LIKE (';                                                  //initialize the keywords var to insert into the query

for($i=0;$i<$nbrRows;$i+=1)
{
    $keyword=$explodedKeywords[$i];
    $likeDude=$likeDude.'\'%'.$keyword.'%\'';
    if($i!=$nbrRows-1)
    {
        $likeDude=$likeDude.' OR ';
    }
}
$likeDude=$likeDude.')';

$ask='SELECT DISTINCT house.description,house.title, house.pictures, house.rating, user.login, house.id
                                     FROM house,user, area, villes_france_free
                                     WHERE house.id_user=user.id
                                     AND area.id=house.id_area
                                     AND house.id_town=villes_france_free.ville_id
                                     AND (house.description '.$likeDude.' OR area.name '.$likeDude.' OR villes_france_free.ville_nom_simple '.$likeDude.' OR house.description '.$likeDude.')';

$askPrioritySearch=$DB->prepare($ask);
$askPrioritySearch->execute();



