
<?php
$askProfPic = $DB->prepare('SELECT picture FROM user WHERE id=:id');
$askProfPic->execute(array('id'=>$_GET['userId']));
?>
<?php
$askProfLog = $DB->prepare('SELECT login FROM user WHERE id=:id');
$askProfLog->execute(array('id'=>$_GET['userId']));
?>
<?php
$askProfDate = $DB->prepare('SELECT date_creation FROM user WHERE id=:id');
$askProfDate->execute(array('id'=>$_GET['userId']));
?>
<?php
$askProfDesc = $DB->prepare('SELECT description FROM user WHERE id=:id');
$askProfDesc->execute(array('id'=>$_GET['userId']));
?>
