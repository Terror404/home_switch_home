<?php
//For the confirmed exchange
$askExchConf=$DB->prepare('SELECT * FROM exchange WHERE confirmed=1 AND (id_user_1=:iduser1 OR id_user_2=:iduser2) ') ;
$askExchConf->execute(array('iduser1'=>$_SESSION['userId'],'iduser2'=>$_SESSION['userId']));

//For the exchange you asked
$askExchWait1=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait1->execute(array('iduser'=>$_SESSION['userId']));

//For the exchange asked to you
$askExchWait2=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait2->execute(array('iduser'=>$_SESSION['userId']));


/*******************************************************************************
 ******************* Case for the confirmed exchange****************************
 ******************************************************************************/
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
$arrayFinalInfU1=array();
$arrayFinalInfU2=array();
for($i=0;$i<$nb;$i++)
{
    if($_SESSION['userId']==$arrayInf[$i][0])
    {
        $idUser1=$_SESSION['userId'];
        $idHouse1=$arrayInf[$i][2];
        $idUser2=$arrayInf[$i][1];
        $idHouse2=$arrayInf[$i][3];
        
        $askExchInfU1=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
        $askExchInfU1->execute(array('iduser1'=>$idUser1,'idhouse1'=>$idHouse1));
    

        while($resExchInfU1=$askExchInfU1->fetch())
        {
            $logU1=$resExchInfU1['login'];
            $titH1=$resExchInfU1['title'];
            $arrayFinalInfU1[$i]=array($logU1,$titH1);
        }

        $askExchInfU2=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
            $askExchInfU2->execute(array('iduser1'=>$idUser2,'idhouse1'=>$idHouse2));

        while($resExchInfU2=$askExchInfU2->fetch())
        {
            $logU2=$resExchInfU2['login'];
            $titH2=$resExchInfU2['title'];
            $arrayFinalInfU2[$i]=array($logU2,$titH2);
        }
    }
    elseif($_SESSION['userId']==$arrayInf[$i][1])
    {
        $idUser1=$_SESSION['userId'];
        $idHouse1=$arrayInf[$i][3];
        $idUser2=$arrayInf[$i][0];
        $idHouse2=$arrayInf[$i][2];
    
        $askExchInfU1=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
            $askExchInfU1->execute(array('iduser1'=>$idUser1,'idhouse1'=>$idHouse1));

        while($resExchInfU1=$askExchInfU1->fetch())
        {
            $logU1=$resExchInfU1['login'];
            $titH1=$resExchInfU1['title'];
            $arrayFinalInfU1[$i]=array($logU1,$titH1);
        }

        $askExchInfU2=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
            $askExchInfU2->execute(array('iduser1'=>$idUser2,'idhouse1'=>$idHouse2));

        while($resExchInfU2=$askExchInfU2->fetch())
        {
            $logU2=$resExchInfU2['login'];
            $titH2=$resExchInfU2['title'];
            $arrayFinalInfU2[$i]=array($logU2,$titH2);
        }
    }
}


/*******************************************************************************
 *********************** Case for the exchange you asked************************
 ******************************************************************************/