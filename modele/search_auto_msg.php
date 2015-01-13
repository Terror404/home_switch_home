<?php
$DB= new PDO ('mysql:host=localhost; dbname=home_switch_home', 'root','');
    $idAutoMsg = $GET_idmsg;    
    
    $askMsg = $DB -> prepare ('SELECT title FROM auto_msg WHERE id = :idMsg');
    $askMsg-> execute (array('idMsg' => $idAutoMsg));
    $sujet= $askMsg ->fetch();
    
    
    $askMsg = $DB -> prepare ('SELECT text FROM auto_msg WHERE id = :idMsg');
    $askMsg-> execute (array('idMsg' => $idAutoMsg));
    $Message = $askMsg ->fetch();
    
    
    $idAuthor = $_SESSION['userId'];
    $askAuthor= $DB-> prepare('SELECT login,mail, password FROM user WHERE id=:idAut');
    $askAuthor= $DB-> execute(array('idAut'=>$idAuthor));
    $resAuth =$askAuthor->fetch();
    
    $headers = 'MIME-Version: 1.0'."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

    $message = '<html>';
$message .= '<head><title>Titre du message</title></head>';
$message .= '<body><p> </p></body>';
$message .= '</html>';
    
    mail($destinataire, $sujet, $message, $headers);
?>