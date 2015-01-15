<?php
$idExch=$_POST['IdExch'];
$idUser1=$_POST['idUser1'];
$idUser2=$_POST['idUser2'];
$idHouse1=$_POST['idHouse1'];
$idHouse2=$_POST['idHouse2'];

if($_POST['submit']=='Accepter la demande')
{
    $upFinished=$DB->prepare('UPDATE exchange SET confirmed=1 WHERE id=:idexchange');
    $upFinished->execute(array('idexchange'=>$idExch));
}
elseif($_POST['submit']=='Refuser la demande' OR $_POST['submit']=='Annuler la demande')
{
    $askDelete=$DB->prepare('DELETE FROM exchange WHERE id='.$idExch);
    $askDelete->execute();
}
