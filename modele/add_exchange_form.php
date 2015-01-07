<?php
    if(isset($_POST['houseChoiceU1']) 
            AND isset($_POST['adChoiceU1']) 
            AND isset($_POST['User2'])
            AND isset($_POST['houseChoiceU2'])
            AND isset($_POST['adChoiceU2']))
    {
        $addExch=$DB->prepare('INSERT INTO exchange(id_user_1,id_user_2,id_house_1,id_house_2,id_ad_1,id_ad_2) VALUES(:iduser1,:iduser2,:idhouse1,:idhouse2,:idad1,:idad2)');
            $addExch->execute(array('iduser1'=>$_SESSION['userId'],'iduser2'=>$_POST['User2'],'idhouse1'=>$_POST['houseChoiceU1'],'idhouse2'=>$_POST['houseChoiceU2'],'idad1'=>$_POST['adChoiceU1'],'idad2'=>$_POST['adChoiceU2']));
    }
?>

