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

$ask='SELECT DISTINCT ad.title, ad.date_begin, house.description, ad.date_end, house.pictures, house.rating, user.login, house.id, ad.priority
                                     FROM ad, house,user, area, villes_france_free,departement 
                                     WHERE ad.id_house= house.id 
                                     AND house.id_user=user.id
                                     AND area.id=house.id_area
                                     AND house.id_town=villes_france_free.ville_id
                                     AND villes_france_free.ville_departement=departement.departement_code
                                     AND (ad.title '.$likeDude.' OR house.description '.$likeDude.' OR area.name '.$likeDude.' OR villes_france_free.ville_nom_simple '.$likeDude.' OR departement.departement_nom '.$likeDude.' OR house.description '.$likeDude.')';

$askPrioritySearch=$DB->prepare($ask);
$askPrioritySearch->execute();
echo $ask;


