<?php   /* récupère les messages envoyées*/
    $ask_sent_msg=$DB->prepare("SELECT  id, id_receiver, title, date,text FROM messages WHERE id_author=:userId");
        $ask_sent_msg->execute(array('userId'=>$_SESSION['userId']));

/* 
turns id-receiver into login-receiver */
$idReceiver=$ask_sent_msg->fetch();
$askLogReceiver=$DB->prepare('SELECT login FROM user WHERE id = :idRec');
$askLogReceiver->execute(array('idRec'=>$idReceiver['id_receiver']));
$receiver_login = $askLogReceiver->fetch();


?>
