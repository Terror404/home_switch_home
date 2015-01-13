<?php

$askExchConf=$DB->prepare('SELECT * FROM exchange WHERE confirmed=1 AND (id_user_1=:iduser1 OR id_user_2=:iduser2) ') ;
$askExchConf->execute(array('iduser1'=>$_SESSION['userId'],'iduser2'=>$_SESSION['userId']));

$askExchWait1=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait1->execute(array('iduser'=>$_SESSION['userId']));

$askExchWait2=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait2->execute(array('iduser'=>$_SESSION['userId']));

$arrayInf=array();
$i=0;
while($resExchConf=$askExchConf->fetch())
    {
        $idU1=$resExchConf['id_user_1'];
        $idU2=$resExchConf['id_user_2'];
        $idH1=$resExchConf['id_house_1'];
        $idH2=$resExchConf['id_house_2'];
        $arrayInf[$i]=array($idU1,$idU2,$idH1,$idH2); 
        $i++;
    }
    
$nb=count($arrayInf);

for($i=0;$i<$nb;$i++)
{
    if($_SESSION['userId']==$arrayInf[$i][0])
    {
        $idUser1=$_SESSION['userId'];
        $idHouse1=$arrayInf[$i][2];
        $idUser2=$arrayInf[$i][1];
        $idHouse2=$arrayInf[$i][3];
    }
    elseif($_SESSION['userId']==$arrayInf[$i][1])
    {
        $idUser1=$_SESSION['userId'];
        $idHouse1=$arrayInf[$i][3];
        $idUser2=$arrayInf[$i][0];
        $idHouse2=$arrayInf[$i][2];
    }
    
    $askExchInfU1.$i=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
        $askExchInfU1.$i->execute(array('iduser1'=>$idUser1,'idhouse1'=>$idHouse1));
        
    $askExchInfU2.$i=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
        $askExchInfU2.$i->execute(array('iduser1'=>$idUser2,'idhouse1'=>$idHouse2));
}