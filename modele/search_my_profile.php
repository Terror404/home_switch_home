
<?php
if($_SESSION['userId']==$_GET['userId'])
{
    $askProfPic = $DB->prepare('SELECT picture FROM user WHERE id=:id');
        $askProfPic->execute(array('id'=>$_SESSION['userId']));

    $askProfLog = $DB->prepare('SELECT login FROM user WHERE id=:id');
        $askProfLog->execute(array('id'=>$_SESSION['userId']));

    $askProfDate = $DB->prepare('SELECT date_creation FROM user WHERE id=:id');
        $askProfDate->execute(array('id'=>$_SESSION['userId']));

    $askProfDesc = $DB->prepare('SELECT description FROM user WHERE id=:id');
        $askProfDesc->execute(array('id'=>$_SESSION['userId']));

    $askProfWant = $DB->prepare('SELECT wanted_dest FROM user WHERE id=:id');
        $askProfWant->execute(array('id'=>$_SESSION['userId']));

    $askProfRate = $DB->prepare('SELECT rating FROM user WHERE id=:id');
        $askProfRate->execute(array('id'=>$_SESSION['userId']));
        
    $modify=1;
}
else
{
    $askProfPic = $DB->prepare('SELECT picture FROM user WHERE id=:id');
        $askProfPic->execute(array('id'=>$_GET['userId']));

    $askProfLog = $DB->prepare('SELECT login FROM user WHERE id=:id');
        $askProfLog->execute(array('id'=>$_GET['userId']));

    $askProfDate = $DB->prepare('SELECT date_creation FROM user WHERE id=:id');
        $askProfDate->execute(array('id'=>$_GET['userId']));

    $askProfDesc = $DB->prepare('SELECT description FROM user WHERE id=:id');
        $askProfDesc->execute(array('id'=>$_GET['userId']));

    $askProfWant = $DB->prepare('SELECT wanted_dest FROM user WHERE id=:id');
        $askProfWant->execute(array('id'=>$_GET['userId']));

    $askProfRate = $DB->prepare('SELECT rating FROM user WHERE id=:id');
        $askProfRate->execute(array('id'=>$_GET['userId']));
}
?>