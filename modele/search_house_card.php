    <!--Get the id of the owner-->
    <?php
        $askIdOwner=$DB->prepare('SELECT id_user FROM house WHERE id=:idhouse');
            $askIdOwner->execute(array('idhouse'=>$_GET['id']));
    ?>
       
    <!--Get the house title-->
    <?php
        $askHtitle=$DB->prepare('SELECT house.title FROM house WHERE house.id=:idhouse');
            $askHtitle->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the house description-->
    <?php
        $askHdesc=$DB->prepare('SELECT H.description FROM house H WHERE H.id=:idhouse');
            $askHdesc->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the begining date-->
    <?php
        $askDateB=$DB->prepare('SELECT A.date_begin FROM ad A, house H WHERE H.id=A.id_house AND H.id=:idhouse');
            $askDateB->execute(array('idhouse'=>$_GET['id']))
    ?>
    
    <!--Get the end date-->
    <?php
        $askDateE=$DB->prepare('SELECT A.date_end FROM ad A, house H WHERE H.id=A.id_house AND H.id=:idhouse');
            $askDateE->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the house rate-->
    <?php
        $askHrate=$DB->prepare('SELECT H.rating FROM house H WHERE H.id=:idhouse');
            $askHrate->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the house pic-->
    <?php
        $askHpic=$DB->prepare('SELECT H.pictures FROM house H WHERE H.id=:idhouse');
            $askHpic->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the region-->
    <?php 
        $askHregion=$DB->prepare('SELECT real_name FROM area WHERE id=(SELECT id_area FROM house WHERE id=:idhouse)');
            $askHregion->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the town-->
    <?php
        $askHtown=$DB->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id=(SELECT id_town FROM house WHERE id=:idhouse)');
            $askHtown->execute(array('idhouse'=>$_GET['id']));
       
    ?>

    <!--Get the zipcode-->
    <?php
        $askHzip=$DB->prepare('SELECT ville_code_postal FROM villes_france_free WHERE ville_id=(SELECT id_town FROM house WHERE id=:idhouse)');
            $askHzip->execute(array('idhouse'=>$_GET['id']));
    ?>

    <!--Get the adress-->
    <?php
        $askHaddress=$DB->prepare('SELECT address FROM house WHERE id=:idhouse');
            $askHaddress->execute(array('idhouse'=>$_GET['id']));
    ?>

    <!--Get the type-->
    <?php 
        $askHtype=$DB->prepare('SELECT house_type FROM house WHERE id=:idhouse');
            $askHtype->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the capacity-->
    <?php
        $askHcapacity=$DB->prepare('SELECT nbr_people FROM house WHERE id=:idhouse');
            $askHcapacity->execute(array('idhouse'=>$_GET['id']));
    ?>

    <!--Get the number of bedrooms-->
    <?php
        $askHbrnb=$DB->prepare('SELECT nbr_room FROM house WHERE id=:idhouse');
            $askHbrnb->execute(array('idhouse'=>$_GET['id']));
    ?>
    <?php
        