

<?php   /* récupère le message reçu sélectionné*/
    $askReceivedmsg=$DB->prepare("SELECT messages.id, id_author, title, date,text,login FROM messages,user WHERE user.id=messages.id_author AND id_receiver=:userId AND messages.id=:id_msg");
        $askReceivedmsg->execute(array('userId'=>$_SESSION['userId'],
                                        'id_msg'=> $_GET['id']));
        
?>