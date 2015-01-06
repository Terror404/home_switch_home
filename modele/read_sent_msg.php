<?php   /* récupère le message reçu sélectionné*/
    $askSentMsg=$DB->prepare("SELECT messages.id, id_receiver, title, date,text,login FROM messages, user WHERE user.id=id_receiver AND id_author=:userId AND messages.id=:id_msg");
        $askSentMsg->execute(array('userId'=>$_SESSION['userId'],
                                        'id_msg'=> $_GET['id']));
?>