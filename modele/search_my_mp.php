

<?php   /*Accès à la bdd*/
            try 
                {
                    $DB = new PDO ("mysql:host=localhost;dbname=home_switch_home","root","",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                } 
            catch (Exception $ex) 
                {
                    die ('Erreur:'.$ex ->getMessage());
                }
?>

<?php   /* récupère les messages reçus*/
    $askReceivedmsg=$DB->prepare("SELECT messages.id, id_author, title, date,text,login FROM messages,user WHERE user.id=messages.id_author AND id_receiver=:userId");
        $askReceivedmsg->execute(array('userId'=>$_SESSION['userId']));
   
  ?>

