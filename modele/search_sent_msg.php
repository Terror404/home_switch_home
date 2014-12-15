
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

<?php   /* récupère les messages envoyées*/
    $ask_sent_msg=$DB->prepare("SELECT  id, id_receiver, title, date,text FROM messages WHERE id_author=:userId");
        $ask_sent_msg->execute(array('userId'=>$_SESSION['userId']));
?>


