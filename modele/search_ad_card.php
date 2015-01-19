    <!--Get the id of the owner-->
    <?php
    define("RESIDENCE_IS_SET", isset($_GET['id']));
    
    if(RESIDENCE_IS_SET)
    {
        $askIdOwner=$DB->prepare('SELECT id_user FROM house WHERE id=:idhouse');
            $askIdOwner->execute(array('idhouse'=>$_GET['id']));
            
        define("RESIDENCE_EXISTS", $askIdOwner->rowCount() > 0);
    }
    
    if (RESIDENCE_IS_SET AND RESIDENCE_EXISTS) {
    //<!--Get the house title-->
        $askHtitle=$DB->prepare('SELECT house.title FROM house WHERE house.id=:idhouse');
            $askHtitle->execute(array('idhouse'=>$_GET['id']));
    
    //<!--Get the house description-->
        $askHdesc=$DB->prepare('SELECT H.description FROM house H WHERE H.id=:idhouse');
            $askHdesc->execute(array('idhouse'=>$_GET['id']));
    
    //<!--Get the begining date-->
        $askDateB=$DB->prepare('SELECT A.date_begin FROM ad A, house H WHERE H.id=A.id_house AND H.id=:idhouse');
            $askDateB->execute(array('idhouse'=>$_GET['id']));

    //<!--Get the end date-->
        $askDateE=$DB->prepare('SELECT A.date_end FROM ad A, house H WHERE H.id=A.id_house AND H.id=:idhouse');
            $askDateE->execute(array('idhouse'=>$_GET['id']));
            
        //<!--Get the begining and the end dates-->
        $askDates=$DB->prepare('SELECT A.date_end,A.date_begin,A.id FROM ad A, house H WHERE H.id=A.id_house AND H.id=:idhouse');
            $askDates->execute(array('idhouse'=>$_GET['id']));    
    
    //<!--Get the house rate-->
        $askHrate=$DB->prepare('SELECT H.rating FROM house H WHERE H.id=:idhouse');
            $askHrate->execute(array('idhouse'=>$_GET['id']));
    
    //<!--Get the house pic-->
        $askHpic=$DB->prepare('SELECT H.pictures FROM house H WHERE H.id=:idhouse');
            $askHpic->execute(array('idhouse'=>$_GET['id']));

    
    //<!--Get the region-->
        $askHregion=$DB->prepare('SELECT real_name FROM area WHERE id=(SELECT id_area FROM house WHERE id=:idhouse)');
            $askHregion->execute(array('idhouse'=>$_GET['id']));
    
    //<!--Get the town-->
        $askHtown=$DB->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id=(SELECT id_town FROM house WHERE id=:idhouse)');
            $askHtown->execute(array('idhouse'=>$_GET['id']));
       
    //<!--Get the zipcode-->
        $askHzip=$DB->prepare('SELECT ville_code_postal FROM villes_france_free WHERE ville_id=(SELECT id_town FROM house WHERE id=:idhouse)');
            $askHzip->execute(array('idhouse'=>$_GET['id']));

    //<!--Get the adress-->
        $askHaddress=$DB->prepare('SELECT address FROM house WHERE id=:idhouse');
            $askHaddress->execute(array('idhouse'=>$_GET['id']));

    //<!--Get the type-->
        $askHtype=$DB->prepare('SELECT house_type FROM house WHERE id=:idhouse');
            $askHtype->execute(array('idhouse'=>$_GET['id']));

    
    //<!--Get the capacity-->
        $askHcapacity=$DB->prepare('SELECT nbr_people FROM house WHERE id=:idhouse');
            $askHcapacity->execute(array('idhouse'=>$_GET['id']));

    //<!--Get the number of bedrooms-->
        $askHbrnb=$DB->prepare('SELECT nbr_room FROM house WHERE id=:idhouse');
            $askHbrnb->execute(array('idhouse'=>$_GET['id']));

        $askCrit1=$DB->prepare('SELECT * FROM criteria');
            $askCrit1->execute();

        $askCrit2=$DB->prepare('SELECT * FROM criteria');
            $askCrit2->execute();

        $askCrit3=$DB->prepare('SELECT * FROM criteria');
            $askCrit3->execute();

        $askCrit4=$DB->prepare('SELECT * FROM criteria');
            $askCrit4->execute();

        $askCrit5=$DB->prepare('SELECT * FROM criteria');
            $askCrit5->execute();
            
        $askCom=$DB->prepare('SELECT * FROM comment_house C,user U WHERE C.id_target=:idtarget AND C.id_author=U.id');
$askCom->execute(array('idtarget'=>$_GET['id']));
$askComNb=$askCom->rowcount();



if(isset($_POST['houseId']))
    {
        $askModHouse=$DB->prepare('SELECT * FROM ad_criteria WHERE id=:idhouse');
            $askModHouse->execute(array('idhouse'=>$_POST['houseId']));
    }
    }
    
    
    


    
    
    
    
    
/*******************************************************************************
************************* SQL request for the ads ******************************
*******************************************************************************/
    
$askInfAds=$DB->prepare('SELECT * FROM criteria,ad_criteria WHERE criteria.id=ad_criteria.id_criteria AND id_ad=:idad');
    $askInfAds->execute(array('idad'=>$_GET['adId']));

$askDateAds=$DB->prepare('SELECT date_begin,date_end FROM ad WHERE id=:idad');
    $askDateAds->execute(array('idad'=>$_GET['adId']));
    
$askProfile=$DB->prepare('SELECT user.id FROM user,house WHERE house.id_user=user.id AND house.id='.$_GET['id']);
$askProfile->execute();
