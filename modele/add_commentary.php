<?php
if(isset($_POST['add']) AND $_POST['add']==1)
{
    if(isset($_POST['type']) AND $_POST['type']==0)
    {
        $idExchange=$_POST['idExch'];
        $idUser1=$_SESSION['userId'];
        $idUser2=$_POST['idUser2'];
        $idHouse1=$_POST['idHouse1'];
        $idHouse2=$_POST['idHouse2'];
        $titleCHouse=$_POST['titleH'];
        $titleCUser=$_POST['titleU'];
        $comUser=$_POST['commentaryU'];
        $comHouse=$_POST['commantaryH'];
        $rateUser=$_POST['rateU'];
        $rateHouse=$_POST['rateH'];
        $finished=1;
        $date=date('y-m-d');
        
        $addComH=$DB->prepare('INSERT INTO comment_house (id_author,id_target,title,text,rating,date) VALUES(:idauthor,:idtarget,:title,:text,:rating,:date)');
            $addComH->execute(array('idauthor'=>$idUser1,'idtarget'=>$idHouse2,'title'=>$titleCHouse,'text'=>$comHouse,'rating'=>$rateHouse,'date'=>$date));
            
        $upFinished=$DB->prepare('UPDATE exchange SET finished_1=1 WHERE id=:idexchange');
            $upFinished->execute(array('idexchange'=>$idExchange));
    }
    elseif(isset($_POST['type']) AND $_POST['type']==1)
    {
        
    }
}