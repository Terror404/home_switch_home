
    <?php
        try 
            {
                $bdd = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            } 
        catch (Exception $ex) 
            {
                die ('Erreur:'.$ex ->getMessage());
            }
    ?>
    
    <!--Get the id of the owner-->
    <?php
        $askIdOwner=$bdd->prepare('SELECT id_user FROM house WHERE id=:idhouse');
            $askIdOwner->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the house title-->
    <?php
        $askHtitle=$bdd->prepare('SELECT H.title FROM house H WHERE H.id=:idhouse');
            $askHtitle->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the house description-->
    <?php
        $askHdesc=$bdd->prepare('SELECT H.description FROM house H WHERE H.id=:idhouse');
            $askHdesc->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the begining date-->
    <?php
        $askDateB=$bdd->prepare('SELECT A.date_begin FROM ad A, house H WHERE H.id=A.id_house AND H.id=:idhouse');
            $askDateB->execute(array('idhouse'=>$_GET['id']))
    ?>
    
    <!--Get the end date-->
    <?php
        $askDateE=$bdd->prepare('SELECT A.date_end FROM ad A, house H WHERE H.id=A.id_house AND H.id=:idhouse');
            $askDateE->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the house rate-->
    <?php
        $askHrate=$bdd->prepare('SELECT H.rating FROM house H WHERE H.id=:idhouse');
            $askHrate->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the house pic-->
    <?php
        $askHpic=$bdd->prepare('SELECT H.pictures FROM house H WHERE H.id=:idhouse');
            $askHpic->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the region-->
    <?php 
        $askHregion=$bdd->prepare('SELECT real_name FROM area WHERE id=(SELECT id_area FROM house WHERE id=:idhouse)');
            $askHregion->execute(array('idhouse'=>$_GET['id']));
    ?>
    
    <!--Get the town-->
    <?php
        $askHtown=$bdd->prepare('SELECT ville_nom_reel FROM villes_france_free WHERE ville_id=(SELECT id_town FROM house WHERE id=:idhouse)');
            $askHtown->execute(array('idhouse'=>$_GET['id']));
       
    ?>
        
        