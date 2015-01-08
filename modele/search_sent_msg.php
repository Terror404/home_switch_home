<?php   /* récupère les messages envoyées*/
    $ask_sent_msg=$DB->prepare("SELECT  messages.id, id_receiver, title, date,text, login FROM messages,user WHERE user.id=messages.id_receiver AND id_author=:userId");
        $ask_sent_msg->execute(array('userId'=>$_SESSION['userId']));
?>
