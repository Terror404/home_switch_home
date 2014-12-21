<?php   /* récupère le message reçu sélectionné*/
    $askSentMsg=$DB->prepare("SELECT id, id_receiver, title, date,text FROM messages WHERE id_author=:userId AND id=:id_msg");
        $askSentMsg->execute(array('userId'=>$_SESSION['userId'],
                                        'id_msg'=> $_GET['id']));
?>