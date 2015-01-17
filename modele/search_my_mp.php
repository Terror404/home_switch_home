
<?php   /* récupère les messages reçus*/
    $askReceivedmsg=$DB->prepare("SELECT messages.id, id_author, title, date,text,login FROM messages,user WHERE user.id=messages.id_author AND id_receiver=:userId");
        $askReceivedmsg->execute(array('userId'=>$_SESSION['userId']));
   
  ?>

