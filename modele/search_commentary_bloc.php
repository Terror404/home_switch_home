<!DOCTYPE html>
<head><title>Commentary Bloc</title></head>
<body>  
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
    
    <?php /*Get the profile pic of the author*/
        $askComPic=$bdd->prepare('SELECT U.picture FROM user U, `Comment_House` C WHERE C.id_author=U.id AND C.id_target=:idhouse');
            $askComPic->execute(array('idhouse'=>$_GET['id']));            
    ?>
    <?php /*Get the login of the author*/
        $askComLog=$bdd->prepare('SELECT U.login FROM user U, `comment_house` C WHERE C.id_author=U.id AND C.id_target=:idhouse');
            $askComLog->execute(array('idhouse'=>$_GET['id']));
    ?>
    <?php /*Get the title*/
        $askComTtle=$bdd->prepare('SELECT title FROM `comment_house` WHERE id_target=:idhouse');
            $askComTtle->execute(array('idhouse'=>$_GET['id']));
    ?>
    <?php /*Get the rate*/
        $askComRate=$bdd->prepare('SELECT rating FROM `comment_house` WHERE id_target=:idhouse');
            $askComRate->execute(array('idhouse'=>$_GET['id']));
    ?>
    <?php /*Get the date*/
        $askComDate=$bdd->prepare('SELECT date FROM `comment_house` WHERE id_target=:idhouse');
            $askComDate->execute(array('idhouse'=>$_GET['id']));
    ?>
    <?php /*Get the text*/
        $askComTxt=$bdd->prepare('SELECT text FROM `comment_house` WHERE id_target=:idhouse');
            $askComTxt->execute(array('idhouse'=>$_GET['id']));
    ?>
</body>