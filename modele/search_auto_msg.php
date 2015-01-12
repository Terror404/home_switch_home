<?php
$DB= new PDO ('mysql:host=localhost; dbname=home_switch_home', 'root','');

     $askIdOwner=$DB->prepare('SELECT id_user FROM house WHERE id=:idhouse');
            $askIdOwner->execute(array('idhouse'=>$_GET['id']));
        $destinataire =  $askIdOwner->fetch();
        
    $askMsg = $DB -> prepare ('SELECT title FROM auto_msg WHERE id = :idMsg');
    $askMsg-> execute (array('idMsg' => $idAutoMsg));
    $sujet= $askMsg ->fetch();
    
    $askMsg = $DB -> prepare ('SELECT text FROM auto_msg WHERE id = :idMsg');
    $askMsg-> execute (array('idMsg' => $idAutoMsg));
    $message = $askMsg ->fetch();
    
    
    $idAuthor = $_SESSION['userId'];
    $askAuthor= $DB-> prepare('SELECT login,mail FROM user WHERE id=:idAut');
    $askAuthor= $DB-> execute(array('idAut'=>$idAuthor));
    $resAuth =$askAuthor->fetch();
    
    mail($destinataire, $sujet, $message);
?>