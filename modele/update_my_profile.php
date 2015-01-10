<?php
//update the wanted destination
if(isset($_POST['modDestination']))
{
    if(!empty($_POST['modDestination']))
    {
        $updateDest=$DB->prepare('UPDATE user SET wanted_dest=:destination WHERE id=:iduser');
            $updateDest->execute(array('destination'=>$_POST['modDestination'], 'iduser'=>$_SESSION['userId']));
        $end=0;
    }
    else
    {
        $end=1;
    }
}
 
//update the description 
if(isset($_POST['modDescription']))
{
    if(!empty($_POST['modDescription']))
    {
    $updateDest=$DB->prepare('UPDATE user SET description=:description WHERE id=:iduser');
        $updateDest->execute(array('description'=>$_POST['modDescription'], 'iduser'=>$_SESSION['userId']));
    $end=0;
    }
     else
    {
        $end=1;
    }
}

//update the profile pic
if(isset($_FILES['photo7']))
{
    if(!empty($_FILES['photo7']))
    {
        require"../modele/upload_photo.php";
        echo"<br/>";
        $updateProfPic=$DB->prepare('UPDATE user SET picture=:linkpic WHERE id=:iduser');
            $updateProfPic->execute(array('linkpic'=>$p[7], 'iduser'=>$_SESSION['userId']));
        $end=0;
    }
     else
    {
        $end=1;
    }
}


 
 
