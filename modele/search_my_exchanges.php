<?php
//For the confirmed exchange
$askExchConf=$DB->prepare('SELECT * FROM exchange WHERE confirmed=1 AND (id_user_1=:iduser1 OR id_user_2=:iduser2)') ;
$askExchConf->execute(array('iduser1'=>$_SESSION['userId'],'iduser2'=>$_SESSION['userId']));

//For the exchange you asked
$askExchW1=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser AND confirmed=0') ;
$askExchW1->execute(array('iduser'=>$_SESSION['userId']));

//For the exchange asked to you
$askExchW2=$DB->prepare('SELECT * FROM exchange WHERE id_user_2=:iduser AND confirmed =0') ;
$askExchW2->execute(array('iduser'=>$_SESSION['userId']));


/*******************************************************************************
 ******************* Case for the confirmed exchange****************************
 ******************************************************************************/
$arrayInf=array();
$i=0;
while($resExchConf=$askExchConf->fetch())
    {
        $idExch=$resExchConf['id'];
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
        $type=0;    
        
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
        $type=1;
        $idExch=$resExchConf['id'];
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
$arrayInfW1=array();
$i=0;
while($resExchW1=$askExchW1->fetch())
    {
        $idExchW1=$resExchW1['id'];
        $idU1W1=$resExchW1['id_user_1'];
        $idU2W1=$resExchW1['id_user_2'];
        $idH1W1=$resExchW1['id_house_1'];
        $idH2W1=$resExchW1['id_house_2'];
        $arrayInfW1[$i]=array($idU1W1,$idU2W1,$idH1W1,$idH2W1); 
        $i++;
    }
    
$nb=count($arrayInfW1);
$arrayFinalInfU1W1=array();
$arrayFinalInfU2W1=array();
for($i=0;$i<$nb;$i++)
{
        $idUser1W1=$_SESSION['userId'];
        $idHouse1W1=$arrayInfW1[$i][3];
        $idUser2W1=$arrayInfW1[$i][1];
        $idHouse2W1=$arrayInfW1[$i][2];
    
        $askExchInfU1W1=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
            $askExchInfU1W1->execute(array('iduser1'=>$idUser1W1,'idhouse1'=>$idHouse1W1));

        while($resExchInfU1W1=$askExchInfU1W1->fetch())
        {
            $logU1W1=$resExchInfU1W1['login'];
            $titH1W1=$resExchInfU1W1['title'];
            $arrayFinalInfU1W1[$i]=array($logU1W1,$titH1W1);
        }

        $askExchInfU2W1=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
            $askExchInfU2W1->execute(array('iduser1'=>$idUser2W1,'idhouse1'=>$idHouse2W1));

        while($resExchInfU2W1=$askExchInfU2W1->fetch())
        {
            $logU2W1=$resExchInfU2W1['login'];
            $titH2W1=$resExchInfU2W1['title'];
            $arrayFinalInfU2W1[$i]=array($logU2W1,$titH2W1);
        }

}

/*******************************************************************************
**********************Case for the exchange asked to you************************
*******************************************************************************/

$arrayInfW2=array();
$i=0;
while($resExchW2=$askExchW2->fetch())
    {
        $idExchW2=$resExchConfW2['id'];
        $idU1W2=$resExchW2['id_user_1'];
        $idU2W2=$resExchW2['id_user_2'];
        $idH1W2=$resExchW2['id_house_1'];
        $idH2W2=$resExchW2['id_house_2'];
        $arrayInfW2[$i]=array($idU1W2,$idU2W2,$idH1W2,$idH2W2); 
        $i++;
    }
    
$nb=count($arrayInfW2);
$arrayFinalInfU1W2=array();
$arrayFinalInfU2W2=array();
for($i=0;$i<$nb;$i++)
{
        $idUser1W2=$_SESSION['userId'];
        $idHouse1W2=$arrayInfW2[$i][3];
        $idUser2W2=$arrayInfW2[$i][0];
        $idHouse2W2=$arrayInfW2[$i][2];
    
        $askExchInfU1W2=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
            $askExchInfU1W2->execute(array('iduser1'=>$idUser1W2,'idhouse1'=>$idHouse1W2));

        while($resExchInfU1W2=$askExchInfU1W2->fetch())
        {
            $logU1W2=$resExchInfU1W2['login'];
            $titH1W2=$resExchInfU1W2['title'];
            $arrayFinalInfU1W2[$i]=array($logU1W2,$titH1W2);
        }

        $askExchInfU2W2=$DB->prepare('SELECT U.login, H.title FROM house H, user U WHERE U.id=:iduser1 AND H.id=:idhouse1');
            $askExchInfU2W2->execute(array('iduser1'=>$idUser2W2,'idhouse1'=>$idHouse2W2));

        while($resExchInfU2W2=$askExchInfU2W2->fetch())
        {
            $logU2W2=$resExchInfU2W2['login'];
            $titH2W2=$resExchInfU2W2['title'];
            $arrayFinalInfU2W2[$i]=array($logU2W2,$titH2W2);
        }

}
