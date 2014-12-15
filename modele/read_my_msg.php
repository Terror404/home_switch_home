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

<?php   /* récupère le message reçu sélectionné*/
    $askReceivedmsg=$DB->prepare("SELECT id, id_author, title, date,text FROM messages WHERE id_receiver=:userId AND id=:id_msg");
        $askReceivedmsg->execute(array('userId'=>$_SESSION['userId'],
                                        'id_msg'=> $_GET['id']));
?>