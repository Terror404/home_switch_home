<?php
$DB= new PDO ('mysql:host=localhost; dbname=home_switch_home', 'root','');

/* id of the owner of the house*/
        $askIdOwner=$DB->prepare('SELECT id_user FROM house WHERE id=:idhouse');
            $askIdOwner->execute(array('idhouse'=>$_GET['id']));
        $id_recipient =  $askIdOwner->fetch();
        
/* id of author of the the msg*/
    $idAuthor = $_SESSION['userId'];
    $askAuthor= $DB-> prepare('SELECT login,mail FROM user WHERE id=:idAut');
    $askAuthor= $DB-> execute(array('idAut'=>$idAuthor));
    
/*id of the message*/
    $idAutoMsg = $_POST ["id_autoMsg"];
    
/*search the title and text of the message in the database*/
    $askMsg = $DB -> prepare ('SELECT title , text FROM auto_msg WHERE id = :idMsg');
    $askMsg-> execute (array('idMsg' => $idAutoMsg));
    $autoMsg = $askMsg ->fetch();
    
/* send the message*/
    mail($id_recipient, $askMsg['title'], $askMsg['text']);
    
?>