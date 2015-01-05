<?php
$DB= new PDO ('mysql:host=localhost; dbname=home_switch_home', 'root','');

/* id of the owner of the house*/
        $askIdOwner=$DB->prepare('SELECT id_user FROM house WHERE id=:idhouse');
            $askIdOwner->execute(array('idhouse'=>$_GET['id']));
        $id_recipient =  $askIdOwner->fetch();
        
/* id of author of the the msg*/
    $idAuthor = $_SESSION['userId'];
    
/*id of the message*/
    $idAutoMsg = $_POST ["id_autoMsg"];
    
/*search the tilte and text of the message in the database*/
    $askMsg = $DB -> prepare ('SELECT title , text FROM auto_msg WHERE id = :idMsg');
    $askMsg-> execute (array('idMsg' => $idAutoMsg));
    $autoMsg = $askMsg ->fetch();
    
    
    
/* add the message in the database*/
    $req = $DB -> prepare (
            'INSERT INTO messages(date, id_author, id_receiver, title, text)'
            . 'VALUES ( :date, :id_author, :id_receiver, :title, :text) '
        );
    $req->execute(array(
        'date' => date('d.m.y h:i:s'),
        'id_author' => $idAuthor,
        'id_receiver' => $id_recipient['id'],
        'title' => $autoMsg['title'],
        'text' => $autoMsg['text'],
       ));
?>    
    
