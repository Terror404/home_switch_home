<?php
if($_GET['state']==1)
{
    $askUserBack=$DB->prepare('SELECT picture, login,id , date_creation, rating FROM user WHERE user.login=\''.$_POST['name'].'\'');
    $askUserBack->execute();
}
elseif($_GET['state']==2)
{
    $askHouse=$DB->prepare('SELECT * FROM house WHERE house.id='.$_POST['name']);
    $askHouse->execute();
}
elseif($_GET['state']==4 AND $_SESSION['userAccess']==3)
{
    $askHouse=$DB->prepare('SELECT * FROM house WHERE id_user='.$_POST['id']);
    $askHouse->execute();
    
    while($resHouse=$askHouse->fetch())
    {
        $askAd=$DB->prepare('SELECT id FROM ad WHERE id_house='.$resHouse['id']);
        $askAd->execute();
        while($resAd=$askAd->fetch())
        {
            $deleteAdCriteria=$DB->prepare('DELETE FROM ad_criteria WHERE id_ad='.$resAd['id']);
            $deleteAdCriteria->execute();
            $deleteAd=$DB->prepare('DELETE FROM ad WHERE id='.$resAd['id']);
            $deleteAd->execute();
        }
        $deleteCriteriaHouse=$DB->prepare('DELETE FROM house_criteria_house WHERE id_criteria_house='.$resHouse['id']);
        $deleteCriteriaHouse->execute();
        $deleteCommentHouse=$DB->prepare('DELETE FROM comment_house WHERE id_target='.$resHouse['id']);
        $deleteCommentHouse->execute();
    }
   
    //delete favorites
    
    $deleteFav=$DB->prepare('DELETE FROM favorites WHERE id_user='.$_POST['id']);
    $deleteFav->execute();
    
    //delete comments involving the user
    $deleteCommentHouse=$DB->prepare('DELETE FROM comment_house WHERE id_author='.$_POST['id']);
        $deleteCommentHouse->execute();
    $deleteCommentUser=$DB->prepare('DELETE FROM comment_user WHERE id_target='.$_POST['id']);
        $deleteCommentUser->execute();
    $deleteCommentUserA=$DB->prepare('DELETE FROM comment_user WHERE id_author='.$_POST['id']);
        $deleteCommentUserA->execute();
        
    //delete messages involving the user
    $deleteMsg=$DB->prepare('DELETE FROM messages WHERE id_target='.$_POST['id']);
        $deleteMsg->execute();
    $deleteMsgA=$DB->prepare('DELETE FROM messages WHERE id_author='.$_POST['id']);
        $deleteMsgA->execute();    
    //final delete, bye bye!
    $deleteUser=$DB->prepare('DELETE FROM user WHERE user.id='.$_POST['id']);
    $deleteUser->execute();
}
elseif($_GET['state']==6 AND $_SESSION['userAccess']==3)
{
    $askHouse=$DB->prepare('SELECT * FROM house WHERE id='.$_POST['name']);
    $askHouse->execute();
    
    while($resHouse=$askHouse->fetch())
    {
        $askAd=$DB->prepare('SELECT id FROM ad WHERE id_house='.$resHouse['id']);
        $askAd->execute();
        while($resAd=$askAd->fetch())
        {
            $deleteAdCriteria=$DB->prepare('DELETE FROM ad_criteria WHERE id_ad='.$resAd['id']);
            $deleteAdCriteria->execute();
            $deleteAd=$DB->prepare('DELETE FROM ad WHERE id='.$resAd['id']);
            $deleteAd->execute();
        }
        $deleteCriteriaHouse=$DB->prepare('DELETE FROM house_criteria_house WHERE id_criteria_house='.$resHouse['id']);
        $deleteCriteriaHouse->execute();
        $deleteCommentHouse=$DB->prepare('DELETE FROM comment_house WHERE id_target='.$resHouse['id']);
        $deleteCommentHouse->execute();
    }
}
