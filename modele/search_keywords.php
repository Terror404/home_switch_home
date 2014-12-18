<?php

$keywords = $_POST['keyWords'];
echo $keywords;
$explodedKeywords=  explode(' ', $keywords);                    //converts the keywords into an array
$nbrRows=count($explodedKeywords);
$likeDude='(';                                                  //initialize the keywords var to insert into the query

for($i=0;$i<$nbrRows;$i+=1)
{
    $keyword=$explodedKeywords[$i];
    $likeDude=$likeDude.'like '.$keywords.$i;
    if($i!=$nbrRows-1)
    {
        $likeDude=$likeDude.' OR ';
    }
}

$ask='SELECT DISTINCT ad.title, ad.date_begin, house.description, ad.date_end, house.pictures, house.rating, house.id, ad.priority
                                     FROM ad, house, house_area, area, ad_criteria, criteria, user , criteria_house , house_criteria_house, villes_france_free,departement 
                                     WHERE ad.id_house= house.id 
                                     AND house.id_user=user.id 
                                     AND house.id=house_area.id_house 
                                     AND area.id=house_area.id_area 
                                     AND ad.id=ad_criteria.id_ad 
                                     AND criteria.id=ad_criteria.id_criteria
                                     AND criteria_house.id=house_criteria_house.id_criteria_house
                                     AND house.id=house_criteria_house.id_house
                                     AND villes_frances_free.ville_departement=departement.departement_code
                                     WHERE ad.title '.$likeDude.' AND house.description '.$likeDude.' AND area.name '.$likeDude.' AND villes_france_free '.$likeDude.'AND departement.departement_nom '.$likeDude;

echo $ask;
