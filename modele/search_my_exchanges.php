<?php

$askExchConf=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchConf->execute(array('iduser'=>$_SESSION['userId']));

$askExchWait1=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait1->execute(array('iduser'=>$_SESSION['userId']));

$askExchWait2=$DB->prepare('SELECT * FROM exchange WHERE id_user_1=:iduser OR id_user_2=:iduser') ;
$askExchWait2->execute(array('iduser'=>$_SESSION['userId']));


while($resExchConf=$askExchConf->fetch())
    {
        if($resExchConf['confirmed']==1)
        {
            if($resExchConf['id_user_1']==$_SESSION['userId'])
            {
                $askOtherUser=$DB->prepare('SELECT login FROM user WHERE id=:iduser');
                    $askOtherUser->execute(array('iduser'=>$resExchConf['id_user_2']));
                while($resOtherUser=$askOtherUser->fetch())
                {
                    $loginUser2=$resOtherUser['login'];
                }
            }
            elseif($resExchConf['id_user_2']==$_SESSION['userId'])
            {
                $User2Id=$resExchConf['id_user_1'];
                $askOtherUser=$DB->prepare('SELECT login FROM user WHERE id=:iduser');
                    $askOtherUser->execute(array('iduser'=>$user2Id));
                while($resOtherUser=$askOtherUser->fetch())
                {
                    $loginUser2=$resOtherUser['login'];
                }
            }
        }
    }