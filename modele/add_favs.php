<?php
$iduser=$_SESSION['userId'];
$askFavs=$DB->prepare('SELECT id_house FROM favorites WHERE id_user=:iduser');
    $askFavs->execute(array('iduser'=>$iduser));

$arrayListFavs=array();
$i=0;

while($resFavs=$askFavs->fetch())
{
    $arrayListFavs[$i]=$resFavs['id_house'];
}

if(isset($_POST['favs']) AND $_POST['favs']==1)
{
    //Update the favs with a new one
    $idHouse=$_POST['houseId'];
    if(in_array($idHouse,$arrayListFavs))
    {
        $end=0;
    }
    else
    {
        $addFavs=$DB->prepare('INSERT INTO favorites (id_house,id_user) VALUES (:idhouse, :iduser)');
            $addFavs->execute(array('idhouse'=>$idHouse,'iduser'=>$_SESSION['userId']));
        $end=1;
    }
}

elseif(isset($_POST['favs']) AND $_POST['favs']==2)
{
    //Delete the chosen fav from the database
    $idHouse=$_POST['houseId'];
    $addFavs=$DB->prepare('DELETE FROM favorites WHERE id_user=:iduser AND id_house=:idhouse');
        $addFavs->execute(array('idhouse'=>$_POST['houseId'],'iduser'=>$_SESSION['userId']));
    $end=2;
}

else
{
        $end=3;
}

